<?php
    
    session_start(); 
    require './validates/Messages.php';
?>

<h1>Adicionar usuário</h1>

    <?php 

        $messages = new Messages;
        echo $messages->getMessageError();
        echo $messages->setMessageError('');
    ?>

<form method="POST" action="create_action.php">

<label> Nome:

<br/><br/><input type="text" name="name" /><br/><br/>

</label>

<label> Email:

<br/><br/><input type="email" name="email" /><br/><br/>

</label><br/><br/>

<input type="submit" value="Adicionar" />

</form>