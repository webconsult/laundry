<?php

namespace AppBundle\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\MachineType;
use AppBundle\Form\MachineTypeType;

/**
 * MachineType controller.
 *
 * @Route("/admin/machinetype")
 */
class MachineTypeController extends Controller
{
    /**
     * Lists all MachineType entities.
     *
     * @Route("/", name="machinetype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $machineTypes = $em->getRepository('AppBundle:MachineType')->findAll();

        return $this->render('machinetype/index.html.twig', array(
            'machineTypes' => $machineTypes,
        ));
    }

    /**
     * Creates a new MachineType entity.
     *
     * @Route("/new", name="machinetype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $machineType = new MachineType();
        $form = $this->createForm('AppBundle\Form\MachineTypeType', $machineType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($machineType);
            $em->flush();

            return $this->redirectToRoute('machinetype_show', array('id' => $machineType->getId()));
        }

        return $this->render('machinetype/new.html.twig', array(
            'machineType' => $machineType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MachineType entity.
     *
     * @Route("/{id}", name="machinetype_show")
     * @Method("GET")
     */
    public function showAction(MachineType $machineType)
    {
        $deleteForm = $this->createDeleteForm($machineType);

        return $this->render('machinetype/show.html.twig', array(
            'machineType' => $machineType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MachineType entity.
     *
     * @Route("/{id}/edit", name="machinetype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MachineType $machineType)
    {
        $deleteForm = $this->createDeleteForm($machineType);
        $editForm = $this->createForm('AppBundle\Form\MachineTypeType', $machineType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($machineType);
            $em->flush();

            return $this->redirectToRoute('machinetype_edit', array('id' => $machineType->getId()));
        }

        return $this->render('machinetype/edit.html.twig', array(
            'machineType' => $machineType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MachineType entity.
     *
     * @Route("/{id}", name="machinetype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MachineType $machineType)
    {
        $form = $this->createDeleteForm($machineType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($machineType);
            $em->flush();
        }

        return $this->redirectToRoute('machinetype_index');
    }

    /**
     * Creates a form to delete a MachineType entity.
     *
     * @param MachineType $machineType The MachineType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MachineType $machineType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('machinetype_delete', array('id' => $machineType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
