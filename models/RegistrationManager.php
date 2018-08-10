<?php

namespace Blog\Model;

require_once('models/Manager.php');

class RegistrationManager extends Manager
{
    /**
     * Retourne l'ensemble des données d'inscription d'un utilisateur
     *
     * @param $pseudo
     * @param $name
     * @param $firstname
     * @param $age
     * @param $email
     * @param $pass_hash
     *
     * @return bool|\PDOStatement
     */
    public function inscription ($pseudo, $name, $firstname, $age, $email, $pass_hash)
    {
        $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO user(pseudo, name, firstname, age, email, password, creation_date) VALUES (:pseudo, :name, :firstname, :age, :email, :password, NOW())');
        $req->bindValue(':pseudo', $pseudo);
        $req->bindValue(':name', $name);
        $req->bindValue(':firstname', $firstname);
        $req->bindValue(':age', $age);
        $req->bindValue(':email', $email);
        $req->bindValue(':password', $pass_hash);
        $req->execute();

        return $req;
    }

    /**
     * Retourne un nombre d'inscription d'utilisateur avec un email donné
     *
     * @param $email
     *
     * @return mixed
     */
    public function check_email($email)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT COUNT(email) FROM user WHERE email = :email');
        $req->bindParam(':email', $email);
        $req->execute();
        return $req->fetchColumn();
    }
}