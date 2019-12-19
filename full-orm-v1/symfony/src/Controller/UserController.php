<?php

namespace App\Controller;

use App\Entity\Users;
use App\Services\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\VarDumper;

class UserController extends AbstractController
{
    private $userService;
    public  function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @Route("/user", name="user")
     */
    public function index()
    {

    }
    /**
     * @Route("/userBase", name="base")
     */
    public function base()
    {

        $this->userService->getUserAccountById();

    }
    /**
     * @Route("/deleteUser", name="deleteUser")
     */
    public function deleteUser()
    {

        $this->userService->deleteUser(1);
        $this->redirectToRoute('base');
    }
    /**
     * @Route("/newUser", name="newUser")
     */
    public function newUser()
    {

        $this->userService->newUser();
        $this->redirectToRoute('base');
    }
    /**
     * @Route("/editUser", name="editUser")
     */
    public function editUser()
    {

        $this->userService->editUser();
        $this->redirectToRoute('base');
    }

    /**
     * @Route("/fetchUsersAccounts", name="fetchUsersAccounts")
     */
    public function fetchUsersAccounts()
    {

        $this->userService->fetchUsersAccounts();
        $this->redirectToRoute('base');
    }
    /**
     * @Route("/fetchUsersContacts", name="fetchUsersContacts")
     */
    public function fetchUsersContacts()
    {
        $this->userService->fetchUsersContacts();
        $this->redirectToRoute('base');
    }
    /**
     * @Route("/getUserContactById", name="getUserContactById")
     */
    public function getUserContactById()
    {
        $this->userService->getUserContactById();
        $this->redirectToRoute('base');
    }
}
