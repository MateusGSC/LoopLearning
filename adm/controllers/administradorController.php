<?php
class administradorController extends Controller {

    public function index() {
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();

        $a = new Administrador();

        $dados['administradores'] = $a->getAdms();

        $this->loadTemplate('administrador', $dados);
    }

    public function salvar() {
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();

        $a = new Administrador();

        $id = $nome = $email = $senha = $situacao = "";

        if(isset($_POST["id"]))
            $id = trim($_POST["id"]);
        if(isset($_POST["nome"])) 
            $nome = trim($_POST["nome"]);
        if(isset($_POST["email"])) 
            $email = trim($_POST["email"]);
        if(isset($_POST["senha"]))
            $senha = trim($_POST["senha"]);
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
        } else if(empty($situacao)) {
            echo "<script>alert('Preencha a situação!');history.back();</script>";
            exit;
        } else {
            $senha = password_hash($senha, PASSWORD_DEFAULT);

            if ($a->salvar($nome, $email, $senha, $situacao)){
                echo "<script>alert('Administrador cadastrado com sucesso!');location.href='".BASE."administrador';</script>";
                exit;
            } else {
                echo "<script>alert('E-mail já cadastrado no sistema.');history.back();</script>";
                exit;
            }
        }

        $this->loadTemplate('administrador', $dados);
    }

    public function editar() {
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();
        
        $a = new Administrador();

        $id = $nome = $email = $senha = $situacao = "";

        if (isset($_POST["id"]))
            $id = trim($_POST["id"]);
        if (isset($_POST["nome"])) 
            $nome = trim($_POST["nome"]);
        if (isset($_POST["email"])) 
            $email = trim($_POST["email"]);
        if (isset($_POST["senha"])) 
            $senha = trim($_POST["senha"]);
        if (isset($_POST["situacao"]))
            $situacao = trim($_POST["situacao"]);
    
        if (empty($nome)) {
            echo "<script>alert('Preencha o nome!');history.back();</script>";
            exit;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Preencha o e-mail corretamente!');history.back();</script>";
            exit;
        } else if (empty($situacao)) {
            echo "<script>alert('Preencha a situação!');history.back();</script>";
            exit;
        } else {
            if ($_SESSION['LoginAdm']['id'] == $id) {
                echo "<script>alert('O Usuário não pode ser inativado, pois está logado!');location.href='".BASE."administrador';</script>";
                exit;
            } else if (empty($senha)) {
                if (!$a->editar($nome, $email, $situacao, $id)) {
                        echo "<script>alert('Administrador editado com sucesso!');location.href='".BASE."administrador';</script>";
                        exit;
                } else {
                    echo "<script>alert('ERRO!');history.back();</script>";
                    exit;
                }
            } else {
                $senha = password_hash($senha, PASSWORD_DEFAULT);

                if (!$a->editarSenha($nome, $email, $senha, $situacao, $id)) {
                    echo "<script>alert('Administrador editado com sucesso!');location.href='".BASE."administrador';</script>";
                    exit;
            } else {
                echo "<script>alert('ERRO!');history.back();</script>";
                exit;
            }
        }
    } 
        $this->loadTemplate('administrador', $dados);
    }


    public function excluir($id){
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }
        
        $dados = array();
        
        if (isset($id) && !empty($id)) {
            $id = trim($id);

            $a = new Administrador();
            $adm = new Adm();

            if ($_SESSION['LoginAdm']['id'] == $id) {
                echo "<script>alert('O Usuário não pode ser removido, pois está logado!');location.href='".BASE."administrador';</script>";
                exit;
            } else if ($a->excluir($id)) {
                echo "<script>alert('Administrador removido com sucesso!');location.href='".BASE."administrador';</script>";
                exit;
            } else {
                echo "<script>alert('ERRO! Não é possível remover!');history.back();</script>";
                exit;
            }
        } 
            
        $this->loadTemplate('administrador', $dados);
    }

}