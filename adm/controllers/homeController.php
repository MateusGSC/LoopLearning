<?php
class homeController extends Controller {

    public function __construct() {
        $a = new Adm();

        if(!$a->isLogged()) {
            header("Location: ".BASE."login");
        }
    }

    public function index() {
        if(empty($_SESSION['LoginAdm'])) {
            header("Location: ".BASE."login");
            exit;
        }
        
        $dados = array();

        $a = new Adm();
        $c = new Curso();
        $i = new Instrutor();
        $al = new Aluno();

        $totalCursos = $c->getTotalCursos();
        $dados['totalCursos'] = $totalCursos;

        $totalInstrutores = $i->getTotalInstrutores();
        $dados['totalInstrutores'] = $totalInstrutores;

        $totalAlunos = $al->getTotalAlunos();
        $dados['totalAlunos'] = $totalAlunos;


        $this->loadTemplate('home', $dados);
    }
}