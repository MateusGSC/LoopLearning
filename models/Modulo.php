<?php
class Modulo extends Model {

    public function getModulos($id_curso) {
        $array = array();

        $sql = $this->pdo->prepare("SELECT * FROM modulo WHERE id_curso = ?");
        $sql->bindParam(1, $id_curso);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();

            $a = new Aula();

            foreach($array as $mChave => $mDados) {
                $array[$mChave]['aulas'] = $a->getAulas($mDados['id']);
            }
        }

		return $array;
    }

    public function getModulosDeAula($id_aula) {
        $array = array();

        $sql = $this->pdo->prepare("SELECT m.nome FROM aula a INNER JOIN modulo m ON m.id = a.id_modulo WHERE a.id = ?");
        $sql->bindParam(1, $id_aula);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

		return $array;
    }
}