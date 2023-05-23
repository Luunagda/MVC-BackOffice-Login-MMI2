<?php
namespace models;
class Articles extends \app\Model{
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "articles";
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }
        /**
    * Retourne un article en fonction de son slug
    *
    * @param string $slug
    * @return void
    */
    public function findBySlug(string $slug){
        /*$sql = "SELECT * FROM `".$this->table."` WHERE `slug`='".$slug."'";
        $query = $this->_connexion->query($sql);
        return $query->fetch_assoc();
        */
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("select * from ".$this->table." where `slug`= ?");
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        $result = $stmt_result->fetch_assoc();
        return $result;
        }

    public function delete($id){
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("delete from ".$this->table." where id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        return $stmt_result;
        }
    
    public function insert($titre, $contenu, $slug, $alt, $image){
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("INSERT INTO ".$this->table." (titre,contenu,slug,alt,image) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $titre, $contenu, $slug, $alt, $image);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        var_dump($image);
        return $stmt_result;
    }

    public function update($id, $titre, $contenu, $slug, $image, $alt){
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("update ".$this->table." SET titre=?, contenu=?, slug=?, image=?, alt=? WHERE id=?");
        $stmt->bind_param("sssssi", $titre, $contenu, $slug, $image, $alt, $id);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        return $stmt_result;
    }

}
?>