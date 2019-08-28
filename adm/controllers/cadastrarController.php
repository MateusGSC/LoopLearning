<?php
class cadastrarController extends Controller {

    public function index(){
        $dados = array();

        $a = new Aluno();

        $this->loadView('cadastrar', $dados);
    }

    public function salvar(){
        $daods = array();

        $a = new Aluno();

        $dados['alunos'] = $a->getAlunos();

        $nome = $email = $senha = $situacao = "";

        if ( isset ( $_POST["nome"] ) ) 
            $nome = trim ( $_POST["nome"] );
        if ( isset ( $_POST["email"] ) ) 
            $email = trim ( $_POST["email"] );
        if ( isset ( $_POST["senha"] ) )
            $senha = trim ( $_POST["senha"] );
       
            $situacao = 'ATIVO';
    
        if ( empty ( $nome ) ) {
            echo "<script>alert('Preencha o nome!');history.back();</script>";
            exit;
        } else if ( empty ( $email ) ) {
            echo "<script>alert('Preencha o e-mail!');history.back();</script>";
            exit;
        } else if ( empty ( $senha ) ) {
            echo "<script>alert('Preencha a senha!');history.back();</script>";
            exit;
        } else {
            if (!$a->salvar($nome, $email, $senha, $situacao)) {
                echo "<script>alert('Aluno cadastrado com sucesso!');history.back();</script>";
                exit;
            } else {
                echo "<script>alert('ERRO! Não é possível cadastrar!');history.back();</script>";
                exit;
            }
        }

        $this->loadView('cadastrar', $dados);
    }
}