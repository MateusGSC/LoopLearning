<?php
class matriculadoController extends Controller {

    public function index() {
        if(empty($_SESSION['LoginIns'])) {
            header("Location: ".BASE."login");
            exit;
        }
        
        $dados = array(
            'cursos' => array()
        );

        $c = new Curso();

        $dados['cursos'] = $c->getCursosDoInstrutor($_SESSION['LoginIns']['id']);

        $this->loadTemplate('matriculado', $dados);
    }

    public function relatorio() {
        $dados = array();

        $m = new Matriculado();

        if (isset($_POST['id_curso'])) {
            $total = $m->totalAlunos($_POST['id_curso']);
            if ($dadosAlunos = $m->dadosAlunos($_POST['id_curso'])){
                $dados['total'] = $total;
                $dados['dadosAlunos'] = $dadosAlunos;

                $this->loadTemplate('alunosMatriculado', $dados);
            } else {
                echo "<script>alert('ERRO! Não foi possível cadastrar!');history.back();</script>";
            }
        } else {
            echo "<script>alert('ERRO! Não foi possível cadastrar!');history.back();</script>";
        }
    }
}