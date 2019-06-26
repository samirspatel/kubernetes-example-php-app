<?php

namespace App\Controller;

use App\Util\NumberGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class LuckyController
 * @package App\Controller
 */
class LuckyController extends AbstractController
{
    /**
     * @param NumberGenerator $generator
     *
     * @return Response
     */
    public function number(NumberGenerator $generator)
    {
        $luckyNumber   = $generator->random();
        $kubernetesPod = $_ENV['HOSTNAME'] ?? null;
        $environment   = $this->getParameter('kernel.environment');

        $data = [
            "luckyNumber"   => $luckyNumber,
            "kubernetesPod" => $kubernetesPod,
            "environment"   => $environment,
        ];

        return $this->render('lucky/number.html.twig', $data);
    }
}