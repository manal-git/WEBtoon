<?php
class Database {
    private static $instance = null;
    protected $lien_base;

    // Private constructor to prevent direct instantiation
    private function __construct() {
        include_once dirname(__DIR__) . '../param_connexion.php';
        $this->lien_base = $lien_base;
    }

    // Get the singleton instance of the Database class
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Your existing methods (e.g., executeQuery, getAffectedRows)
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