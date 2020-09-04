<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	function __construct()
	{
		parent ::__construct();
	}

	public function validation()
	{
		return $this -> db -> get("credentials") ->result();

//		if ( empty($_POST[ 'usuario' ]) || empty($_POST[ 'senha' ]) ) {
//			header('Location: index.php');
//			exit();
//		}
//
//		$usuario = $this -> db -> $_POST[ 'usuario' ];
//		$senha = $this -> db -> $_POST[ 'senha' ];
//
//		$query = $this -> db -> get("credentials");
//
//		$result = (this, $query);
//
//		$row = mysqli_num_rows($result);
//
//		if ( $row == 1 ) {
//			$_SESSION[ 'usuario' ] = $usuario;
//			header('Location: painel.php');
//			exit();
//		} else {
//			$_SESSION[ 'nao_autenticado' ] = true;
//			header('Location: index.php');
//			exit();
//		}
	}

	public function new_Credentials($new)
	{
		$this -> db -> insert("credentials", $new);
	}
}
