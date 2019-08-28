<?php
class Instrutor extends Model {

    public function isLogged() {
        if (isset($_SESSION['LoginIns']) && !empty($_SESSION['LoginIns'])) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email) {
        
        $sql = $this->pdo->prepare("SELECT * FROM instrutor WHERE email = ? LIMIT 1");
        $sql->bindParam(1, $email);
        $sql->execute();

        $dados = $sql->fetch(PDO::FETCH_OBJ);
        return $dados;
    }
}