<?php

namespace AppBundle\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Machine;
use AppBundle\Form\MachineType;

/**
 * Machine controller.
 *
 * @Route("/admin/machine")
 */
class MachineController extends Controller
{
    /**
     * Lists all Machine entities.
     *
     * @Route("/", name="machine_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $machines = $em->getRepository('AppBundle:Machine')->findAll();

        return $this->render('machine/index.html.twig', array(
            'machines' => $machines,
        ));
    }

    /**
     * Creates a new Machine entity.
     *
     * @Route("/new", name="machine_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $machine = new Machine();
        $form = $this->createForm('AppBundle\Form\MachineType', $machine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($machine);
            $em->flush();

            return $this->redirectToRoute('machine_show', array('id' => $machine->getId()));
        }

        return $this->render('machine/new.html.twig', array(
            'machine' => $machine,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Machine entity.
     *
     * @Route("/{id}", name="machine_show")
     * @Method("GET")
     */
    public function showAction(Machine $machine)
    {
        $deleteForm = $this->createDeleteForm($machine);

        return $this->render('machine/show.html.twig', array(
            'machine' => $machine,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Machine entity.
     *
     * @Route("/{id}/edit", name="machine_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Machine $machine)
    {
        $deleteForm = $this->createDeleteForm($machine);
        $editForm = $this->createForm('AppBundle\Form\MachineType', $machine);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($machine);
            $em->flush();

            return $this->redirectToRoute('machine_edit', array('id' => $machine->getId()));
        }

        return $this->render('machine/edit.html.twig', array(
            'machine' => $machine,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Machine entity.
     *
     * @Route("/{id}", name="machine_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Machine $machine)
    {
        $form = $this->createDeleteForm($machine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($machine);
            $em->flush();
        }

        return $this->redirectToRoute('machine_index');
    }

    /**
     * Creates a form to delete a Machine entity.
     *
     * @param Machine $machine The Machine entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Machine $machine)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('machine_delete', array('id' => $machine->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
