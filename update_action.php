<?php

session_start();

require 'config.php';
require 'dao/UserdaoMysql.php';
require './validates/Messages.php';

$userDao = new UserdaoMysql($pdo);

$id = filter_input(INPUT_POST, "id");
$name = filter_input(INPUT_POST, "name");
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

if($id && $name && $email) {

    $userValue = $userDao->findById($id);
    $userValue->setName($name);
    $userValue->setEmail($email);

    $userDao->update($userValue);

    $messages = new Messages;
    $messages->setMessageSuccess('Usuário editado com sucesso!');

    header("Location:index.php");
    exit;

} else {

    $messages = new Messages;
    $messages->setMessageError('Preencha todos os campos!');

    header("Location: update.php?id=".$id);
    exit;
}




?>