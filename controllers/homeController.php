<?php
class homeController extends Controller {

    public function __construct() {
    }

    public function index() {
        $array = array(
            'cursos' => array()
        );

        $c = new Curso();
        $array['cursos'] = $c->getCursos();


        $this->loadTemplate('home', $array);
    }
}