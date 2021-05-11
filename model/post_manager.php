<?php 
    require_once("manager.php");

    class PostManager extends Manager {

        
        public function ajoutePost($titre, $commentaire) {
            $db = $this -> dbconnect();

            $cal = date('y-m-d h:i:s');
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $commentaire = htmlspecialchars($_POST['commentaire']);

            $insert = $db -> prepare('INSERT INTO posts (article_commenté, cal, pseudo, contenu) VALUE (?, ?, ?, ?)');
            $insert->execute(array($titre, $cal, $pseudo, $commentaire));
        
        }

        public function getPosts($titre) {
            $db = $this -> dbconnect();
            $req = $db -> prepare("SELECT id_post, cal, pseudo, contenu FROM posts WHERE article_commenté = :titre ORDER BY cal");
            $req -> bindValue(':titre', $titre,  PDO::PARAM_STR);
            $req -> execute();

            return $req;
        }

        public function getAllPosts() {
            $db = $this -> dbconnect();
            $req = $db -> query("SELECT * FROM posts ORDER BY article_commenté");
            $req -> execute();
    
            return $req;
        }
    
        public function getReportedPosts() {
            $db = $this -> dbconnect();
            $req = $db -> query("SELECT * FROM posts WHERE signale = 1 ORDER BY article_commenté ");
    
            $req -> execute();
            return $req;
        }
    
        public function deletePost($id) {
            $db = $this -> dbconnect();
            $req = $db -> prepare("DELETE FROM posts WHERE id_post = :id");
            $req -> bindValue(':id', $id, PDO::PARAM_INT);
            $req -> execute();
    
        }
    
        public function reportPost($id) {
            $db = $this -> dbconnect();
            $req = $db -> prepare("UPDATE posts SET signale = 1 WHERE id_post = :id");
            $req -> bindValue(':id', $id, PDO::PARAM_INT);
            $req -> execute();
        }
    }

?>