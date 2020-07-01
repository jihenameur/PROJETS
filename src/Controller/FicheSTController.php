<?php

namespace App\Controller;

use App\Entity\FicheST;
use App\Form\FicheSTType;
use App\Repository\FicheSTRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fiche/s/t")
 */
class FicheSTController extends AbstractController
{
    /**
     * @Route("/", name="fiche_s_t_index", methods={"GET"})
     */
    public function index(FicheSTRepository $ficheSTRepository): Response
    {
        return $this->render('fiche_st/index.html.twig', [
            'fiche_s_ts' => $ficheSTRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="fiche_s_t_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {        

        $this->denyAccessUnlessGrantet('ROLE_ADMIN');

        $ficheST = new FicheST();
        $form = $this->createForm(FicheSTType::class, $ficheST);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ficheST);
            $entityManager->flush();

            return $this->redirectToRoute('fiche_s_t_index');
        }

        return $this->render('fiche_st/new.html.twig', [
            'fiche_s_t' => $ficheST,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fiche_s_t_show", methods={"GET"})
     */
    public function show(FicheST $ficheST): Response
    {
        return $this->render('fiche_st/show.html.twig', [
            'fiche_s_t' => $ficheST,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fiche_s_t_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FicheST $ficheST): Response
    {
        $this->denyAccessUnlessGrantet('ROLE_ADMIN');

        $form = $this->createForm(FicheSTType::class, $ficheST);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fiche_s_t_index');
        }

        return $this->render('fiche_st/edit.html.twig', [
            'fiche_s_t' => $ficheST,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fiche_s_t_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FicheST $ficheST): Response
    {
       $this->denyAccessUnlessGrantet('ROLE_ADMIN');

        if ($this->isCsrfTokenValid('delete'.$ficheST->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ficheST);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fiche_s_t_index');
    }
}
