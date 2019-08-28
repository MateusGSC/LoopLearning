<?php
class aulaController extends Controller {

    public function index() {
        if(empty($_SESSION['LoginIns'])) {
            header("Location: ".BASE."login");
            exit;
        }
        
        $dados = array();

        $c = new Curso();
        $i = new Instrutor();

        $id = $_SESSION['LoginIns']['id'];

        $dados['cursos'] = $c->getCursosDoInstrutor($id);

        $this->loadTemplate('aula', $dados);
    }

    public function salvar(){
        if(empty($_SESSION['LoginIns'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();

        $a = new Aula();

        $dados['aulas'] = $a->getAula();

        $nome = $url = $id_modulo = $id_curso =  "";

        if (isset($_POST["nome"])) 
            $nome = trim($_POST["nome"]);
        if (isset($_POST["url"])) 
            $url = trim($_POST["url"]);
        if (isset($_POST['id_curso']))
            $id_curso = trim($_POST['id_curso']);
        if (isset($_POST['id_modulo']))
            $id_modulo = trim($_POST['id_modulo']);


        if (empty($nome)) {
            echo "<script>alert('Preencha o nome!');history.back();</script>";
            exit;
        } else if (empty($url)) {
            echo "<script>alert('Preencha a url!');history.back();</script>";
            exit; 
        } else if (empty($id_curso)) {
            echo "<script>alert('Preencha o curso!');history.back();</script>";
            exit;
        } else if (empty($id_modulo)) {
            echo "<script>alert('Preencha o módulo!');history.back();</script>";
            exit; 
        } else {
            if (!$a->salvar($nome, $url, $id_curso, $id_modulo)) {
                echo "<script>alert('Aula cadastrada com sucesso!');location.href='".BASE."aula';</script>";
            } else {
                echo "<script>alert('ERRO! Não foi possível cadastrar!');history.back();</script>";
            }
        } 
        
        $this->loadTemplate('aula', $dados);
    }

    public function editar() {
        if(empty($_SESSION['LoginIns'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();
        
        $a = new Aula();

        $id = $nome = $url = "";

        if (isset($_POST["id"]))
            $id = trim($_POST["id"]);
        if (isset($_POST["nome"])) 
            $nome = trim($_POST["nome"]);
        if (isset($_POST["url"])) 
            $url = trim($_POST["url"]);
        if (isset($_POST["id_moduloo"]))
            $id_modulo = trim($_POST["id_moduloo"]);
        if (isset($_POST["id_cursoo"]))
            $id_curso = trim($_POST["id_cursoo"]);
    
        if (empty($nome)) {
            echo "<script>alert('Preencha o nome!');history.back();</script>";
            exit;
        } else if (empty($url)) {
            echo "<script>alert('Preencha a URL!');history.back();</script>";
            exit;
        } else {
            if (!$a->editar($nome, $url, $id_modulo, $id_curso, $id)) {
                echo "<script>alert('Aula editada com sucesso!');history.back();</script>";
                exit;
            } else {
                echo "<script>alert('ERRO! Não é possível editar!');history.back();</script>";
                exit;
            }
        }
        
        $this->loadTemplate('aula', $dados);

    }

    public function excluir($id){
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();

        $a = new Aula();
        
        if(isset($id) && !empty($id)) {
            $id = trim($id);
            
            if(!$a->excluir($id)) {
                echo "<script>alert('Aula removida com sucesso!');history.back();</script>";
                exit;
            } else {
                echo "<script>alert('ERRO! Não é possível remover!');history.back();</script>";
                exit;
            }
        }
        
        $this->loadTemplate('aula', $dados);
    }

    public function exibir_modulos() {
        if(empty($_SESSION['LoginIns'])) {
            header("Location: ".BASE."login");
            exit;
        }
        
        $dados = array();

        if(isset($_POST['id_curso'])) {
            $id_curso = trim($_POST['id_curso']);

            $m = new Modulo();
            
            $dados = $m->getModulos($id_curso);

            echo json_encode($dados);
            exit;
        }   
    }
}