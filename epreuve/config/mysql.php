<?php

try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=super_w;charset=utf8', 'root', 'root');
    
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $exception) {
    die('Error : '.$exception->getMessage());
}