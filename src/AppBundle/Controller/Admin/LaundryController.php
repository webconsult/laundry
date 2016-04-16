<?php

namespace AppBundle\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Laundry;
use AppBundle\Form\LaundryType;

/**
 * Laundry controller.
 *
 * @Route("/admin/laundry")
 */
class LaundryController extends Controller
{
    /**
     * Lists all Laundry entities.
     *
     * @Route("/", name="laundry_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $laundries = $em->getRepository('AppBundle:Laundry')->findAll();

        return $this->render('laundry/index.html.twig', array(
            'laundries' => $laundries,
        ));
    }

    /**
     * Creates a new Laundry entity.
     *
     * @Route("/new", name="laundry_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $laundry = new Laundry();
        $form = $this->createForm('AppBundle\Form\LaundryType', $laundry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($laundry);
            $em->flush();

            return $this->redirectToRoute('laundry_show', array('id' => $laundry->getId()));
        }

        return $this->render('laundry/new.html.twig', array(
            'laundry' => $laundry,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Laundry entity.
     *
     * @Route("/{id}", name="laundry_show")
     * @Method("GET")
     */
    public function showAction(Laundry $laundry)
    {
        $deleteForm = $this->createDeleteForm($laundry);

        return $this->render('laundry/show.html.twig', array(
            'laundry' => $laundry,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Laundry entity.
     *
     * @Route("/{id}/edit", name="laundry_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Laundry $laundry)
    {
        $deleteForm = $this->createDeleteForm($laundry);
        $editForm = $this->createForm('AppBundle\Form\LaundryType', $laundry);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($laundry);
            $em->flush();

            return $this->redirectToRoute('laundry_edit', array('id' => $laundry->getId()));
        }

        return $this->render('laundry/edit.html.twig', array(
            'laundry' => $laundry,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Laundry entity.
     *
     * @Route("/{id}", name="laundry_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Laundry $laundry)
    {
        $form = $this->createDeleteForm($laundry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($laundry);
            $em->flush();
        }

        return $this->redirectToRoute('laundry_index');
    }

    /**
     * Creates a form to delete a Laundry entity.
     *
     * @param Laundry $laundry The Laundry entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Laundry $laundry)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('laundry_delete', array('id' => $laundry->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
