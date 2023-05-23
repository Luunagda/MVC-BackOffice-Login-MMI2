<?php
namespace controllers;
class Backoffice extends \app\Controller{
    /**
    * Cette méthode affiche la liste des articles
    *
    * @return void
    */
    public function index(){
    // On instancie le modèle "Articles"
    $this->loadModel('Articles');
    // On stocke la liste des articles dans $articles
    $articles = $this->Articles->getAll();
    // On affiche les données
    
    // On envoie les données à la vue index
    $this->render('index', compact('articles'));
    }
        /**
    * Méthode permettant d'afficher un article à partir de son slug
    *
    * @param string $slug
    * @return void
    */
    public function lire(string $slug){
        // On instancie le modèle "Article"
        $this->loadModel('Articles');
        // On stocke l'article dans $article
        $articles = $this->Articles->findBySlug($slug);
        // On envoie les données à la vue lire
        $this->render('lire', compact('articles'));
        }

    public function delete($id){
        // On instancie le modèle "Article"
        $this->loadModel('Articles');
        // On stocke l'article dans $article
        $this->Articles->id = $id;
        $article = $this->Articles->getOne();
        var_dump($article['image']);
        //var_dump($article);
        if($article['image']!=='../../img/'){
            $lien=str_replace('../../','',$article['image']);
            unlink($lien);
           
        }
        $article = $this->Articles->delete($id);
        // On envoie les données à la vue lire
        $this->render('deletesaved', compact('article'));
        }

    
    public function insert(){
        // On instancie le modèle "Article"
        $this->loadModel('Articles');
        // On stocke l'article dans $article
        //$path=pathinfo('Backoffice.php');
        move_uploaded_file($_FILES['userfile']['tmp_name'],"img/".$_FILES["userfile"]["name"]);
        var_dump($_FILES);
        $article = $this->Articles->insert($_POST['titre'],  $_POST['contenu'],  $_POST['slug'],  $_POST['alt'], "../../img/".$_FILES["userfile"]["name"]);
        // On envoie les données à la vue lire
        $this->render('create', compact('article'));
        }


    public function update($id){
        // On instancie le modèle "Article"
        $this->loadModel('Articles');
        // On stocke l'article dans $article
        $this->Articles->id = $id;
        $article = $this->Articles->getOne();
        var_dump($article);
   
        // On envoie les données à la vue lire
        $this->render('update', compact('article'));
        }

    public function updatesave($id){
        // On instancie le modèle "Article"
        $this->loadModel('Articles');
        //var_dump(UPLOAD_ERR_OK);
        $this->Articles->id = $id;
        //permet de récupérer les données de la base de données de la ligne sélectionner. 
        $article = $this->Articles->getOne();
        var_dump($article['image'] );
        if($_FILES['userfile']['error']==UPLOAD_ERR_OK){
            //var_dump($_FILES['userfile']);
            //Permet de supprimer les parties du lien en trop
            if($article['image']!=='../../img/'){
                $lien=str_replace('../../','',$article['image']);
                //var_dump($lien);
                unlink($lien);
            }
           
            move_uploaded_file($_FILES['userfile']['tmp_name'],"img/".$_FILES["userfile"]["name"]);
            $article = $this->Articles->update($id, $_POST['titre'],  $_POST['contenu'],  $_POST['slug'], "../../img/".$_FILES["userfile"]["name"], $_POST['alt']);
        }
        else {
            var_dump($_FILES['userfile']);
            // On stocke l'article dans $article
            $article = $this->Articles->update($id, $_POST['titre'],  $_POST['contenu'], $_POST['slug'], $article['image'], $article['alt']);
        }
        $this->render('saved', compact('article'));
        }
}
?>