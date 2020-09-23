<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class HealthController
 * @package App\Controller
 */
class HealthController extends AbstractController
{
    /**
     * @Route("/healthz", name="health")
     */
    public function index()
    {
        return new Response('ping');
    }
}
