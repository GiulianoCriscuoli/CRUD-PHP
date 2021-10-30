<?php

class Messages {

    public function getMessageError() : ?string {

        return $_SESSION['error'];
    }

    public function setMessageError(string $error) : void {

        $_SESSION['error'] = $error;
    }

    public function getMessageSuccess() : ?string {

        return $_SESSION['success'];
    }

    public function setMessageSuccess(string $success) :void {

        $_SESSION['success'] = $success;
    }
}