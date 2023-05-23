<?php
namespace models;
class Utilisateurs extends \app\Model{
    public function __construct()
    {
        $this->table = "utilisateurs";

        $this->getConnection();
    }
    public function findByLogin($login){
        $sql = "SELECT * FROM ".$this->table." WHERE `login`='".$login."'";
        $query = $this->_connexion->query($sql);

        return $query->fetch_assoc();
    }
    public function create($login, $passwordCrypt, $email){
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("INSERT INTO ".$this->table." (login,password,email) VALUES (?,?,?)");
        $stmt->bind_param("sss", $login, $passwordCrypt, $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        return $stmt_result;
    }

    public function findByLoginAndEmail($login, $email){
        $sql = "SELECT * FROM ".$this->table." WHERE `login`='".$login."' OR email='".$email."'";
        $query = $this->_connexion->query($sql);

        return $query->fetch_assoc();
    }
}

?>