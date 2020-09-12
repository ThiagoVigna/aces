<?php namespace DotFw\Infra\CrossCutting\Validation;


use DotFw\Infra\CrossCutting\Helpers\Notification;

class DocumentsValidator extends Validator {

    /**
     * Realiza a validação do documento indicado e retorna uma notificação em caso de insucesso na validação.
     * @method bool
     * @param string $cpf
     * @return bool
     */
    public static function CPF(string $cpf){
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            Notification::SetNotification('CPF', 'CPF: Quantidade de números é iválido.');
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            Notification::SetNotification('CPF', 'CPF: Sequência de números inválida.');
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {

                Notification::SetNotification('CPF', 'CPF: inválido.');
                return false;
            }
        }
        return true;
    }

    /**
     * Realiza a validação do documento indicado e retorna uma notificação em caso de insucesso na validação.
     * @method bool
     * @param string $cnpj
     * @return bool
     */
    public static function CNPJ(string $cnpj){
        // Deixa o CNPJ com apenas números
        $cnpj = preg_replace( '/[^0-9]/', '', $cnpj );

        // Garante que o CNPJ é uma string
        $cnpj = (string)$cnpj;

        // O valor original
        $cnpj_original = $cnpj;

        // Captura os primeiros 12 números do CNPJ
        $primeiros_numeros_cnpj = substr( $cnpj, 0, 12 );

        /**
         * Multiplicação do CNPJ
         *
         * @param string $cnpj Os digitos do CNPJ
         * @param int $posicoes A posição que vai iniciar a regressão
         * @return int O
         *
         */
        if ( ! function_exists('multiplica_cnpj') ) {
            function multiplica_cnpj( $cnpj, $posicao = 5 ) {
                // Variável para o cálculo
                $calculo = 0;

                // Laço para percorrer os item do cnpj
                for ( $i = 0; $i < strlen( $cnpj ); $i++ ) {
                    // Cálculo mais posição do CNPJ * a posição
                    $calculo = $calculo + ( $cnpj[$i] * $posicao );

                    // Decrementa a posição a cada volta do laço
                    $posicao--;

                    // Se a posição for menor que 2, ela se torna 9
                    if ( $posicao < 2 ) {
                        $posicao = 9;
                    }
                }
                // Retorna o cálculo
                return $calculo;
            }
        }

        // Faz o primeiro cálculo
        $primeiro_calculo = multiplica_cnpj( $primeiros_numeros_cnpj );

        // Se o resto da divisão entre o primeiro cálculo e 11 for menor que 2, o primeiro
        // Dígito é zero (0), caso contrário é 11 - o resto da divisão entre o cálculo e 11
        $primeiro_digito = ( $primeiro_calculo % 11 ) < 2 ? 0 :  11 - ( $primeiro_calculo % 11 );

        // Concatena o primeiro dígito nos 12 primeiros números do CNPJ
        // Agora temos 13 números aqui
        $primeiros_numeros_cnpj .= $primeiro_digito;

        // O segundo cálculo é a mesma coisa do primeiro, porém, começa na posição 6
        $segundo_calculo = multiplica_cnpj( $primeiros_numeros_cnpj, 6 );
        $segundo_digito = ( $segundo_calculo % 11 ) < 2 ? 0 :  11 - ( $segundo_calculo % 11 );

        // Concatena o segundo dígito ao CNPJ
        $cnpj = $primeiros_numeros_cnpj . $segundo_digito;

        // Verifica se o CNPJ gerado é idêntico ao enviado
        if ( $cnpj === $cnpj_original ) {
            return true;
        }else{
            Notification::SetNotification('CNPJ', 'CNPJ: Inválido.');
            return false;
        }
    }

    /**
     * Realiza a validação do documento indicado e retorna uma notificação em caso de insucesso na validação.
     * @method bool
     * @param string $personality
     * @param string $document;
     * @return bool
     */
    public static function ValidateCPForCNPJ(string $personality, string $document){
        if($personality == 'PF'):
            self::CPF($document);
        else:
            self::CNPJ($document);
        endif;
    }

}