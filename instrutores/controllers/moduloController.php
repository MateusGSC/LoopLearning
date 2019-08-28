<?php
class moduloController extends Controller {

    public function index() {
        if(empty($_SESSION['LoginIns'])) {
            header("Location: ".BASE."login");
            exit;
        }
        
        $dados = array();

        $c = new Curso();

        $id = $_SESSION['LoginIns']['id'];

        $dados['cursos'] = $c->getCursosDoInstrutor($id);

        $this->loadTemplate('modulo', $dados);
    }

    public function salvar() {
        if(empty($_SESSION['LoginIns'])) {
            header("Location: ".BASE."login");
            exit;
        }
        
        $dados = array();

        $m = new Modulo();

        $id = $nome =  "";

        if (isset($_POST["id"]))
            $id = trim($_POST["id"]);
        if (isset($_POST["nome"])) 
            $nome = trim($_POST["nome"]);
        if (isset($_POST['id_curso']))
            $id_curso = trim($_POST['id_curso']);

        if (empty($nome)) {
            echo "<script>alert('Preencha o nome!');history.back();</script>";
            exit;
        } else if (empty($id_curso)) {
            echo "<script>alert('Preencha o curso!');history.back();</script>";
            exit; 
        } else {
            if (!$m->salvar($nome, $id_curso)) {
                echo "<script>alert('Módulo cadastrado com sucesso!');location.href='".BASE."modulo';</script>";
            } else {
                echo "<script>alert('ERRO! Não foi possível cadastrar!');history.back();</script>";
                exit;
            }
        } 

        $this->loadTemplate('modulo', $dados);
    }

    public function editar() {
        if(empty($_SESSION['LoginIns'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();
        
        $m = new Modulo();

        $id = $nome =  "";

        if (isset($_POST["id"]))
            $id = trim($_POST["id"]);
        if (isset($_POST["nome"])) 
            $nome = trim($_POST["nome"]);
        if (isset($_POST["id_curso"]))
            $id_curso = trim ($_POST["id_curso"]);
    
        if (empty($nome)) {
            echo "<script>alert('Preencha o nome!');history.back();</script>";
            exit;
        } else {
            if (!$m->editar($nome, $id_curso, $id)) {
                echo "<script>alert('Módulo editado com sucesso!');history.back();</script>";
                exit;
            } else {
                echo "<script>alert('ERRO! Não é possível editar!');history.back();</script>";
                exit;
            }
        }
        
        $this->loadTemplate('modulo', $dados);

    }

    public function excluir($id){
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();
        
        if(isset($id) && !empty($id)) {
            $m = new Modulo();
            
            if(!$m->excluir($id)) {
                echo "<script>alert('Módulo removido com sucesso!');history.back();</script>";
                exit;
            } else {
                echo "<script>alert('ERRO! Não é possível remover!');history.back();</script>";
                exit;
            }
        }
        
        $this->loadTemplate('modulo', $dados);
    }
}