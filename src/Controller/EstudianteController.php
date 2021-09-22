<?php

namespace App\Controller;

use App\Repository\EstudianteRepository;
use App\Repository\NotaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EstudianteController extends AbstractController
{
    #[Route('/estudiante', name: 'estudiantes_index', methods: ['GET'])]
    public function index(EstudianteRepository $estudianteRepository): Response
    {

        $estudiantes = $estudianteRepository->findAll();

        return $this->render('estudiante/index.html.twig', [
            'estudiantes' => $estudiantes,
        ]);
    }

    #[Route('/estudiante/{id}/notas', name: 'estudiante_notas', requirements: ['id' => '\d+'] , methods: ['GET'])]
    public function notas($id, EstudianteRepository $estudianteRepository, NotaRepository $notaRepository): Response
    {
        $estudiante = $estudianteRepository->find($id);
        return $this->render('estudiante/notas.html.twig', [
            'estudiante' => $estudiante
        ]);
    }
}
