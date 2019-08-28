<?php
class Curso extends Model {

    private $dados;

    public function salvar($nome, $md5name, $descricao) {
        $sql = $this->pdo->prepare('INSERT INTO curso (id, nome, imagem, descricao) VALUES (NULL, ?, ?, ?)');
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $md5name);
        $sql->bindParam(3, $descricao);
        
        if ($sql->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function editar($nome, $descricao, $id) {
        $dados = array();
    
        $sql = $this->pdo->prepare("UPDATE curso SET nome = ?, descricao = ? WHERE id = ?");
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $descricao);
        $sql->bindParam(3, $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetch();
        }

        return $dados;
    }

    public function excluir($id) {   
        $sql = $this->pdo->prepare("DELETE FROM aula WHERE id_curso = ?");
        $sql->bindParam(1, $id);
        $sql->execute();

        $sql = $this->pdo->prepare("DELETE FROM modulo WHERE id_curso = ?");
        $sql->bindParam(1, $id);
        $sql->execute();

        $sql = $this->pdo->prepare("DELETE FROM aluno_curso WHERE id_curso = ?");
        $sql->bindParam(1, $id);
        $sql->execute();

        $sql = $this->pdo->prepare("DELETE FROM instrutor_curso WHERE id_curso = ?");
        $sql->bindParam(1, $id);
        $sql->execute();

        $sql = $this->pdo->prepare("DELETE FROM curso WHERE id = ?");
        $sql->bindParam(1, $id);
        $sql->execute();
    }

    public function getCurso($id) {
        $dados = array();

        $sql = $this->pdo->prepare("SELECT nome FROM curso WHERE id = ?");
        $sql->bindParam(1, $id);
        $sql->execute();
        
        if($sql->rowCount() > 0) {
			$dados = $sql->fetch();
		}

		return $dados;
    }

    public function getCursos() {
        $dados = array();

        $sql = $this->pdo->prepare("SELECT * FROM curso ORDER BY nome");
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();
		}

		return $dados;
    }

    public function setCurso($id) {
        $dados = array();

        $sql = $this->pdo->prepare("SELECT * FROM curso WHERE id = ?");
        $sql->bindParam(1, $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $this->dados = $sql->fetch();
        }
    }
    
    public function getTotalCursos() {
        $sql = $this->pdo->query("SELECT COUNT(*) as c FROM curso");
		$row = $sql->fetch();

		return $row['c'];
    }

    public function getNome(){
        return $this->dados['nome'];
    }

    public function getDescricao(){
        return $this->dados['descricao'];
    }
}

