<?php
class Perfil extends Model {

	public function editar($nome, $id) {
        $dados = array();
    
        $sql = $this->pdo->prepare("UPDATE adm SET nome = ? WHERE id = ?");
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $id);
        $sql->execute();

        return $dados;
    }

    public function editarSenha($senha, $id) {
        $dados = array();
    
        $sql = $this->pdo->prepare("UPDATE adm SET senha = ? WHERE id = ?");
        $sql->bindParam(1, $senha);
        $sql->bindParam(2, $id);
        $sql->execute();

        return $dados;
    }

}