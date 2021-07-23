<?php 
    require_once("manager.php");

    class PostManager extends Manager {

        
        public function ajoutePost($ida) {
            $db = $this -> dbconnect();

            $cal = date('y-m-d');
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $commentaire = htmlspecialchars($_POST['commentaire']);

            $insert = $db -> prepare('INSERT INTO posts (id_article, cal, pseudo, contenu) VALUE (?, ?, ?, ?)');
            $insert->execute(array($ida, $cal, $pseudo, $commentaire));
        
        }

        public function getPosts($ida) {
            $db = $this -> dbconnect();
            $req = $db -> prepare("SELECT id_post, cal, pseudo, contenu FROM posts WHERE id_article = :id ORDER BY cal");
            $req -> bindValue(':id', $ida,  PDO::PARAM_STR);
            $req -> execute();

            return $req;
        }

        public function getAllPosts() {
            $db = $this -> dbconnect();
            $req = $db -> query("SELECT * FROM posts ORDER BY id_article");
            $req -> execute();
    
            return $req;
        }
    
        public function getReportedPosts() {
            $db = $this -> dbconnect();
            $req = $db -> query("SELECT * FROM posts WHERE signale = 1 ORDER BY id_article ");
    
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