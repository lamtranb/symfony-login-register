<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    public const DASHBOARD_ROUTE = 'app_dashboard';

    #[Route('/dashboard', name: self::DASHBOARD_ROUTE)]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $users = $this->doctrine->getRepository(User::class)->findByAnyRole();

        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'users' => $users,
        ]);
    }
}
