<?php
class Curso extends Model {

    private $array;

    public function getCursos() {
        $dados = array();

        $sql = $this->pdo->prepare("SELECT * FROM curso ORDER BY nome");
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();
		}

		return $dados;
    }

    public function getCursosDoAluno($id) {
        $array = array();

        $sql = $this->pdo->prepare("SELECT aluno_curso.id_curso,curso.id,curso.nome,curso.imagem FROM aluno_curso LEFT JOIN curso ON aluno_curso.id_curso = curso.id WHERE aluno_curso.id_aluno = ?");
        $sql->bindParam(1, $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getCursosDeAula($id_aula) {
        $array = array();

        $sql = $this->pdo->prepare("SELECT c.id,c.nome FROM aula a INNER JOIN curso c ON c.id = a.id_curso WHERE a.id = ?");
        $sql->bindParam(1, $id_aula);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

		return $array;
    }

    public function totalDeAulas($id) {
        $array = array();

        $sql = $this->pdo->prepare("SELECT COUNT(*) as totalDeAulas FROM aula WHERE id_curso = ?");
        $sql->bindParam(1, $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_OBJ);

            return $array;
        }
    }

    public function totalDeAulasAssistidas($id) {
        $array = array();

        $sql = $this->pdo->prepare("SELECT COUNT(*) as totalDeAulasAssistidas FROM aula WHERE id_curso = ? AND assistido = 'SIM'");
        $sql->bindParam(1, $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_OBJ);

            return $array;
        }
    }

    public function setCurso($id) {
        $array = array();

        $sql = $this->pdo->prepare("SELECT * FROM curso WHERE id = ?");
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
        return $this->array['descricao'];
    }
}

