<?php
class Administrador extends Model {
    
    public function salvar($nome, $email, $senha, $situacao) {
        $sql = $this->pdo->prepare("INSERT INTO adm (id, nome, email, senha, situacao) VALUES (NULL, ?, ?, ?, ?)");
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
    
        $sql = $this->pdo->prepare("UPDATE adm SET nome = ?, email = ?, situacao = ? WHERE id = ?");
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $email);
        $sql->bindParam(3, $situacao);
        $sql->bindParam(4, $id);
        $sql->execute();

        return $dados;
    }

    public function editarSenha($nome, $email, $senha, $situacao, $id) {
        $dados = array();
    
        $sql = $this->pdo->prepare("UPDATE adm SET nome = ?, email = ?, senha = ?, situacao = ? WHERE id = ?");
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $email);
        $sql->bindParam(3, $senha);
        $sql->bindParam(4, $situacao);
        $sql->bindParam(5, $id);
        $sql->execute();

        return $dados;
    }

    public function excluir($id) {
        $sql = $this->pdo->prepare("DELETE FROM adm WHERE id = ? LIMIT 1");
        $sql->bindParam(1, $id);

        if ($sql->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAdm($id) {
        $dados = array();

        $sql = $this->pdo->prepare("SELECT id,nome,email,senha,situacao FROM adm WHERE id = ?");
        $sql->bindParam(1, $id);
        $sql->execute();
        
        if($sql->rowCount() > 0) {
			$dados = $sql->fetch();
		}

		return $dados;
    }

    public function getAdms() {
        $dados = array();

        $sql = $this->pdo->prepare("SELECT id,nome,email,senha,situacao FROM adm");
        
        $sql->execute();
        
        if($sql->rowCount() > 0) {
			$dados = $sql->fetchAll();
		}

		return $dados;
    }

}