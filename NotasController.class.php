<?php
class NotasController extends Controller{
    public function listar(){
        $notas = Nota::getAllNotas();
        return $this->view('geralNota', ['notas' => $notas]);
    }

    public function excluir($dados){
        $codigo = $dados['codigo'];
        Nota::excluir($codigo);
        return $this->listar();
    }

    public function criar(){
        return $this->view('formNota');
    }

    public function editar($dados){
        $codigo = $dados['codigo'];
        $nota = Nota::getNota($codigo);
        return $this->view('formNota', ['nota' => $nota]);
    }

    public function salvar($dados = null){
        $nota = new Nota();
        if (is_null($dados)){
            $nota->setCodigo(null);
        } else {
            $nota->setCodigo($dados['codigo']);
        }
        $nota->setDescricao($_REQUEST['descricao']);
        $nota->setTipo($_REQUEST['tipo']); 

        if ($nota->salvar()) {
            return $this->listar();
        }
    }

}
