<?php
class Database {
    protected $lien_base;

    public function __construct() {
        include_once dirname(__DIR__) . '/param_connexion.php';
        $this->lien_base = $lien_base;
    }

    protected function executeQuery($query) {
        $result = mysqli_query($this->lien_base, $query);
        if ($result === false) {
            $message_erreur = "Impossible d'executer la requete: $query " . mysqli_error($this->lien_base);
            header("Location: ../views/error.php?erreur=$message_erreur");
            exit();
        }
        return $result;
    }

    protected function getAffectedRows() {
        return mysqli_affected_rows($this->lien_base);
    }
}
?>