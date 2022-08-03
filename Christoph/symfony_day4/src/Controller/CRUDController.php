<?php

namespace App\Controller;
use App\Entity\Product;
use App\Form\ProductType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Service\FileUploader;

class CRUDController extends AbstractController
{

    #[Route('/create', name: 'app_create')]
    public function create(ManagerRegistry $doctrine, Request $request, FileUploader $fileUploader): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();
            $picture = $form->get('picture')->getData();
            if($picture) {
                $fileName = $fileUploader->upload($picture);
                $product->setPicture($fileName);
            }else {
                $fileName = 'default.png';
                $product->setPicture($fileName);
            }
            $em = $doctrine->getManager();
            $em->persist($product);
            $em->flush();

            $this->addFlash("success", "Product successfully added");
            return $this->redirectToRoute('app_home');
        }
        return $this->render('crud/create.html.twig', [
            "form" => $form->createView()
        ]);
    }
    
    #[Route('/edit/{id}', name: 'app_update')]
    public function edit($id, Request $request, ManagerRegistry $doctrine, FileUploader $fileUploader): Response
    {   
        $product = new Product();
        $product = $doctrine->getRepository(Product::class)->find($id);
        $picture_old = $product->getPicture();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();
            $picture = $form->get('picture')->getData();
            if($picture) {
                $fileName = $fileUploader->upload($picture);
                $product->setPicture($fileName);
            }else {
                $product->setPicture($picture_old);
            }
            $em = $doctrine->getManager();
            $em->persist($product);
            $em->flush();

            $this->addFlash("success", "Product successfully added");
            return $this->redirectToRoute('app_home');
        }
        return $this->render('crud/edit.html.twig', [
            "form" => $form->createView()
        ]);
    }

    #[Route('/details/{id}', name: 'app_details')]
    public function details($id, ManagerRegistry $doctrine): Response
    {
        $product = $doctrine->getRepository(Product::class)->find($id);
        return $this->render('crud/details.html.twig', [
            "product" => $product
        ]);
    }

    #[Route('/delete/{id}', name: 'app_delete')]
    public function delete($id, ManagerRegistry $doctrine): Response
    {
        $product = $doctrine->getRepository(Product::class)->find($id);
        $em = $doctrine->getManager();
        $em->remove($product);
        $em->flush();
        $this->addFlash("success", "Product has been removed");
        return $this->redirectToRoute("app_home");
    }

}