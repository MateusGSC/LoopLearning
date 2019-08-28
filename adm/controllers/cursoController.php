<?php
class cursoController extends Controller {

    public function index() {
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();

        $c = new Curso();

        $dados['cursos'] = $c->getCursos();

        $this->loadTemplate('curso', $dados);
    }

    public function salvar() {
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();
    
        if (isset($_POST)) {
           
            $nome = trim($_POST['nome']);
            $descricao = trim($_POST['descricao']);
            $imagem = $_FILES['imagem'];

            // if (!empty($imagem['tmp_name'])) {
                $md5name = md5(time().rand(0,9999)).'.jpg';
                //$type = array('image/jpg');
              

                    if (move_uploaded_file($imagem['tmp_name'], "../assets/img/cursos/".$md5name)) {
                        
                        $c = new Curso();
                        
                        if ($c->salvar($nome, $md5name, $descricao)) {
                            echo "<script>alert('Curso cadastrado com sucesso!');location.href='".BASE."curso';</script>";
                        } else {
                            echo "<script>alert('ERRO! Não foi possível cadastrar!');history.back();</script>"; 
                        }

                    } else {
                        echo "erro";
                    }
        } 
    }

    public function editar() {
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();

        $c = new Curso();

        $id = $nome = $descricao = "";

        if (isset($_POST["id"]))
            $id = trim($_POST["id"]);
        if (isset($_POST["nome"])) 
            $nome = trim ($_POST["nome"]);
        if (isset($_POST["descricao"]))
            $descricao = trim($_POST["descricao"]);

        if (empty($nome)) {
            echo "<script>alert('Preencha o nome!');history.back();</script>";
            exit;
        } else if (empty($descricao)) {
            echo "<script>alert('Preencha a descrição!');history.back();</script>";
            exit; 
        } else {
            if (!$c->editar($nome, $descricao, $id)) {
                echo "<script>alert('Curso editado com sucesso!');location.href='".BASE."curso';</script>";
                exit;
            } else {
                echo "<script>alert('ERRO! Não foi possível editar!');history.back();</script>";
                exit;
            }
        }

        $this->loadTemplate('curso', $dados);
    }

    public function excluir($id){
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();

        $c = new Curso();
        
        if(isset($id) && !empty($id)) {
            $id = trim($id);
            
            if(!$c->excluir($id)) {
                echo "<script>alert('Curso removido com sucesso!');location.href='".BASE."curso';</script>";
                exit;
            } else {
                echo "<script>alert('ERRO! Não é possível remover!');history.back();</script>";
                exit;
            }
        }
        
        header("Location: ".BASE."curso");
    }

    public function painel($id) {
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array(
            'info' => array(),
            'cursos' => array(),
            'modulos' => array(),
        );

        $c = new Curso();
        $m = new Modulo();
        
        $c->setCurso($id);
        $dados['cursos'] = $c;

        $dados['modulos'] = $m->getModulos($id);

       $this->loadTemplate('painel', $dados);
    }

}