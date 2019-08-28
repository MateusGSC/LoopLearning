<?php
class perfilController extends Controller {

    public function index() {
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();

        $a = new Administrador();

        $dados['administradores'] = $a->getAdms();

        $this->loadView('perfil', $dados);
    }

    public function editar() {
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();
        
        $p = new Perfil();

        $id = $nome = "";

        if (isset($_POST["id"]))
            $id = trim($_POST["id"]);
        if (isset($_POST["nome"])) 
            $nome = trim($_POST["nome"]);

        if (empty($nome)) {
            echo "<script>alert('Preencha o nome!');;</script>";
            exit;
        } else {
            if (!$p->editar($nome, $id)) {
                echo "<script>alert('Nome editado com sucesso!');history.back();</script>";
                exit;
            } else {
                echo "<script>alert('ERRO!');history.back();</script>";
                exit;
            }
        }

        $this->loadView('perfil', $dados);
    }

    public function editarSenha() {
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();
        
        $p = new Perfil();

        $id = $senha = "";

        if (isset($_POST["id"]))
            $id = trim($_POST["id"]);
        if (isset($_POST["senha"])) 
            $senha = trim($_POST["senha"]);

        if (empty($senha)) {
            echo "<script>alert('Preencha a senha!');;</script>";
            exit;
        } else {
            $senha = password_hash($senha, PASSWORD_DEFAULT);
            
            if (!$p->editarSenha($senha, $id)) {
                echo "<script>alert('Senha editada com sucesso!');history.back();</script>";
                exit;
            } else {
                echo "<script>alert('ERRO!');history.back();</script>";
                exit;
            }
        }

        $this->loadView('perfil', $dados);
    }
}