<?php
class Aluno extends Model {

    private $info;

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

	public function editar($nome, $email, $situacao, $id) {
        $dados = array();
    
        $sql = $this->pdo->prepare("UPDATE aluno SET nome = ?, email = ?, situacao = ? WHERE id = ?");
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $email);
        $sql->bindParam(3, $situacao);
        $sql->bindParam(4, $id);
        $sql->execute();

        return $dados;
    }

    public function editarSenha($nome, $email, $senha, $situacao, $id) {
        $dados = array();
    
        $sql = $this->pdo->prepare("UPDATE aluno SET nome = ?, email = ?, senha= ?, situacao = ? WHERE id = ?");
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $email);
        $sql->bindParam(3, $senha);
        $sql->bindParam(4, $situacao);
        $sql->bindParam(5, $id);
        $sql->execute();

        return $dados;
    }

    public function excluir($id) {
        $sql = $this->pdo->prepare("DELETE FROM aluno WHERE id = ? LIMIT 1");
        $sql->bindParam(1, $id);
        
        if ($sql->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function inativar($id) {
        $sql = $this->pdo->prepare("SELECT * FROM aluno_curso WHERE id_aluno = ? LIMIT 1");
        $sql->bindParam(1, $id);
 
        if($sql->execute()) {
             $situacao = "INATIVO";
 
             $sql = $this->pdo->prepare("UPDATE aluno SET situacao = '$situacao' WHERE id = ? LIMIT 1");
             $sql->bindParam(1, $id);
            
             if ( $sql->execute()) {
                 return true;
             }else {
                 return false;
             }
        } else {
            return false;
        }
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

    
    public function getTotalAlunos() {
        $sql = $this->pdo->query("SELECT COUNT(*) as a FROM aluno");
		$row = $sql->fetch();

		return $row['a'];
    }

}
