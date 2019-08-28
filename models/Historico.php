<?php 
class Historico extends Model {

    private $array;

    public function getDataAssistida($id_aula) {
        $array = array();

        $sql = $this->pdo->prepare("SELECT dataView FROM historico_visualizacao WHERE id_aula = ?");
        $sql->bindParam(1, $id_aula);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
            return $array;
        } else {
            return false;
        }
    }

    public function getUltimasAulasAssistidas() {
        $array = array();

        $sql = $this->pdo->prepare("SELECT nome a FROM historico_visualizacao hv INNER JOIN aula a ON a.id = hv.id_aula ORDER BY hv.dataView DESC LIMIT 10");
        $sql->execute();

        if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

        return $array;
    }

    public function totalAssistidas($id_curso) {
        $array = array();

        $sql = $this->pdo->prepare("SELECT COUNT(*) totalAssistidas FROM aula WHERE id_curso = ? AND assistido = 'SIM'");
        $sql->bindParam(1, $id_curso);
        $sql->execute();

        if($sql->rowCount() > 0) {
			$array = $sql->fetch(PDO::FETCH_OBJ);
		}else {
            return false;
        }

        return $array;
    }

    public function totalNaoAssistidas($id_curso) {
        $array = array();

        $sql = $this->pdo->prepare("SELECT COUNT(*) totalNaoAssistidas FROM aula WHERE id_curso = ? AND assistido = 'NÃO'");
        $sql->bindParam(1, $id_curso);
        $sql->execute();

        if($sql->rowCount() > 0) {
			$array = $sql->fetch(PDO::FETCH_OBJ);
		}else {
            return false;
        }

        return $array;
    }
}
