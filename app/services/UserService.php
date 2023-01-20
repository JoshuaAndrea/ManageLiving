<?php

require_once __DIR__ . '/../repositories/UserRepository.php';
require_once __DIR__ . '/../models/User.php';

class UserService{
    
    private UserRepository $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
    }
    
    public function verifyLogin($email, $password) : User
    {
        $user = $this->repository->getByEmail($email);

        if($user == null){
            return null;
        }

        if($user->getHash() == $password){
            return $user;
        }

        return null;
    }
    
    public function createNewUser(string $username, string $firstName, string $lastName, string $password) : void
    {
        $user = new User();
        $user->setUsername($username,);

        $user->setPassword($password);

        $this->repository->save($user);
    }
}