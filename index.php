<?php

session_start();

require 'config.php';
require 'dao/UserDaoMysql.php';
require './validates/Messages.php';

$userDao = new UserDaoMysql($pdo);

$list = $userDao->findAll();

?>

<a href="createUser.php">Adicionar Novo Usuário</a>

<?php 

    $messages = new Messages;
    echo $messages->getMessageSuccess();
    echo $messages->setMessageSuccess('');
?>

<table border="1" width="100%">

    <tr>
        <thead>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>AÇÕES</th>
        </thead>

    </tr>

    <?php foreach($list as $user): ?>
    
    <tr>    
        <tbody>
            <td><?php echo $user->getId(); ?></td>
            <td><?php echo $user->getEmail(); ?></td>
            <td><?php echo $user->getName(); ?></td>
            <td>
                <a href="update.php?id=<?php echo $user->getId();?>">[EDITAR]</a>
                <a href="delete.php?id=<?php echo $user->getId();?>" onclick="return confirm('Tem certeza que deseja excluir?');">[EXCLUIR]</a>
            </td>
        </tbody>
    </tr>

    <?php
        endforeach;
    ?>

</table>