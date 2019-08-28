<?php
class Adm extends Model {

    public function isLogged() {
        if (isset($_SESSION['LoginAdm']) && !empty($_SESSION['LoginAdm'])) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email) {
        
        $sql = $this->pdo->prepare("SELECT * FROM adm WHERE email = ? LIMIT 1");
        $sql->bindParam(1, $email);
        $sql->execute();

        $dados = $sql->fetch(PDO::FETCH_OBJ);
        return $dados;
    }
}