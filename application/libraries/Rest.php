<?php

class Rest {

	/**
	 * Local para onde o usuário será redirecionado
	 * -----------------------------------------------------------------------------------------------------------------
	 * @property $goToUrl
	 * @access private
	 * @since 2020-07-25
	 */
	private $goToUrl = null;

	/**
	 * Guarda para onde o usuário será redirecionado.
	 * -----------------------------------------------------------------------------------------------------------------
	 * @method GoUrl(string $url)
	 * @param $url
	 * @access public
	 * @since 2020-07-25
	 */
	public function GoUrl(string $url){
		$this->goToUrl = $url;
		return $this;
	}

	/**
	 * Resultado que deverá ser retornado pelo webservice.
	 * -----------------------------------------------------------------------------------------------------------------
	 * @property $result
	 * @access private
	 */
	private $result_content = NULL;

	/**
	 * Guarda na propriedade $result o conteúdo que deverá ser retornado pelo webservice
	 * -----------------------------------------------------------------------------------------------------------------
	 * @method Result()
	 * @param $result_content <Resultado que deverá ser retornado pelo webservice.>
	 * @access public
	 */
	public function Result($result_content){
		$this->result_content = $result_content;
		return $this;
	}

	/**
	 * Recupera o resultado que deverá ser retornado pelo webservice
	 * -----------------------------------------------------------------------------------------------------------------
	 * @method get_result()
	 * @access public
	 */
	public function GetResult(){
		return $this->result_content;
	}

	/**
	 * Executa o webservice
	 * -----------------------------------------------------------------------------------------------------------------
	 * @method run()
	 * @access public
	 */
	public function Run(){
		header('Content-Type: application/json; charset=utf-8');
		header("HTTP/1.0 " . self::GetCode());

		$json = array(
			'version' => '1.0',
			'code' => $this->GetCode(),
			'codeAndMessage' => $this->GetCodeAndMessage(),
			'message' => $this->GetMessage(),
			'date' => date('Y-m-d'),
			'time' => date('H:i:s'),
			'result' => $this->GetResult(),
			'goUrl' => $this->goToUrl
		);

		die(json_encode($json));
	}

	/**
	 * Mensagem que irá ser retornada ao usuário dentro do $result
	 * -----------------------------------------------------------------------------------------------------------------
	 * @property $message()
	 * @private public
	 */
	private $message_content;

	/**
	 * Guarda na variável $message o conteúdo da mensagem que será retornada dentro de $result pelo webservice
	 * -----------------------------------------------------------------------------------------------------------------
	 * @method Message()
	 * @param $message_content <Conteúdo da mensagem que será retornada dentro de $result pelo webservice>
	 * @access public
	 */
	public function Message($message_content){
		$this->message_content = $message_content;
		return $this;
	}

	/**
	 * Recupera o conteúdo da propriedade $message
	 * -----------------------------------------------------------------------------------------------------------------
	 * @method GetMessage()
	 * @access public
	 */
	public function GetMessage(){
		return $this->message_content;
	}

	/**
	 * Guarda o código de status que será retornado pelo webservice.
	 * -----------------------------------------------------------------------------------------------------------------
	 * @property $code
	 * @access private
	 */
	private $code_content;

	/**
	 * Esse método configura o código que será retornado pelo webservice em $result.
	 * -----------------------------------------------------------------------------------------------------------------
	 * @method Code()
	 * @param $number_of_code <Código do status que será retornado pelo webservice>
	 * @access public
	 */
	public function Code($number_of_code){
		$codes = array(
			'100' => '100 Continue',

			'200' => '200 OK',
			'201' => '201 Created',
			'202' => '202 Accepted',

			'400' => '400 Bad Request',
			'401' => '401 Unauthorized',
			'402' => '402 Payment Required',
			'403' => '403 Forbidden',
			'404' => '404 Not Found',
			'405' => '405 Method Not Allowed',
			'408' => '408 Request Timeout',
			'409' => '409 Conflict',

			'500' => '500 Internal Server Error'
		);

		$this->code_content = $codes[$number_of_code];
		return $this;
	}

	public function GetCode(){
		$code = $this->code_content;
		//$code = preg_replace('/\w\s/', '', $this->code_content);
		return $code;
	}

	public function GetCodeAndMessage(){
		return $this->code_content;
	}
}
