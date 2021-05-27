<?php

namespace Model;

use DbModel;

class UserModel extends DbModel
{
    private $email;
    private $password;

    public function save($pass, $email)
    {
        $req = "INSERT INTO users (pass, email) VALUES (:pass, :email);";
        $stmt = $this->getDb()->prepare($req);
        $stmt->bindValue(":pass", sha1($pass));
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $stmt->closeCursor();
    }
    public function create($pass, $email)
    {
        $req = "INSERT INTO users (pass, email) VALUES (:pass, :email);";
        $stmt = $this->getDb()->prepare($req);
        $stmt->bindValue(":pass", sha1($pass));
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $stmt->closeCursor();
        $req = "SELECT id FROM users WHERE pass = :pass AND email = :email;";
        $stmt = $this->getDb()->prepare($req);
        $stmt->bindValue(":pass", sha1($pass));
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $res = $stmt->fetch();
        $res = $res['id'];
        return $res;
    }
    public function read($id)
    {
        $req = "SELECT * FROM users WHERE id = :id;";
        $stmt = $this->getDb()->prepare($req);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $res = $stmt->fetch();
        return $res;
    }
    public function update($email, $id)
    {
        $req = "UPDATE users SET email = :email WHERE id = :id";
        $stmt = $this->getDb()->prepare($req);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":email", $email);
        $stmt->execute();
    }
    public function delete($id)
    {
        $req = "DELETE FROM users WHERE id = :id";
        $stmt = $this->getDb()->prepare($req);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }
    public function read_all()
    {
        $req = "SELECT * FROM users;";
        $stmt = $this->getDb()->prepare($req);
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res;
    }
}
