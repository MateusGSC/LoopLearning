<?php
class ajaxController extends Controller {

    public function index() {
        if(empty($_SESSION['LoginAln'])) {
            header("Location: ".BASE."login");
            exit;
        }
    }

    public function marcarAssistido($id) {
        $a = new Aula();

        $a->marcarAssistido($id);
    }
}