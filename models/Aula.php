<?php 
class Aula extends Model {

    private $array;

    public function getAula($id_aula) {
        $array = array();

        $sql = $this->pdo->prepare("SELECT *, (SELECT COUNT(*) FROM historico_visualizacao WHERE historico_visualizacao.id_aula = aula.id AND historico_visualizacao.id_aluno = '".($_SESSION['LoginAln']['id'])."') as assistido FROM aula WHERE id = ?");
        $sql->bindParam(1, $id_aula);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();

            return $array;
        } else {
            return false;
        }
    }

    public function getAulas($id) {
        $array = array();

        $sql = $this->pdo->prepare("SELECT * FROM aula WHERE id_modulo = ? ORDER BY id");
        $sql->bindParam(1, $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

		return $array;
    }

    public function getCursoDeAula($id_aula) {

        $sql = $this->pdo->prepare("SELECT id_curso FROM aula WHERE id = ?");
        $sql->bindParam(1, $id_aula);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();
            return $row['id_curso'];
        } else {
            return false;
        }
    }

    public function marcarAssistido($id) {
        $this->pdo->beginTransaction();

        $sql = $this->pdo->prepare("INSERT INTO historico_visualizacao SET dataView = NOW(), id_aluno = '".($_SESSION['LoginAln']['id'])."', id_aula = ?");
        $sql->bindParam(1, $id);
       
        if ($sql->execute()) {

            $sql = $this->pdo->prepare("UPDATE aula SET assistido = 'SIM' WHERE id = ?");
            $sql->bindParam(1, $id);

            if ($sql->execute()) {
                $this->pdo->commit();
                return true;
                exit;
            } else {
                $this->pdo->rollBack();
                return false;
                exit;
            }
        } else {
            $this->pdo->rollBack();
            return false;
            exit;
        }
    }

    public function proximaAula($id) {
        $sql = $this->pdo->prepare("SELECT * FROM modulo m INNER JOIN aula a ON a.id_modulo = m.id WHERE a.id = ? LIMIT 1");
        $sql->bindParam(1, $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
                $id_modulo = $array['id_modulo'];

            $sql = $this->pdo->prepare("SELECT * FROM modulo m INNER JOIN aula a ON a.id_modulo = m.id WHERE a.id > ? AND a.id_modulo = ? LIMIT 1");
            $sql->bindParam(1, $id);
            $sql->bindParam(2, $id_modulo);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetch();
                return $array;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function buscaridmodulo($id) {

            $sql = $this->pdo->prepare("SELECT * FROM modulo m INNER JOIN aula a ON a.id_modulo = m.id WHERE a.id = ? LIMIT 1");
            $sql->bindParam(1, $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetch();
                return $array;
            }else {
                return false;
            }

    }

    public function proximoModulo($id_modulo, $id_curso) {
        $sql = $this->pdo->prepare("SELECT * FROM aula WHERE id_modulo > ? AND id_curso = ? LIMIT 1");
        $sql->bindParam(1, $id_modulo);
        $sql->bindParam(2, $id_curso);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
            return $array;
        } else {
            return false;
        }
    }

    public function aulaAnterior($id) {
        $sql = $this->pdo->prepare("SELECT * FROM modulo m INNER JOIN aula a ON a.id_modulo = m.id WHERE a.id = ? LIMIT 1");
        $sql->bindParam(1, $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
                $id_modulo = $array['id_modulo'];

            $sql = $this->pdo->prepare("SELECT * FROM modulo m INNER JOIN aula a ON a.id_modulo = m.id WHERE a.id < ? AND a.id_modulo = ? ORDER BY a.id DESC");
            $sql->bindParam(1, $id);
            $sql->bindParam(2, $id_modulo);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetch();
                return $array;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    public function moduloAnterior($id_modulo) {
        $sql = $this->pdo->prepare("SELECT * FROM modulo WHERE id < ? ORDER BY id DESC LIMIT 1");
        $sql->bindParam(1, $id_modulo);
        
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();

            $id_modulo2 = $array['id'];

            $sql = $this->pdo->prepare("SELECT * FROM aula WHERE id_modulo = ? ORDER BY id DESC limit 1");
            $sql->bindParam(1, $id_modulo2);
            
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $dados = $sql->fetch();

                return $dados;

            } else {
                return false;
            }

        } else {
            return false;
        }
    }
}