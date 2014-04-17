<?php

    function db() {
        return new DB\SQL(
                'mysql:host=localhost;port=3306;dbname=api',
                'root',
                'root'
        );
        $db = $this->db();
    }

class users{
         
        function checkToken($token){
                
                $db = db();
                $db->begin();
                $data = $db->exec('SELECT token_user, email_user, pass_user 
                                   FROM users 
                                   WHERE token_user = "' . $token . '"');
                return $data;
        }

        function getUsers(){
                $db = db();
                $db->begin();
                $data = $db->exec('SELECT id_user, email_user, pass_user 
                                   FROM users');
                return $data;
        }

        function getUser($id_user){
                $db = db();
                $db->begin();
                $data = $db->exec('SELECT id_user, email_user, pass_user 
                                   FROM users 
                                   WHERE id_user = ' . $id_user .' LIMIT 1');

                return $data;
        }

        function createUser($email, $pass){
                $db = db();
                $db->begin();
                $data = $db->exec("INSERT INTO users (email_user, pass_user, token_user) 
                                   VALUES ('" . $email . "', '" . $pass . "', '" . md5(time()) ."')");
                $db->commit();

                return $data;
        }

        function updateUser($email, $pass, $id_user){
                $db = db();
                $db->begin();
                $data = $db->exec("UPDATE users 
                                   SET email_user = '" . $email . "', pass_user= '" . $pass . "' 
                                   WHERE id_user = " . $id_user);
                $db->commit();

                return $data;
        }

        function deleteUser($id_user){
                $db = db();
                $db->begin();
                $data = $db->exec('DELETE FROM users 
                                   WHERE id_user = ' . $id_user);
                $db->commit();

                return $data;
        }

}