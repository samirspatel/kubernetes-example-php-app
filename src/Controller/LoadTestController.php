<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


class LoadTestController extends AbstractController
{
    /**
     * @Route("/lt", name="load_test")
     */
    public function index(LoggerInterface $logger)
    {
        return new Response('
        <style>
            body {
                background: radial-gradient(600px at 50% 50% , #fff 20%, #000 100%);
                margin-top: 20%;
            }
            h1 {
              text-align: center;
              font-family: \'Oswald\', Helvetica, sans-serif;
              font-size: 80px;
              transform: skewY(-10deg);
              letter-spacing: 4px;
              word-spacing: -8px;
              color: tomato;
              text-shadow: 
                -1px -1px 0 firebrick,
                -2px -2px 0 firebrick,
                -3px -3px 0 firebrick,
                -4px -4px 0 firebrick,
                -5px -5px 0 firebrick,
                -6px -6px 0 firebrick,
                -7px -7px 0 firebrick,
                -8px -8px 0 firebrick,
                -30px 20px 40px dimgrey
            }
        </style>
        <body>
            <h1>FOO-MAN-CHH-OOO</h1>
        </body>
        ');
    }
}
