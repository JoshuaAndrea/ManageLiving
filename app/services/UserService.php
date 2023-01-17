<?php

require_once __DIR__ . '/../repositories/UserRepository.php';
require_once __DIR__ . '/../models/User.php';

class UserService{
    
    private UserRepository $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
    }
    
    public function login(string $email, string $password) : User
    {
        $user = $repository->getByEmail($email);

        if($user == null){
            return false;
        }

        if($user->getPassword() == $password){
            return true;
        }

        return false;
    }
    
    public function register(string $username, string $password) : void
    {
        
        $user = new User();
        $user->setEmail($email);

        $user->setPassword($password);

        $repository->save($user);
    }
}