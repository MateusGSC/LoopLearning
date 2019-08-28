<?php
class homeController extends Controller {

    public function __construct() {
        $i = new Instrutor();

        if(!$i->isLogged()) {
            header("Location: ".BASE."login");
        }
    }

    public function index() {
        if(empty($_SESSION['LoginIns'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $dados = array();

        $c = new Curso();

        $totalMeusCursos = $c->getTotalMeusCursos();
        $dados['totalMeusCursos'] = $totalMeusCursos;

        $this->loadTemplate('home', $dados);
    }

}