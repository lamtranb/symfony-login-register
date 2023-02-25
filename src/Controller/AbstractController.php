<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyController;
use Doctrine\Persistence\ManagerRegistry;

abstract class AbstractController extends SymfonyController
{
    protected $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getDoctrine(): ManagerRegistry
    {
        return $this->doctrine;
    }
}