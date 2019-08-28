<?php
class Instrutor extends Model {
    
    private $info;

    public function salvar($nome, $biografia, $email, $senha, $situacao) {
        $sql = $this->pdo->prepare("INSERT INTO instrutor (id, nome, biografia, email, senha, situacao) VALUES (NULL, ?, ?, ?, ?, ?)");
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $biografia);
        $sql->bindParam(3, $email);
        $sql->bindParam(4, $senha);
        $sql->bindParam(5, $situacao);
        
        if ($sql->execute()) {
            return true;
        } else {
            return false;
        }
    } 

	public function editar($nome, $biografia, $email, $situacao, $id) {
        $dados = array();
    
        $sql = $this->pdo->prepare("UPDATE instrutor SET nome = ?, biografia = ?, email = ?, situacao = ? WHERE id = ?");
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $biografia);
        $sql->bindParam(3, $email);
        $sql->bindParam(4, $situacao);
        $sql->bindParam(5, $id);
        $sql->execute();

        return $dados;
    }

    public function editarSenha($nome, $biografia, $email, $senha, $situacao, $id) {
        $dados = array();
    
        $sql = $this->pdo->prepare("UPDATE instrutor SET nome = ?, biografia = ?, email = ?, senha = ?, situacao = ? WHERE id = ?");
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $biografia);
        $sql->bindParam(3, $email);
        $sql->bindParam(4, $senha);
        $sql->bindParam(5, $situacao);
        $sql->bindParam(6, $id);
        $sql->execute();

        return $dados;
    }

    public function excluir($id) {
        $sql = $this->pdo->prepare("DELETE FROM instrutor WHERE id = ? LIMIT 1");
        $sql->bindParam(1, $id);

        if ($sql->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function inativar($id) {
        $sql = $this->pdo->prepare("SELECT * FROM instrutor_curso WHERE id_instrutor = ? LIMIT 1");
        $sql->bindParam(1, $id);
 
        if($sql->execute()) {
             $situacao = "INATIVO";
 
             $sql = $this->pdo->prepare("UPDATE instrutor SET situacao = '$situacao' WHERE id = ? LIMIT 1");
             $sql->bindParam(1, $id);
            
             if ($sql->execute()) {
                return true;
             } else {
                return false;
             }
        } else {
            return false;
        }
    }

    public function getInstrutor($id) {
        $dados = array();

        $sql = $this->pdo->prepare("SELECT id,nome,biografia,email,senha,situacao FROM instrutor WHERE id = ?");
        $sql->bindParam(1, $id);
        $sql->execute();
        
        if($sql->rowCount() > 0) {
			$dados = $sql->fetch();
		}

		return $dados;
    }

    public function getInstrutores() {
        $dados = array();

        $sql = $this->pdo->prepare("SELECT id,nome,biografia,email,senha,situacao FROM instrutor");
        
        $sql->execute();
        
        if($sql->rowCount() > 0) {
			$dados = $sql->fetchAll();
		}

		return $dados;
    }

    public function CountIntrutores() {
        $dados = array();

        $sql = $this->pdo->prepare("SELECT COUNT(*) AS total FROM instrutor");
        $sql->execute();

        if($sql->rowCount() > 0) {
			$dados = $sql->fetch();
		}

		return $dados;
    }

    public function getTotalInstrutores() {
        $sql = $this->pdo->query("SELECT COUNT(*) as i FROM instrutor");
		$row = $sql->fetch();

		return $row['i'];
    }

}