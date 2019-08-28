<?php
class dashboardController extends Controller {

    public function index() {
        if(empty($_SESSION['LoginAln'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $array = array(
            'cursos' => array()
        );

        $c = new Curso();
        $h = new Historico();

        $array['uas'] = $h->getUltimasAulasAssistidas();
        $array['cursos'] = $c->getCursosDoAluno($_SESSION['LoginAln']['id']);

        $this->loadTemplate('dashboard', $array);
    }

    public function dadosCursos() {
        $array = array();

        $h = new Historico();

        if(isset($_POST['id'])) {
            if ($totalAssistidas = $h->totalAssistidas($_POST['id'])){
               
            echo json_encode($totalAssistidas);
            }else {
                return false;
            }

        }
    }
    
    public function dadosCursos2() {
        $array = array();

        $h = new Historico();

        if(isset($_POST['id'])) {
            if ($totalNaoAssistidas = $h->totalNaoAssistidas($_POST['id'])){
            echo json_encode($totalNaoAssistidas);
            }else {
                return false;
            }
        }
    }

}