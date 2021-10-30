<?php

session_start();

require 'config.php';
require 'dao/UserDaoMysql.php';
require './validates/Messages.php';

$userDao = new UserDaoMysql($pdo);

$id = filter_input(INPUT_GET, "id");

if($id) {

    $userDao->delete($id);

}

$messages = new Messages;
$messages->setMessageSuccess('Usuário deletado com sucesso!');

header("Location:index.php");
exit;