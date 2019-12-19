<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\testService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class KitapController extends AbstractController
{
    private $testService;
    public function __construct(testService $testService){
        $this->testService = $testService;
    }
    /**
     * @Route("/kitap", name="kitap")
     * @Template()
     */
    public function index()
    {
        $user = new User();
        $form = $this->createForm(UserType::class,$user);
        return [ "form" => $form->createView() ];
    }
    /**
     * @Route("/form", name="formVerisi")
     */
    public function  getFormData(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            //VarDumper::dump($user);
           // exit;
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            }
        //return new Response('Saved new product with id '.$user->getId());
        $this->addFlash('success', 'Data Created! Knowledge is power!');

        return $this->redirectToRoute('kitap');
    }
    /**
     * @Route("/kitapListesi/{id}", name="kitapListesi",methods={"GET","HEAD"},defaults={"id" = 11})
     * @Route("/kitapListesi/{id}", name="kitapListesiTwo",methods={"GET","HEAD"},defaults={"id" = 11})
     */
    public function kitapListesi(int $id)
    {
       // $request = new Request();

        $a = $this->testService->test();
        echo $a;

        return $this->json(['username' => 'jane.doe',"id" => $id]);
    }

}
