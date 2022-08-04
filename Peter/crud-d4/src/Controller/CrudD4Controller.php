<?php

namespace App\Controller;

use App\Entity\Gear;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\GearTypeForm;
use Symfony\Component\HttpFoundation\Request;

class CrudD4Controller extends AbstractController
{   
    #[Route('/', name: 'app_crud_index')]
    public function index(ManagerRegistry $doctrine):Response
    {
        $gears = $doctrine->getRepository(Gear::class)->findAll();
        return $this->render('crud_d4/index.html.twig',[
            'gears' => $gears
        ]);
    }


    #[Route('/create', name: 'app_crud_create')]
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {
        $gear = new Gear();
        $form = $this->createForm(GearTypeForm::class, $gear);

        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()) {
            
            $gear = $form->getData();
            $em = $doctrine->getManager();
            $em->persist($gear);
            $em->flush();
            
            $this->addFlash(
                'notice',
                'Gear Added'
            );
            return $this->redirectToRoute('app_crud_create');
        }
            
        return $this->render('crud_d4/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/edit/{id}', name: 'app_crud_edit')]
    public function edit(Request $request, ManagerRegistry $doctrine, $id): Response
    {   
        $gear =$doctrine->getRepository(Gear::class)->find($id);
        $form = $this->createForm(GearTypeForm::class, $gear);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()) {
            
            $gear = $form->getData();
            $em = $doctrine->getManager();
            $em->persist($gear);
            $em->flush();
            
            $this->addFlash(
                'notice',
                'Gear Edited'
            );
            return $this->redirectToRoute('app_crud_index');
        }
        return $this->render('crud_d4/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/details/{id}', name: 'app_crud_details')]
    public function details(ManagerRegistry $doctrine, $id): Response
    {
        $gears = $doctrine->getRepository(Gear::class)->find($id);
        return $this->render('crud_d4/details.html.twig', [
            'gears' => $gears
        ]);
    }

    #[Route('/delete/{id}', name: 'app_crud_delete')]
    public function delete(ManagerRegistry $doctrine, $id): Response
    {   
        $gear = $doctrine->getRepository(Gear::class)->find($id);
        $em =$doctrine->getManager();
        $em->remove($gear);
        $em->flush();
        $this->addFlash(
            'Success',
            'Entry deleted'
        );
        return $this->redirectToRoute('app_crud_index');
    }   
        
}
