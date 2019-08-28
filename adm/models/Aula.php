<?php
class Aula extends Model {

    public function salvar($nome, $url, $id_curso, $id_modulo) {

        $nao = 'NÃO';

        $sql = $this->pdo->prepare("INSERT INTO aula (id, nome, url, id_curso, id_modulo, assistido) VALUES (NULL, ?, ?, ?, ?, ?)");
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $url);
        $sql->bindParam(3, $id_curso);
        $sql->bindParam(4, $id_modulo);
        $sql->bindParam(5, $nao);
        $sql->execute();
    }

    public function editar($nome, $url, $id_modulo, $id_curso, $id) {
        $dados = array();
    
        $sql = $this->pdo->prepare("UPDATE aula SET nome = ?, url = ?, id_modulo = ?, id_curso = ? WHERE id = ?");
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $url);
        $sql->bindParam(3, $id_modulo);
        $sql->bindParam(4, $id_curso);
        $sql->bindParam(5, $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetch();
        }

        return $dados;
    }

    public function excluir($id) {            
        $sql = $this->pdo->prepare("DELETE FROM aula WHERE id = ? LIMIT 1");
        $sql->bindParam(1, $id);
        $sql->execute();
    }

    public function getAula() {
        $dados = array();

        $sql = $this->pdo->prepare("SELECT * FROM aula ORDER BY id");
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();
        }

	return $dados;
    }

    public function getAulas($id) {
        $dados = array();

        $sql = $this->pdo->prepare("SELECT * FROM aula WHERE id_modulo = ? ORDER BY id");
        $sql->bindParam(1, $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();
        }

		return $dados;
    }
}