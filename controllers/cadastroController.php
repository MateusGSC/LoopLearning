<?php
class cadastroController extends Controller {

    public function index(){
        $array = array();

        $a = new Aluno();

        $this->loadView('cadastro', $array);
    }

    public function verificar(){
        $array = array();

        $a = new Aluno();

        $nome = $email = $senha = $situacao = "";

        if (isset($_POST["nome"])) 
            $nome = trim ($_POST["nome"]);
        if (isset($_POST["email"])) 
            $email = trim ( $_POST["email"]);
        if (isset($_POST["senha"]))
            $senha = trim($_POST["senha"]);
       
            $situacao = 'ATIVO';
    
        if (empty($nome)) {
            echo "<script>alert('Preencha o nome!');history.back();</script>";
            exit;
        } else if (empty($email)) {
            echo "<script>alert('Preencha o e-mail!');history.back();</script>";
            exit;
        } else if (empty($senha)) {
            echo "<script>alert('Preencha a senha!');history.back();</script>";
            exit;
        } else {
            $senha = password_hash($senha, PASSWORD_DEFAULT);

            if ($a->salvar($nome, $email, $senha, $situacao)) {
                $array['msg'] = "<div class='alert alert-success' role='alert'>
                    Você foi cadastrado! <a href='".BASE."login'> Faça login</a>
                </div>";
            } else {
                echo "<script>alert('ERRO! Não é possível cadastrar!');history.back();</script>";
                exit;
            }
        }

        $this->loadView('cadastro', $array);
    }
}