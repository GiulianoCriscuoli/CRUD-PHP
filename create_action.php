<?php

session_start();

require 'config.php';
require './validates/Messages.php';
require 'dao/UserDaoMysql.php';

$userDao = new UserDaoMysql($pdo);

$name = filter_input(INPUT_POST, "name");
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

if($name && $email) {

    if($userDao->findByEmail($email) === false) {

        $newUser = new User();
        $newUser->setName($name);
        $newUser->setEmail($email);

        $userDao->addUser($newUser);

        $messages = new Messages;
        $messages->setMessageSuccess('Usuário criado com sucesso!');

        header("Location:index.php");

    } else {

        $messages = new Messages;
        $messages->setMessageError('Email já está em uso.');

        header("Location:createUser.php");
        exit;
    }

}  else {

    $messages = new Messages;
    $messages->setMessageError('Nome e email são campos obrigatórios');

    header("Location:createUser.php");
    exit;

}