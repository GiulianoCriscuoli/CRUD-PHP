<?php

try{

    $pdo = new PDO("mysql:dbname=crud;host=localhost", "root","");

}  catch(PDOException $e) {

    echo "Falhou: ".$e->getMessage();
    exit;
}


