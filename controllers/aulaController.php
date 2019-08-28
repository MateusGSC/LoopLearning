<?php
class aulaController extends Controller {

    public function index() {
        if(empty($_SESSION['LoginAln'])) {
            header("Location: ".BASE."login");
            exit;
        }
    }

    public function assistir($id_aula) {
        $array = array(
            'cursos' => array(),
            'modulos' => array(),
            'aulas' => array()
        );

        $a = new Aluno();
        $al = new Aula();
        $m = new Modulo();
        $h = new Historico();

        //Retorna qual o curso da aula.
        if ($id = $al->getCursoDeAula($id_aula)) {
        

            if ($a->Inscrito($id)) {
                $c = new Curso();
                $c->setCurso($id);
                $array['cursos'] = $c;

                $array['historico'] = $h->getDataAssistida($id_aula);
                $array['aulas'] = $al->getAula($id_aula);
                $array['modulos'] = $m->getModulosDeAula($id_aula);
                $array['cursos'] = $c->getCursosDeAula($id_aula);
        
                $this->loadTemplate('assistir-aula', $array);
            } else {
                header("Location".BASE);
            }

        } else {
            echo "<script>alert('Erro ao carregar!');history.back();</script>";
        }    
    }


    public function proximaAula() {
        if(empty($_SESSION['LoginAln'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $a = new Aula();

        $id = $_POST['id'];

        if ($result = $a->proximaAula($id)) {
            
            echo json_encode($result['id']);
            exit;

        } else if ($result = $a->buscaridmodulo($id)) {

            $id_modulo = $result['id_modulo'];

            $id_curso = $result['id_curso'];

            if ($dadosresult = $a->proximoModulo($id_modulo, $id_curso)) {

                $id_aula = $dadosresult['id'];

                echo json_encode($id_aula);
                exit;
            } else {
                echo json_encode("ERRO2");
                exit;
            }
            
        } else {
            echo json_encode("ERRO1");
            exit;
        }
    }

    public function aulaAnterior() {
        if(empty($_SESSION['LoginAln'])) {
            header("Location: ".BASE."login");
            exit;
        }

        $a = new Aula();

        $id = $_POST['id'];

        if ($result = $a->aulaAnterior($id)) {
            
            echo json_encode($result['id']);
            exit;

        } else if ($result = $a->buscaridmodulo($id)) {

            $id_modulo = $result['id_modulo'];

            if ($dadosresult = $a->moduloAnterior($id_modulo)) {

                $id_aula = $dadosresult['id'];

                echo json_encode($id_aula);
                exit;
            } else {
                echo json_encode("ERRO2");
                exit;
            }
            
        }else {
            echo json_encode("ERRO1");
            exit;
        }
    }
}