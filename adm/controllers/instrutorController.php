<?php
class instrutorController extends Controller {

    public function index() {
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();

        $i = new Instrutor();

        $dados['instrutores'] = $i->getInstrutores();

        $this->loadTemplate('instrutor', $dados);
    }

    public function salvar() {
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();

        $i = new Instrutor();

        $id = $nome = $biografia = $email = $senha = $situacao = "";

        if(isset($_POST["id"]))
            $id = trim($_POST["id"]);
        if(isset($_POST["nome"])) 
            $nome = trim($_POST["nome"]);
        if(isset($_POST["email"])) 
            $email = trim($_POST["email"]);
        if(isset($_POST["senha"]))
            $senha = trim($_POST["senha"]);
        if(isset($_POST["biografia"]))
            $biografia = trim($_POST["biografia"]);
        if(isset($_POST["situacao"]))
            $situacao = trim($_POST["situacao"]);
    
        if(empty($nome)) {
            echo "<script>alert('Preencha o nome!');history.back();</script>";
            exit;
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Preencha o e-mail corretamente!');history.back();</script>";
            exit;
        } else if(empty($senha)) {
            echo "<script>alert('Preencha a senha!');history.back();</script>";
            exit;
        } else if(empty($biografia)) {
            echo "<script>alert('Preencha a biografia!');history.back();</script>";
            exit;
        } else if(empty($situacao)) {
            echo "<script>alert('Preencha a situação!');history.back();</script>";
            exit;
        } else {
            $senha = password_hash($senha, PASSWORD_DEFAULT);

            if ($i->salvar($nome, $biografia, $email, $senha, $situacao)){
                echo "<script>alert('Instrutor cadastrado com sucesso!');location.href='".BASE."instrutor';</script>";
                exit;
            } else {
                echo "<script>alert('E-mail já cadastrado no sistema.');history.back();</script>";
                exit;
            }
        }

        $this->loadTemplate('instrutor', $dados);
    }

    public function editar() {
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();
        
        $i = new Instrutor();
        $a = new Adm();

        $id = $nome = $email = $senha = $biografia = $situacao = "";

        if (isset($_POST["id"]))
            $id = trim($_POST["id"]);
        if (isset($_POST["nome"])) 
            $nome = trim($_POST["nome"]);
        if (isset($_POST["email"])) 
            $email = trim($_POST["email"]);
        if (isset($_POST["senha"])) 
            $senha = trim($_POST["senha"]);
        if (isset($_POST["biografia"]))
            $biografia = trim($_POST["biografia"]);
        if (isset($_POST["situacao"]))
            $situacao = trim($_POST["situacao"]);
    
        if (empty($nome)) {
            echo "<script>alert('Preencha o nome!');history.back();</script>";
            exit;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Preencha o e-mail corretamente!');history.back();</script>";
            exit;
        } else if (empty($biografia)) {
            echo "<script>alert('Preencha a biografia!');history.back();</script>";
            exit;
        } else if (empty($situacao)) {
            echo "<script>alert('Preencha a situação!');history.back();</script>";
            exit;
        } else {
            if (empty($senha)) {
                if (!$i->editar($nome, $biografia, $email, $situacao, $id)) {
                        echo "<script>alert('Instrutor editado com sucesso!');location.href='".BASE."instrutor';</script>";
                        exit;
                } else {
                    echo "<script>alert('ERRO!');history.back();</script>";
                    exit;
                }
            } else {
                $senha = password_hash($senha, PASSWORD_DEFAULT);

                if (!$i->editarSenha($nome, $biografia, $email, $senha, $situacao, $id)) {
                    echo "<script>alert('Instrutor editado com sucesso!');location.href='".BASE."instrutor';</script>";
                    exit;
            } else {
                echo "<script>alert('ERRO!');history.back();</script>";
                exit;
            }
        }
    } 
        $this->loadTemplate('instrutor', $dados);
    }


    public function excluir($id){
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }
        
        $dados = array();
        
        if (isset($id) && !empty($id)) {
            $i = new Instrutor();

             if ($i->excluir($id)) {
                echo "<script>alert('Instrutor removido com sucesso!');location.href='".BASE."instrutor';</script>";
                exit;
            } else if ($i->inativar($id)) {
                echo "<script>alert('O Instrutor nao pode ser excluido, pois tem ligacao com um curso.\\nE sera inativado!');location.href='".BASE."instrutor';</script>";
                exit;
            } else {
                echo "<script>alert('ERRO! Não é possível remover!');history.back();</script>";
                exit;
            }
        } 
            
        $this->loadTemplate('instrutor', $dados);
    }

}