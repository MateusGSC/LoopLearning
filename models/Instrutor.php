<?php
class Instrutor extends Model {

    public function getCursosDoInstrutor($id_curso) {
        $array = array();

        $sql = $this->pdo->prepare("SELECT ic.id_curso, ic.id_instrutor, c.nome, i.nome 
        FROM instrutor_curso ic 
        INNER JOIN instrutor i ON ic.id_instrutor = i.id 
        INNER JOIN curso c ON ic.id_curso = c.id WHERE c.id = ?");
        $sql->bindParam(1, $id_curso);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function setInstrutor($id) {
        $array = array();

        $sql = $this->pdo->prepare("SELECT instrutor.nome,instrutor.biografia FROM instrutor LEFT JOIN instrutor_curso ON instrutor_curso.id_curso = instrutor.id WHERE instrutor.id = ?");
        $sql->bindParam(1, $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $this->array = $sql->fetch();
        }
    }

    public function getId() {
        return $this->array['id'];
    }

    public function getNome() {
        return $this->array['nome'];
    }

    public function getDescricao() {
        return $this->array['biografia'];
    }

}
