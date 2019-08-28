<?php
class Aluno extends Model {

    public function isLogged() {
        if (isset($_SESSION['LoginAln']) && !empty($_SESSION['LoginAln'])) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email) {
        
        $sql = $this->pdo->prepare("SELECT * FROM aluno WHERE email = ? LIMIT 1");
        $sql->bindParam(1, $email);
        $sql->execute();

        $dados = $sql->fetch(PDO::FETCH_OBJ);
        return $dados;
    }

    public function Inscrito($id_curso) {
        $sql = $this->pdo->prepare("SELECT * FROM aluno_curso WHERE id_aluno = '".($_SESSION['LoginAln']['id'])."' AND id_curso = ?");
        $sql->bindParam(1, $id_curso);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
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

    public function salvar($nome, $email, $senha, $situacao) {
        $sql = $this->pdo->prepare("INSERT INTO aluno (id, nome, email, senha, situacao) VALUES (NULL, ?, ?, ?, ?)");
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $email);
        $sql->bindParam(3, $senha); 
        $sql->bindParam(4, $situacao);

        if ($sql->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editar($nome, $email, $id) {
        $dados = array();
    
        $sql = $this->pdo->prepare("UPDATE aluno SET nome = ?, email = ? WHERE id = ?");
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $email);
        $sql->bindParam(3, $id);
        $sql->execute();

        return $dados;
    }

    public function editarSenha($nome, $email, $senha, $id) {
        $dados = array();

        $sql = $this->pdo->prepare("UPDATE aluno SET nome = ?, email = ?, senha = ? WHERE id = ?");
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $email);
        $sql->bindParam(3, $senha);
        $sql->bindParam(4, $id);
        $sql->execute();

        return $dados;
    }

    public function getAluno($id) {
        $dados = array();

        $sql = $this->pdo->prepare("SELECT * FROM aluno WHERE id = ?");
        $sql->bindParam(1, $id);
        $sql->execute();
        
        if($sql->rowCount() > 0) {
			$dados = $sql->fetch();
		}

		return $dados;
    }

    public function getAlunos() {
        $dados = array();

        $sql = $this->pdo->prepare("SELECT * FROM aluno");
        $sql->execute();

        if($sql->rowCount() > 0) {
			$dados = $sql->fetchAll();
		}

		return $dados;
    }
}
