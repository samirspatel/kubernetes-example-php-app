<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class LiveController extends AbstractController
{
    /**
     * @Route("/livez", name="live")
     */
    public function index()
    {
        return new Response('pong');
    }
}
