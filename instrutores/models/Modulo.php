<?php
class Modulo extends Model {

    public function salvar($nome, $id_curso) {
            
        $sql = $this->pdo->prepare("INSERT INTO modulo (id, nome, id_curso) VALUES (NULL, ?, ?)");
        $sql->bindParam(1, $nome);  
        $sql->bindParam(2, $id_curso);
        $sql->execute();
    }

    public function editar($nome, $id_curso, $id) {
        $dados = array();
    
        $sql = $this->pdo->prepare("UPDATE modulo SET nome = ?, id_curso = ? WHERE id = ?");
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $id_curso);
        $sql->bindParam(3, $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetch();
        }

        return $dados;
    }

    public function excluir($id) {            
        $sql = $this->pdo->prepare("DELETE FROM aula WHERE id_modulo = ? LIMIT 1");
        $sql->bindParam(1, $id);
        $sql->execute();

        $sql = $this->pdo->prepare("DELETE FROM modulo WHERE id = ? LIMIT 1");
        $sql->bindParam(1, $id);
        $sql->execute();
    }

    public function getModulos($id_curso) {
        $dados = array();

        $sql = $this->pdo->prepare("SELECT * FROM modulo WHERE id_curso = ?");
        $sql->bindParam(1, $id_curso);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();

            $a = new Aula();

            foreach($dados as $mChave => $mDados) {
                $dados[$mChave]['aulas'] = $a->getAulas($mDados['id']);
            }
        }

		return $dados;
    }
    
}