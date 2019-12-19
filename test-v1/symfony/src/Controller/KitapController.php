<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class KitapController extends AbstractController
{
    /**
     * @Route("/kitap", name="kitap")
     */
    public function index()
    {
        return $this->render('default/merhaba.html.twig');
    }
    /**
     * @Route("/kitapListesi", name="kitapListesi")
     */
    public function kitapListesi()
    {
        return $this->json(['username' => 'jane.doe']);
    }
}
