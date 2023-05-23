<?php
namespace controllers;
class Login extends \app\Controller{
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
    public function connexion(){
        $login = $_POST['login'];
        $password = $_POST['password'];

        $this->loadModel('Utilisateurs');

        $user = $this->Utilisateurs->findByLogin($login);
        //var_dump($user);
        //die();

        if ($user !== null){
            if (password_verify($password, $user['password'])){
                //mot de passe ok
                
                $_SESSION['LOGIN'] = $user['login'];
                header('Location: /');
            } else {
                //erreur de mot de passe
                header('Location: /login?message="Erreur de mot de passe"');
            }
        } else {
            //pas d'utilisateur trouvé...
            header('Location: /login?message="Utilisateur inconnu"');
        }
    }
    public function deconnexion(){
     
        session_destroy();
        header('Location: /');
    }
}
?>