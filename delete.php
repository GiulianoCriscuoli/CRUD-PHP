<?php

require 'config.php';
require 'dao/UserDaoMysql.php';

$userDao = new UserDaoMysql($pdo);


$id = filter_input(INPUT_GET, "id");

if($id) {

    $userDao->delete($id);

}

header("Location:index.php");
exit;