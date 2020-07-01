<?php

namespace App\Controller;

use App\Entity\Boutique;
use App\Form\BoutiqueType;
use App\Repository\BoutiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/boutique")
 */
class BoutiqueController extends AbstractController
{
    /**
     * @Route("/", name="boutique_index", methods={"GET"})
     */
    public function index(BoutiqueRepository $boutiqueRepository): Response
    {

       // 'firstname'=>$user->getUserName()
        return $this->render('boutique/index.html.twig', [
            'boutiques' => $boutiqueRepository->findAll(),
        ]);
    }
     /**
     * @Route("/listboutique", name="boutique_list", methods={"GET"})
     */
    public function indexArticle(BoutiqueRepository $boutiqueRepository): Response
    {
        return $this->render('index/index.html.twig', [
            'boutiques' => $$boutiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="boutique_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $boutique = new Boutique();
        $form = $this->createForm(BoutiqueType::class, $boutique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($boutique);
            $entityManager->flush();

            return $this->redirectToRoute('boutique_index');
        }

        return $this->render('boutique/new.html.twig', [
            'boutique' => $boutique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="boutique_show", methods={"GET"})
     */
    public function show(Boutique $boutique): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        return $this->render('boutique/show.html.twig', [
            'boutique' => $boutique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="boutique_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Boutique $boutique): Response
    {     
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $form = $this->createForm(BoutiqueType::class, $boutique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('boutique_index');
        }

        return $this->render('boutique/edit.html.twig', [
            'boutique' => $boutique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="boutique_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Boutique $boutique): Response
    {      
        if ($this->isCsrfTokenValid('delete'.$boutique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($boutique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('boutique_index');
    }
}
