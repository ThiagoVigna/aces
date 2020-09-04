<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ==================================================
 *  SISTEMA, Crud
 * ==================================================
 * Esta classe fará uma modelagem universal entre
 * as tabelas do banco de dados
 *
 * @author Paulo Pereira <paulo@navegueweb.com.br>
 * @copyright 2014 Navegue Web
 * @link https://www.navegueweb.com.br
 * @package ./application/models/sistema/model_universal.php
 * @since 2014-06-23
 *
 * ==================================================
 *
 * */
class Crud extends CI_Model{

	/**
	 * ULTIMO SQL
	 * Propriedade
	 * --------------------------------------------------
	 * Armazena a ultima SQL executada
	 *
	 * @property string $ultimo_sql
	 * @since 2016-07-07
	 * @author Paulo Pereira
	 *
	 * */
	public $last_sql;

	/**
	 * CONSULTAR
	 * Método
	 * --------------------------------------------------
	 * Realiza consulta em tabelas específicas do
	 * banco de dados conforme especificações passadas.
	 *
	 * @method void consultar($param, $table, $unico, $formato)
	 *
	 * @param mixed $param <array com parametros de consulta ou SQL personalizada>
	 * @param mixed $table <nome da tabela a ser consultada>
	 * @param string $unique <se será unico registro ou listagem>
	 * @param string $format <p) Padrão; s) Search [Pesquisa] q) Query SQL personalizada>
	 * @param string $limit <estabelece um limit de registros a serem listados - por padrão é NULL>
	 * @param string $order_by <estabelece a ordem que os registros vão aparecer - por padrão é NULL>
	 *
	 * @return mixed $resultado <objeto com resultado da consulta ou FALSE>
	 * @since 2014-06-23
	 * @author Paulo Pereira
	 *
	 * */
	function consult($table, $param = FALSE, $unique = FALSE, $format = 'p', $limit = NULL, $order_by = NULL){

		/**
		 * EXECUTA A CONSULTA
		 * Variável
		 * --------------------------------------------------
		 *
		 * @var object $executeQuery
		 * @author Paulo Pereira <paulo@navegueweb.com.br>
		 * @since 2014-06-17
		 *
		 * @return mixed $resultado <objeto com resultado da consulta ou FALSE>
		 * @since 2014-06-23
		 * @author Paulo Pereira
		 *
		 * */
		$executeQuery = FALSE;

		// verifica o formato e executa consulta
		if ($format == 'p' OR $format == 's'):

			if ($format == 's'): /* search */
				if (isset($param['like'])): $this->db->like($param['like']); endif;
				if (isset($param['where'])): $this->db->where($param['where']); endif;
				if (isset($param['or_where'])): $this->db->or_where($param['or_where']); endif;
				if (isset($param['or_like'])): $this->db->or_like($param['or_like']); endif;

			elseif($param != FALSE):
				$this->db->where($param);
			endif;

			if($order_by != FALSE) $this->db->order_by($order_by);
			if($limit != FALSE) $this->db->limit($limit);

			$executeQuery = $this->db->get($table);

			$this->last_sql = $this->db->last_query();
		else:
			if($order_by != FALSE) $this->db->order_by($order_by);
			if($limit != FALSE) $this->db->limit($limit);

			$executeQuery = $this->db->query($param);
			$this->last_sql = $this->db->last_query();
		endif;

		// verifica se a consulta foi processada corretamente e retorna resultado da consulta
		if ($this->db->affected_rows() > 0):
			return !$unique ? $executeQuery->result() : $executeQuery->row();
		else:
			return FALSE;
		endif;
	}

	/**
	 * SALVAR
	 * Método
	 * --------------------------------------------------
	 * Realiza um salvamento genérico em tabelas do banco
	 * de dados.
	 *
	 * @method salvar($dados, $tabela)
	 *
	 * @param mixed $data <array com dados a serem salvos>
	 * @param string $table <nome da tabela que deverá ser salvo o registro>
	 * @param array $where <array com parametros a serem combinados quando for atualização>
	 *
	 * @return mixed $resultado <resultado com o ultimo ID salvo ou FALSE
	 * @since 2014-06-23
	 * @author Paulo Pereira
	 *
	 * */
	function save($table, $data, $where = NULL)
	{

		// configura os dados a serem salvos
		$this->db->set($data);


		/**
		 * EXECUTA SALVAMENTO
		 * Variável
		 * --------------------------------------------------
		 *
		 * @var object $execute_query
		 * @author Paulo Pereira <paulo@navegueweb.com.br>
		 * @since 2014-06-23
		 *
		 * */
		$execute_query = FALSE;

		if ($where == NULL):
			$execute_query = $this->db->insert($table);

		else:
			$this->db->where($where);
			$execute_query = $this->db->update($table);

		endif;

		$this->last_sql = $this->db->last_query();

		// verifica o sucesso do salvamento
		if ($this->db->affected_rows() > 0):
			return $where == NULL ? $this->db->insert_id() : TRUE;
		else:
			return FALSE;
		endif;
	}

	/**
	 * APAGAR
	 * Método
	 * --------------------------------------------------
	 * Apaga dados de uma tabela especificada
	 *
	 * @method apagar($where, $tabela)
	 *
	 * @param array $apagar <array com dados a serem apagados>
	 * @param string $table <nome da tabela que deverá ser apagado o(s) registro(s)>
	 *
	 * @return boolean $resultado
	 * @since 2014-06-23
	 * @author Paulo Pereira
	 *
	 * */
	function delete($table, $where)
	{

		$this->db->where($where);
		$this->db->delete($table);

		// verifica se foi deletado
		if ($this->db->affected_rows() > 0):
			return TRUE;
		else:
			return FALSE;
		endif;
	}



}
