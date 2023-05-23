<?php
namespace controllers;
class Register extends \app\Controller{
    /**
    * Cette méthode affiche la liste des articles
    *
    * @return void
    */
    public function index(){
    // On instancie le modèle "Articles"
    
    // On envoie les données à la vue index
    $this->render('index');
    }
    public function inscription(){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $email = $_POST['email'];

        if($password !== $password2){
            header('Location: /register');
            die();
        }

        $this->loadModel('Utilisateurs');

        $userExist = $this->Utilisateurs->findByLoginAndEmail($login, $email);

        if($userExist){
            $_SESSION['erreur'] = "Le login ou l'email existe déjà";
            header('Location: /register');
            die();
        }

        $passwordCrypt = password_hash($password, PASSWORD_BCRYPT);
        $this->Utilisateurs->create($login, $passwordCrypt, $email);

        $this->render('inscription');
    }
}
?>