<?php
// include 'dbTrain.php';

    class UsersModal extends DbTrain {
       
     
        public function getUsers(){
        $sql = "SELECT * FROM users ";
        $stm = $this->connexion()->query($sql);
        $result = $stm->fetchAll();
        return $result;
        }
      
    
        public function insertUser($id,$nom,$email,$role){
            $sql = "INSERT INTO users (id,nom,email,id_role) VALUES(?,?,?,?)";
            $stm = $this->connexion()->prepare($sql);
             $stm->execute([$id,$nom,$email,$role]);
            }
          

            public function deleteUser($id)
    {
           $sql = "DELETE FROM users WHERE id = ?";
            $stm = $this->connexion()->prepare($sql);
            $stm->execute([$id]);
       
    }


    public function chnagerRoleUser($role,$id){
        $sql = "UPDATE users SET id_role=? where id=?";
        $stm = $this->connexion()->prepare($sql);
         $stm->execute([$role,$id]);
    }
  
    public function getCommentaires(){
        $sql = "SELECT commentaires.*,users.nom as'nom-user' from commentaires left join users on commentaires.id_user=users.id ";
        $stm = $this->connexion()->query($sql);
        return $stm;
    }

    public function getCounAdmin($id){
        $sql = "SELECT * FROM `users` WHERE `id_role` = ?";
        $exe = $this->connexion() -> prepare($sql);
        $exe ->execute([$id]);
        $res = $exe -> fetchAll();
        return $res; 

    }

}