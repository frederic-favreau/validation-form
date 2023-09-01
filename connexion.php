<?php
try {
    $db = new PDO('mysql:host=localhost; dbname=validation_form; charset=utf8', 'root');
    
} catch (PDOException $e) {
    echo 'Erreur: ' . $e->getMessage();
}
