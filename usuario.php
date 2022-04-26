<?php
	class usuario
	{
		public $login;
		public $senha;
		public $nome;
		public $acesso;
		
		function __construct($vLogin,$vSenha,$vNome,$vAcesso)
		{
			$this->login=$vLogin;
			$this->senha=$vSenha;
			$this->nome=$vNome;
			$this->acesso=$vAcesso;
		}

		function setLogin($valor)
		{
			$this->login = $valor;
		}

		function getLogin()
		{
        	echo"$this->login";
     	}

     	function setSenha($valor)
		{
			$this->senha = $valor;
		}

		function getSenha()
		{
        	echo"$this->senha";
     	}

     	function setNome($valor)
		{
			$this->nome = $valor;
		}

		function getNome()
		{
        	echo"$this->nome";
     	}

     	function setAcesso($valor)
		{
			$this->acesso = $valor;
		}

		function getAcesso()
		{
        	echo"$this->acesso";
     	}

     	function exibeDados()
     	{
     		echo "$this->login";
     		echo"<br>";
     		echo "$this->senha";
     		echo"<br>";
     		echo "$this->nome";
     		echo"<br>";
     		echo "$this->acesso";
     	}

	}

?>
