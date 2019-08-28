<?php
class cursoController extends Controller {

    public function index() {
        if(empty($_SESSION['LoginAln'])) {
            header("Location: ".BASE."login");
            exit;
        }
    }

    public function dados($id) {
        $array = array(
            'cursos' => array(),
            'modulos' => array(),
            'instrutor' => array()
        );

        $a = new Aluno();
        $c = new Curso();
        $m = new Modulo();
        $i = new Instrutor();

        $c->setCurso($id);
        $array['cursos'] = $c;

        $array['modulos'] = $m->getModulos($id);

        $array['instrutor'] = $i->getCursosDoInstrutor($id);

        $this->loadTemplate('dados', $array);
    }

    public function adicionar() {
        $array = array();
        $a = new Aluno();
        $c = new Curso();


        if ($_POST) {
            $id_curso = "";

            if (isset ($_POST["id_curso"]))
                $id_curso = trim($_POST["id_curso"]);

            $id_aluno = $_SESSION['LoginAln']['id'];
    
            if ($a->Inscrito($id_curso)) {
                echo "<script>alert('Voce já está cadastrado nesse curso!');location.href='".BASE."home';</script>";
                exit;
            } else {
                $a->matricula($id_curso,$id_aluno);
                header("Location: ".BASE."cursos");
            }
        }

        $this->loadTemplate('cursos', $array);
    }

    public function conteudo($id) {
        $array = array(
            'cursos' => array(),
            'modulos' => array(),
            'aulas' => array(),
            'instrutor' => array()
        );

        $a = new Aluno();
        $c = new Curso();
        $m = new Modulo();
        $al = new Aula();
        $i = new Instrutor();

        $c->setCurso($id);
        $array['cursos'] = $c;
        $array['instrutor'] = $i->getCursosDoInstrutor($id);
        $array['modulos'] = $m->getModulos($id);
        $array['aulas'] = $al->getAula($id);

        if ($a->Inscrito($id)) {
            $c->setCurso($id);
            $array['cursos'] = $c;

            $totalDeAulas = $c->totalDeAulas($id);
            $totalDeAulasAssistidas = $c->totalDeAulasAssistidas($id);
    
            $porcentagem = ($totalDeAulasAssistidas->totalDeAulasAssistidas * 100) / $totalDeAulas->totalDeAulas;
            $array['porcentagem']= $porcentagem;

            $this->loadTemplate('conteudo', $array);
        } else {
            header("Location".BASE);
        }
    }

}