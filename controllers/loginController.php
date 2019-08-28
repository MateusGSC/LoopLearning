<?php
class loginController extends Controller {

    public function index() {
        $array = array(
            'cursos' => array()
        );

        $c = new Curso();
        
        if(!empty($_POST["id_curso"])) {
            $id_curso =  trim($_POST["id_curso"]);
            $array['id_curso'] = $id_curso;
        }

        $this->loadView('login', $array);
    }

    public function verificar(){
        $array = array();

        $a = new Aluno();

        if ($_POST) {

        $email = $senha = $id_curso = "";

        if (isset($_POST["email"]))
			$email = trim($_POST["email"]);
		if (isset ($_POST["senha"]))
            $senha = trim($_POST["senha"]);
        if (isset ($_POST["id_curso"]))
            $id_curso = trim($_POST["id_curso"]);
            
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
            } else if ((empty($id_curso)) && (!password_verify($senha, $res->senha))){
                //echo "<script>alert('E-mail ou senha inválidos!');location.href='".BASE."curso/dados/".$id_curso."';</script>";
                echo "<script>alert('E-mail ou senha inválidos!');history.back();</script>";
                exit;
            } else if ((!empty($id_curso)) && (!password_verify($senha, $res->senha))) {
                $array['msg'] = "<div class='alert alert-danger' role='alert'>
                    E-mail ou senha inválidos!
                </div>";
                //echo "<script>alert('E-mail ou senha inválidos!');history.back();</script>";
                //exit;
            } else if ($res->situacao != "ATIVO") {
                echo "<script>alert('Usuário Inativo!');history.back();</script>";
                exit;
            } else {
                if (empty($id_curso)) {
                    $_SESSION['LoginAln'] = array(
                        'id' => $res->id,
                        'nome' => $res->nome,
                        'email' => $res->email,
                        'situacao' => $res->situacao
                    );

                    header("Location: ".BASE."cursos");
                } else {
                    $_SESSION['LoginAln'] = array(
                        'id' => $res->id,
                        'nome' => $res->nome,
                        'email' => $res->email,
                        'situacao' => $res->situacao
                    );
                    $id_aluno = $res->id;

                    if ($a->Inscrito($id_curso)) {
                        echo "<script>alert('Voce já está cadastrado nesse curso!');location.href='".BASE."home';</script>";
                        exit;
                    } else {
                        $a->matricula($id_curso,$id_aluno);
                    }

                    header("Location: ".BASE."cursos");
                }
            }

                $this->loadView('login', $array);
            }   
        }
        
    }

    public function sair() {
        unset($_SESSION['LoginAln']);
        header("Location: ".BASE);
    }

}