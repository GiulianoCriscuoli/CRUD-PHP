<?php

    require 'config.php';
    require 'dao/UserDaoMysql.php';

    $userDao = new UserDaoMysql($pdo);

    $id = filter_input(INPUT_GET, "id");

    $userValue = false;

    if($id) {

       $userValue = $userDao->findById($id);

    } 

    if($userValue === false) {

        header("Location:index.php");
        exit;

    }

?>



<h1>Editar usuário</h1>

<form method="POST" action="update_action.php">

<input type="hidden" name="id" value="<?php echo $userValue->getId();?>"/>

<label> Nome: <input type="text" name="name" value="<?php echo $userValue->getName();?>"/>

</label><br/><br/>

<label> Email: <input type="text" name="email" value="<?php echo $userValue->getEmail();?>"/>

</label><br/><br/>

<input type="submit" value="Atualizar"/>

</form>