<?php
class Matriculado extends Model {

    public function totalAlunos($id) {
        $array = array();

        $sql = $this->pdo->prepare("SELECT count(*) totalAlunos FROM aluno_curso ac INNER JOIN aluno al ON al.id = ac.id_aluno WHERE ac.id_curso = ?");
        $sql->bindParam(1, $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
			$array = $sql->fetch(PDO::FETCH_OBJ);
		}else {
            return false;
        }

        return $array;
    }

    public function dadosAlunos($id_curso) {
        $array = array();

        $sql = $this->pdo->prepare("SELECT * FROM aluno_curso ac INNER JOIN aluno al ON al.id = ac.id_aluno WHERE ac.id_curso = ?");
        $sql->bindParam(1, $id_curso);
        $sql->execute();

        if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}else {
            return false;
        }

        return $array;
    }
}