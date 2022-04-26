<?php
	class categoria
	{
		public $nome;
		
		function __construct($vNome)
		{
			$this->nome=$vNome;
		}

		function setNome($valor)
		{
			$this->nome = $valor;
		}

		function getNome()
		{
        	echo"$this->nome";
     	}

     	function exibeDados()
     	{
     		echo "$this->nome";
     		echo"<br>";
     	}

	}

?>
