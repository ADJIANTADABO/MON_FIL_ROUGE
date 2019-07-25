<?php

namespace App\Controller;

use App\Entity\Adminpartenaire;
use App\Form\AdminpartenaireType;
use App\Repository\AdminpartenaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/adminpartenaire")
 */
class AdminpartenaireController extends AbstractController
{
    /**
     * @Route("/", name="adminpartenaire_index", methods={"GET","POST"})
     */
    public function index(AdminpartenaireRepository $adminpartenaireRepository): Response
    {
        return $this->render('adminpartenaire/index.html.twig', [
            'adminpartenaires' => $adminpartenaireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="adminpartenaire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $adminpartenaire = new Adminpartenaire();
        $form = $this->createForm(AdminpartenaireType::class, $adminpartenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($adminpartenaire);
            $entityManager->flush();

            return $this->redirectToRoute('adminpartenaire_indexf');
        }

        return $this->render('adminpartenaire/new.html.twig', [
            'adminpartenaire' => $adminpartenaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="adminpartenaire_show", methods={"GET","POST"})
     */
    public function show(Adminpartenaire $adminpartenaire): Response
    {
        return $this->render('adminpartenaire/show.html.twig', [
            'adminpartenaire' => $adminpartenaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="adminpartenaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Adminpartenaire $adminpartenaire): Response
    {
        $form = $this->createForm(AdminpartenaireType::class, $adminpartenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adminpartenaire_index');
        }

        return $this->render('adminpartenaire/edit.html.twig', [
            'adminpartenaire' => $adminpartenaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="adminpartenaire_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Adminpartenaire $adminpartenaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adminpartenaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($adminpartenaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('adminpartenaire_index');
    }
}
