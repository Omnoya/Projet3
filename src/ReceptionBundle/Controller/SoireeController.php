<?php

namespace ReceptionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ReceptionBundle\Entity\Soiree;
use ReceptionBundle\Form\SoireeType;

/**
 * Soiree controller.
 *
 */
class SoireeController extends Controller
{
    /**
     * Lists all Soiree entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $soirees = $em->getRepository('ReceptionBundle:Soiree')->findAll();
        $users = $em->getRepository('UserBundle:User')->findAll();
        
        return $this->render('ReceptionBundle:soiree:index.html.twig', array(
            'soirees' => $soirees,
            'users' => $users,
        ));
    }

    /**
     * Creates a new Soiree entity.
     *
     */
    public function newAction(Request $request)
    {
        $soiree = new Soiree();
        $form = $this->createForm('ReceptionBundle\Form\SoireeType', $soiree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($soiree);
            $em->flush();

            return $this->redirectToRoute('soiree_show', array('id' => $soiree->getId()));
        }

        return $this->render('ReceptionBundle:soiree:new.html.twig', array(
            'soiree' => $soiree,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Soiree entity.
     *
     */
    public function showAction(Soiree $soiree)
    {
        $deleteForm = $this->createDeleteForm($soiree);

        return $this->render('ReceptionBundle:soiree:show.html.twig', array(
            'soiree' => $soiree,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Soiree entity.
     *
     */
    public function editAction(Request $request, Soiree $soiree)
    {
        $deleteForm = $this->createDeleteForm($soiree);
        $editForm = $this->createForm('ReceptionBundle\Form\SoireeType', $soiree);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($soiree);
            $em->flush();

            return $this->redirectToRoute('soiree_edit', array('id' => $soiree->getId()));
        }

        return $this->render('ReceptionBundle:soiree:edit.html.twig', array(
            'soiree' => $soiree,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Soiree entity.
     *
     */
    public function deleteAction(Request $request, Soiree $soiree)
    {
        $form = $this->createDeleteForm($soiree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($soiree);
            $em->flush();
        }

        return $this->redirectToRoute('soiree_index');
    }

    /**
     * Creates a form to delete a Soiree entity.
     *
     * @param Soiree $soiree The Soiree entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Soiree $soiree)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('soiree_delete', array('id' => $soiree->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
