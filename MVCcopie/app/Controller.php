<?php
namespace app;
abstract class Controller{
    public function __construct(){
        session_start();
    }
        /**
    * Permet de charger un modèle
    *
    * @param string $model
    * @return void
    */
    public function loadModel(string $model){
        // On va chercher le fichier correspondant au modèle souhaité
        require_once(ROOT.'models/'.$model.'.php');
        // Le modèle souhaité se trouve dans le namespace models
        $c_model = "\\models\\".$model;
        // On crée une instance de ce modèle. Ainsi "Articles" sera accessible par $this->Articles
        $this->$model = new $c_model();
        }
        /**
    * Afficher une vue
    *
    * @param string $fichier
    * @param array $data
    * @return void
    */
    public function render(string $fichier, array $data = [], array $el_additionel=[]){
        // Récupère les données et les extrait sous forme de variables
        extract($data);
        ob_start();
        // Crée le chemin et inclut le fichier de vue
        require_once(ROOT.'views/'.explode("\\",strtolower(get_class($this)))[1].'/'.$fichier.'.php');
        
        /*
        boucle: $css = '<link href>'
        else
        */

        $css='';
        if ($el_additionel!=[]){
            for ($i = 0; $i < count($el_additionel); $i++){
                $css .= '<link rel="stylesheet" href="'.$el_additionel[$i].'">';
            }
        }
        

        // On stocke le contenu dans $content
        $content = ob_get_clean();

        $user = isset($_SESSION['LOGIN']) ? $_SESSION['LOGIN'] : null;

        if(isset($_SESSION['erreur'])){
            $erreur = $_SESSION['erreur'];
            unset($_SESSION['erreur']);
        } else {
            $erreur = null;
        }
        // On fabrique le "template"
        require_once(ROOT.'views/layout/default.php');
    }
    public function isGranted(){
        
        if (!isset($_SESSION['LOGIN'])){
            header('Location: /login');
            die();
        }
    }
}
?>