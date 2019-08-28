<?php
class cursosController extends Controller {

    public function __construct() {
        $a = new Aluno();

        if(!$a->isLogged()) {
            header("Location: ".BASE."login");
        }
    }

    public function index() {
        if(empty($_SESSION['LoginAln'])) {
            header("Location: ".BASE."login");
            exit;
        }
        
        $array = array(
            'cursos' => array()
        );

        $c = new Curso();
        $array['cursos'] = $c->getCursosDoAluno($_SESSION['LoginAln']['id']);


        $this->loadTemplate('cursos', $array);
    }

}