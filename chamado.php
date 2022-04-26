<?php
  /*
 Construtor : É um método que utiliza o nome reservado __construct() e que
 não precisa ser chamado da forma convencional, pois é executado
 automaticamente quando instanciamos um objeto a partir de uma classe. Sua
 utilização é indicada para rotinas de inicialização. O método construtor se
 encarrega de executar as ações de inicialização dos objetos, como por
 exemplo, atribuir valores a suas propriedades.
  */
 include_once('conexao.php');
 class chamado {
     public $categoria;
     public $assunto;
     public $descricao;
     public $status;
     public $solicitante;
     public $responsavel;
     public $dtabertura;
     public $dtsolucao;

     function __construct($vCategoria, $vAssunto, $vDescricao, $vStatus, $vSolicitante, $vResponsavel, $vDtabertura, $vDtsolucao) {
         $this->categoria=$vCategoria;
         $this->assunto=$vAssunto;
         $this->descricao=$vDescricao;
         $this->status=$vStatus;
         $this->solicitante=$vSolicitante;
         $this->responsavel=$vResponsavel;
         $this->dtabertura=$vDtabertura;
         $this->dtsolucao=$vDtsolucao;
     }
     
    function setCategoria($valor) {
         $this->categoria = $valor;
     }

    function getCategoria() {
        echo"$this->categoria";
    }

     function setAssunto($valor) {
         $this->assunto = $valor;
     }

    function getAssunto() {
        echo"$this->assunto";
    }

     function setDescricao($valor) {
         $this->descricao = $valor;
     }

    function getDescricao() {
        echo"$this->descricao";
    }

     function setStatus($valor) {
         $this->status = $valor;
     }

    function getStatus() {
        echo"$this->status";
    }

     function setSolicitante($valor) {
         $this->solicitante = $valor;
     }

    function getSolicitante() {
        echo"$this->solicitante";
    }
 
    function setResponsavel($valor) {
         $this->responsavel = $valor;
     }

    function getResponsavel() {
        echo"$this->responsavel";
    }

    function setDtabertura($valor) {
         $this->dtabertura = $valor;
     }

    function getDtabertura() {
        echo"$this->dtabertura";
    }

    function setvDtsolucao($valor) {
         $this->dtsolucao = $valor;
     }

    function getvDtsolucao() {
        echo"$this->dtsolucao";
    }

     function exibeDados(){
         echo"Categoria: $this->categoria <br>";
         echo"Assunto: $this->assunto <br>";
         echo"Descricao: $this->descricao <br>";
         echo"Status: $this->status <br>";
         echo"Solicitante: $this->solicitante <br><br>";
         echo"Responsavel: $this->responsavel <br><br>";
         echo"Data de Abertura: $this->dtabertura <br><br>";
         echo"Data de Solucao: $this->dtsolucao <br><br>";
         echo"Dados Incluidos com Sucesso! <br><br>";
     }
 }

 ?>