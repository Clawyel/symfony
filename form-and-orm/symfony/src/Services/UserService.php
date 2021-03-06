<?php


namespace App\Services;


use App\Entity\Users;
use App\Repository\UsersRepository;
use App\RepositoryInterfaces\UserInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\VarDumper\VarDumper;

final class UserService
{
    private $userRepository;
    protected  $em;

    public function __construct(UsersRepository $usersRepository,EntityManagerInterface $entityManager)
    {
        $this->userRepository = $usersRepository;
        $this->em = $entityManager;
    }
    public function getUserAccountById():Users {
       return  $this->userRepository->getUserAccountById();
    }
    public function deleteUser($id){
        $this->userRepository->deleteUser($id);

    }
    public function newUser(Users $user){

        $this->userRepository->newUser($user);

    }
    public  function editUser(){
        $this->userRepository->editUser();
    }
    public function fetchUsersAccounts(){
        $this->userRepository->fetchUsersAccounts();
    }
    public function fetchUsersContacts(){
        $this->userRepository->fetchUsersContacts();
    }
    public function getUserContactById(){
        $this->userRepository->getUserContactById();
    }


}