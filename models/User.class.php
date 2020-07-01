<?php

class User {

    private $id;
    private $name;
    private $email;

    public function getId() {

        return $this->id;
    }

    public function setId($i) {

        $this->id = trim($i);
    }

    public function getName() {

        return $this->name;
    }

    public function setName($n) {

        $this->name = ucwords(trim($n));
    }

    public function getEmail() {

        return $this->email;
    }

    public function setEmail($e) {

        $this->email = strtolower(trim($e));
    }

}

interface userDAO {

    public function addUser(User $u);
    public function findAll();
    public function findById($id);
    public function findByEmail($e);
    public function update(User $u);
    public function delete($id);

}