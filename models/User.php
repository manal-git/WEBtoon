<?php
require_once 'Database.php';

class User extends Database
{

    public function __construct()
    {
        // Ensure to use the Singleton instance of Database
        $this->lien_base = Database::getInstance()->lien_base;
    }

    public function create($pseudo, $email, $password, $age)
    {
        $query = "INSERT INTO utilisateur (pseudo, email, mdp, age) VALUES ('$pseudo', '$email', '$password', $age)";
        $this->executeQuery($query);
        return $this->getAffectedRows();
    }

    public function findByEmail($email)
    {
        $query = "SELECT * FROM utilisateur WHERE email = '$email' LIMIT 1";
        return $this->executeQuery($query);
    }

    public function findByPseudo($pseudo)
    {
        $query = "SELECT * FROM utilisateur WHERE pseudo = '$pseudo' LIMIT 1";
        return $this->executeQuery($query);
    }

    public function update($id, $data)
    {
        $updates = [];
        foreach ($data as $key => $value) {
            $updates[] = "$key = '$value'";
        }
        $query = "UPDATE utilisateur SET " . implode(", ", $updates) . " WHERE id = $id";
        $this->executeQuery($query);
        return $this->getAffectedRows();
    }

    public function getMyLibrary($userId)
    {
        $query = "SELECT * FROM library l
                  JOIN webtoon w ON l.webtoon_id = w.id
                  JOIN utilisateur u ON l.user_id = u.id
                  JOIN genre g ON w.id_genre = g.id
                  WHERE l.user_id = $userId";
        $result = $this->executeQuery($query);

        return $result;
    }

}
