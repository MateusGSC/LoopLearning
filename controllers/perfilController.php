<?php
class perfilController extends Controller {

    public function index() {
        if(empty($_SESSION['LoginAln'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $array = array();

        $a = new Aluno();

        $id = $_SESSION['LoginAln']['id'];

        $array['alunos'] = $a->getAluno($id);        

        $this->loadTemplate('perfil', $array);
    }

    public function editar() {
        if(empty($_SESSION['LoginAln'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();
        
        $a = new Aluno();

        $id = $nome = $email = $senha = "";

        if (isset($_POST["id"]))
            $id = trim($_POST["id"]);
        if (isset($_POST["nome"])) 
            $nome = trim($_POST["nome"]);
        if (isset($_POST["email"])) 
            $email = trim($_POST["email"]);
        if (isset($_POST["senha"])) 
            $senha = trim($_POST["senha"]);
    
        if (empty($nome)) {
            echo "<script>alert('Preencha o nome!');history.back();</script>";
            exit;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Preencha o e-mail corretamente!');history.back();</script>";
            exit;
        } else {
            if (empty($senha)) {
                if (!$a->editar($nome, $email, $id)) {
                        echo "<script>alert('Instrutor editado com sucesso!');location.href='".BASE."cursos';</script>";
                        exit;
                } else {
                    echo "<script>alert('ERRO!');history.back();</script>";
                    exit;
                }
            } else {
                $senha = password_hash($senha, PASSWORD_DEFAULT);

                if (!$a->editarSenha($nome, $email, $senha, $id)) {
                    echo "<script>alert('Instrutor editado com sucesso!');location.href='".BASE."cursos';</script>";
                    exit;
            } else {
                echo "<script>alert('ERRO!');history.back();</script>";
                exit;
            }
        }
    } 
        $this->loadTemplate('perfil', $dados);

    }

}