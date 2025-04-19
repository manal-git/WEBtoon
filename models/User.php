<?php
require_once 'Database.php';

class User extends Database {
    public function create($pseudo, $email, $password, $age) {
        $query = "INSERT INTO utilisateur (pseudo, email, mdp, age) VALUES ('$pseudo', '$email', '$password', $age)";
        $this->executeQuery($query);
        return $this->getAffectedRows();
    }

    public function findByEmail($email) {
        $query = "SELECT * FROM utilisateur WHERE email = '$email' LIMIT 1";
        return $this->executeQuery($query);
    }

    public function findByPseudo($pseudo) {
        $query = "SELECT * FROM utilisateur WHERE pseudo = '$pseudo' LIMIT 1";
        return $this->executeQuery($query);
    }

    public function update($id, $data) {
        $updates = [];
        foreach ($data as $key => $value) {
            $updates[] = "$key = '$value'";
        }
        $query = "UPDATE utilisateur SET " . implode(", ", $updates) . " WHERE id = $id";
        $this->executeQuery($query);
        return $this->getAffectedRows();
    }
}
?>