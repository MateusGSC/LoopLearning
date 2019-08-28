<?php
class loginController extends Controller {

    public function index() {
        $dados = array();

        $this->loadView('login', $dados);
    }

    public function verificar(){
        $dados = array();

        $a = new Adm();

        if ($_POST) {

            $email = $senha = "";

        if (isset($_POST["email"]))
			$email = trim($_POST["email"]);
		if (isset ($_POST["senha"]))
			$senha = trim($_POST["senha"]);

        if (empty($email)) {
            echo "<script>alert('Preencha o e-mail!');history.back();</script>";
            exit;
		} else if(empty($senha)) {
            echo "<script>alert('Preencha a senha!');history.back();</script>";
            exit;
        } else {
            $res = $a->login($email);

            if (empty($res->id)) {
                echo "<script>alert('Usuário não encontrado!');history.back();</script>";
                exit;
            } else if (!password_verify($senha, $res->senha)) {
                echo "<script>alert('E-mail ou senha inválidos!');history.back();</script>";
                exit;
            } else if ($res->situacao != "ATIVO") {
                echo "<script>alert('Usuário Inativo!');history.back();</script>";
                exit;
			} else {
                $_SESSION['LoginAdm'] = array(
                    'id' => $res->id,
                    'nome' => $res->nome,
                    'email' => $res->email,
                    'situacao' => $res->situacao
                );
                
                header("Location: ".BASE."home");
            }
        }   
    }
        $this->loadView('login', $dados);
    }

    public function sair() {
        unset($_SESSION['LoginAdm']);
        header("Location: ".BASE);
    }

}