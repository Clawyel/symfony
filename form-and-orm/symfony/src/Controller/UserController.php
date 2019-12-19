<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Users;
use App\Services\UserService;
use Cassandra\Type\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/user/newUserTemplate", name="newUserTemplate")
     * @Template("user/newUser.html.twig")
     */
    public function newUserTemplate()
    {
        $user = new Users();
        $form = $this->createForm(\App\Form\Type\UserType::class,$user);
        return [ "form" => $form->createView() ];
    }
    /**
     * @Route("/user/newUser", name="newUser")
     */
    public function newUser(Request $request)
    {

        $user = new Users();
        $form = $this->createForm(\App\Form\Type\UserType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
        }
        //return new Response('Saved new product with id '.$user->getId());



        $this->userService->newUser($user);
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
