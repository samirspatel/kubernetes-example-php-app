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
        return $this->render('lucky/number.html.twig', [
            'number' => $generator->random(),
            'envVars' => $_ENV,
            'environment' => $this->getParameter('kernel.environment')
        ]);
    }
}