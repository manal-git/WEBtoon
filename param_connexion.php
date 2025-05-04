<?php

function loadEnv($path)
{
   if (!file_exists($path)) {
      throw new Exception(".env file not found at $path");
   }

   $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
   foreach ($lines as $line) {
      if (strpos(trim($line), '#') === 0) continue;

      list($name, $value) = explode('=', $line, 2);
      $name = trim($name);
      $value = trim($value);

      putenv("$name=$value");
      $_ENV[$name] = $value;
      $_SERVER[$name] = $value;
   }
}

loadEnv(__DIR__ . '/.env');

$host = getenv('DB_HOST');
$usr = getenv('DB_USER');
$pwd = getenv('DB_PASS');
$dbname = getenv('DB_NAME');

// connexion au SGBD
date_default_timezone_set('Europe/Paris');

// SSL certificate settings
$ssl = array(
    "ssl" => array(
        "verify_peer" => true,
        "verify_peer_name" => true,
    )
);

$lien_base = mysqli_init();
mysqli_ssl_set($lien_base, NULL, NULL, NULL, NULL, NULL);
mysqli_real_connect($lien_base, $host, $usr, $pwd, $dbname, 23355, NULL, MYSQLI_CLIENT_SSL) 
    or die('Error connecting to MySQL server: ' . mysqli_connect_error());
mysqli_set_charset($lien_base, 'utf8');