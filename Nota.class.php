<?php
class Nota {
    private $codigo;
    private $descricao;
    private $tipo;
    public function __construct($codigo = "",$descricao = "", $tipo = ""){
        $this->setCodigo($codigo);
        $this->setDescricao($descricao);
        $this->setTipo($tipo);
    }
    public static function excluir($codigo){
        $con = Conexao::conectar();
        $pst = $con->prepare("delete from notas where codigo=?");
        $pst->bindParam(1,$codigo);
        return $pst->execute();
    }
    public function salvar(){
        $con = Conexao::conectar();
        $pst = $con->prepare("replace into notas (codigo, descricao, tipo) values (?,?,?)");
        $pst->bindValue(1,$this->getCodigo());
        $pst->bindValue(2,$this->getDescricao());
        $pst->bindValue(3,$this->getTipo());
        return $pst->execute();
    } 
    public static function getNota($codigo){
        $con = Conexao::conectar();
        $pst = $con->prepare("select * from notas where codigo=?");
        $pst->bindParam(1,$codigo);
        $pst->execute();
        $dados = $pst->fetch(PDO::FETCH_ASSOC);
        return new Nota($dados['codigo'],$dados['descricao'],$dados['tipo']);
    }
    public static function getAllNotas(){
        $con = Conexao::conectar();
        $pst = $con->prepare("select * from notas");
        $pst->execute();
        $dados = $pst->fetchAll(PDO::FETCH_ASSOC);
        $retorno = array();
        foreach($dados as $dado){
            $nota = new Nota($dado['codigo'],$dado['descricao'],$dado['tipo']);
            array_push($retorno, $nota);
        }
        return $retorno;
    
    }

    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($var){
        $this->codigo = $var;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($var){
        $this->descricao = $var;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function setTipo($var){
        $this->tipo = $var;
    }
}

?>
