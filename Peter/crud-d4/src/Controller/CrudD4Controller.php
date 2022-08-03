<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CrudD4Controller extends AbstractController
{
    #[Route('/', name: 'app_crud_index')]
    public function index(): Response
    {
        return $this->render('crud_d4/index.html.twig', [
        ]);
    }

    #[Route('/create', name: 'app_crud_create')]
    public function create(): Response
    {
        return $this->render('crud_d4/create.html.twig', [
        ]);
    }

    #[Route('/edit/{id}', name: 'app_crud_edit')]
    public function edit(): Response
    {
        return $this->render('crud_d4/edit.html.twig', [
        ]);
    }

    #[Route('/details/{id}', name: 'app_crud_details')]
    public function details(): Response
    {
        return $this->render('crud_d4/details.html.twig', [
        ]);
    }

    #[Route('/delete/{id}', name: 'app_crud_delete')]
    public function delete(): Response
    {
        return $this->render('crud_d4/delete.html.twig', [
        ]);
    }
}
