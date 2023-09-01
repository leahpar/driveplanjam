<?php

namespace App\Controller;

use App\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig');
    }

    #[Route('api/businessHours.json', name: 'api_businessHours')]
    public function businessHours(): Response
    {
        return $this->json([
            [
                'daysOfWeek' => [1, 2, 3, 4, 5],
                'startTime' => '08:00',
                'endTime' => '18:00',
            ],
            [
                'daysOfWeek' => [6],
                'startTime' => '08:00',
                'endTime' => '16:00',

            ],
        ]);
    }

    #[Route('api/jours_feries.json', name: 'api_jours_feries')]
    public function joursFeries()
    {
        $jours = [
            "2023-01-01" => "Jour de l'an",
            "2023-04-10" => "Lundi de Pâques",
            "2023-05-01" => "Fête du travail",
            "2023-05-08" => "Victoire 1945",
            "2023-05-18" => "Ascension",
            "2023-05-29" => "Lundi de Pentecôte",
            "2023-07-14" => "Fête nationale",
            "2023-08-15" => "Assomption",
            "2023-11-01" => "Toussaint",
            "2023-11-11" => "Armistice 1918",
            "2023-12-25" => "Noël",

            "2024-01-01" => "Jour de l'an",
            "2024-04-01" => "Lundi de Pâques",
            "2024-05-01" => "Fête du travail",
            "2024-05-08" => "Victoire 1945",
            "2024-05-09" => "Ascension",
            "2024-05-20" => "Lundi de Pentecôte",
            "2024-07-14" => "Fête nationale",
            "2024-08-15" => "Assomption",
            "2024-11-01" => "Toussaint",
            "2024-11-11" => "Armistice 1918",
            "2024-12-25" => "Noël",
        ];
        return $this->json(
            array_map(fn($date, $nom) => [
                'title' => $nom,
                'start' => $date."T00:00:00",
                'end'   => $date."T23:59:59",
            ], array_keys($jours), array_values($jours)
        ));
    }

    #[Route('api/form_event', name: 'api_form_event')]
    public function getEventForm()
    {
        $form = $this->createForm(EventType::class);
        return $this->render('test/form_event.html.twig', [
            'form' => $form,
        ]);
    }
}
