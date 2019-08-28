<?php
class Curso extends Model {

    private $dados;

    public function salvar($nome, $descricao, $md5name, $id_instrutor) {
        $this->pdo->beginTransaction();

        $sql = $this->pdo->prepare('INSERT INTO curso (id, nome, imagem, descricao) VALUES (NULL, ?, ?, ?)');
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $md5name);
        $sql->bindParam(3, $descricao);
       
        if ($sql->execute()) {

            $id_curso = $this->pdo->lastInsertId();

            $sql = $this->pdo->prepare("INSERT INTO instrutor_curso (id, id_instrutor, id_curso) VALUES (NULL, ?, ?)");
            $sql->bindParam(1, $id_instrutor);
            $sql->bindParam(2 , $id_curso);

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

    public function matricula($id_curso,$id_aluno) {
        $sql = $this->pdo->prepare("INSERT INTO aluno_curso (id, id_aluno, id_curso) VALUES (NULL, ?, ?)");
        $sql->bindParam(1, $id_aluno);
        $sql->bindParam(2 , $id_curso);
       
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
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

    public function getCursosDoInstrutor($id) {
        $array = array();

        $sql = $this->pdo->prepare("SELECT instrutor_curso.id_curso,curso.id,curso.nome,curso.descricao,curso.imagem FROM instrutor_curso LEFT JOIN curso ON instrutor_curso.id_curso = curso.id WHERE instrutor_curso.id_instrutor = ?");
        $sql->bindParam(1, $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
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
    
    public function getTotalMeusCursos() {
        $sql = $this->pdo->query("SELECT COUNT(*) as c FROM curso c INNER JOIN instrutor_curso ic ON c.id = ic.id_instrutor WHERE ic.id_instrutor = {$_SESSION['LoginIns']['id']}");
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

