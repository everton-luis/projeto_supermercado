<?php

    $dsn = "pgsql:host=localhost;dbname=softexpertdev";
    $dbuser = "postgres";
    $dbpass = "123";

    try{
        $pdo = new PDO($dsn,$dbuser,$dbpass);
        
    }catch(PDOException $e){
        echo 'erro: '.$e->getMessage();
    }






?>