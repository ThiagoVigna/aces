<?php

namespace DotFw\Service;

class Cipher{

	private $key = null;

	public function __construct($key) {
		$this->key = $key;
	}

	/**
	 * Criptografa a senha do usuário usando o algoritmo sha256 com chave privada.
	 * @method string CipherPassword(string $password)
	 * @param string $password Senha a ser criptografada
	 * @return string
	 *
	 * Sobre criptografia da senha: (Resposta 5)
	 * @see https://stackoverflow.com/questions/16600708/how-do-you-encrypt-and-decrypt-a-php-string
	 */
	public function GetHash(string $text) {
		$hash = hash_hmac('sha256', $text, $this->key, true);
		return base64_encode($hash);
		//$this->Password = md5($password);
	}

	public function Verify($bundle, $key) {
		return hash_equals(
			hash_hmac('sha256', PRIVATE_KEY, $key),
			PRIVATE_KEY
		);
	}

	public function Encrypt($message) {
		$iv = random_bytes(16);
		$key = self::GetKey(PRIVATE_KEY);
		$result = self::Sign(openssl_encrypt($message,'aes-256-ctr',$key,OPENSSL_RAW_DATA,$iv), $key);
		return bin2hex($iv).bin2hex($result);
	}

	public function Decrypt($hash) {
		$iv = hex2bin(substr($hash, 0, 32));
		$data = hex2bin(substr($hash, 32));
		$key = self::GetKey(PRIVATE_KEY);
		if (!self::Verify($data, $key)) {
			return null;
		}
		return openssl_decrypt(mb_substr($data, 64, null, '8bit'),'aes-256-ctr',$key,OPENSSL_RAW_DATA,$iv);
	}

	public function Sign($message, $key) {
		return hash_hmac('sha256', $message, $key) . $message;
	}

	public function GetKey($password, $keysize = 16) {
		return hash_pbkdf2('sha256',$password,'some_token',100000,$keysize,true);
	}

}
