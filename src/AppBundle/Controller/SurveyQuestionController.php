<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\SurveyQuestion;
use AppBundle\Form\SurveyQuestionType;

/**
 * SurveyQuestion controller.
 *
 * @Route("/surveyquestion")
 */
class SurveyQuestionController extends Controller
{
    /**
     * Lists all SurveyQuestion entities.
     *
     * @Route("/", name="surveyquestion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $SurveyQuestions = $em->getRepository('AppBundle:SurveyQuestion')->findAll();

        return $this->render('surveyquestion/index.html.twig', array(
            'SurveyQuestions' => $SurveyQuestions,
        ));
    }

    /**
     * Creates a new SurveyQuestion entity.
     *
     * @Route("/new", name="surveyquestion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $SurveyQuestion = new SurveyQuestion();
        $form = $this->createForm('AppBundle\Form\SurveyQuestionType', $SurveyQuestion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($SurveyQuestion);
            $em->flush();

            return $this->redirectToRoute('surveyquestion_show', array('id' => $SurveyQuestion->getId()));
        }

        return $this->render('surveyquestion/new.html.twig', array(
            'SurveyQuestion' => $SurveyQuestion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SurveyQuestion entity.
     *
     * @Route("/{id}", name="surveyquestion_show")
     * @Method("GET")
     */
    public function showAction(SurveyQuestion $SurveyQuestion)
    {
        $deleteForm = $this->createDeleteForm($SurveyQuestion);

        return $this->render('surveyquestion/show.html.twig', array(
            'SurveyQuestion' => $SurveyQuestion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SurveyQuestion entity.
     *
     * @Route("/{id}/edit", name="surveyquestion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SurveyQuestion $SurveyQuestion)
    {
        $deleteForm = $this->createDeleteForm($SurveyQuestion);
        $editForm = $this->createForm('AppBundle\Form\SurveyQuestionType', $SurveyQuestion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($SurveyQuestion);
            $em->flush();

            return $this->redirectToRoute('surveyquestion_edit', array('id' => $SurveyQuestion->getId()));
        }

        return $this->render('surveyquestion/edit.html.twig', array(
            'SurveyQuestion' => $SurveyQuestion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SurveyQuestion entity.
     *
     * @Route("/{id}", name="surveyquestion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SurveyQuestion $SurveyQuestion)
    {
        $form = $this->createDeleteForm($SurveyQuestion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($SurveyQuestion);
            $em->flush();
        }

        return $this->redirectToRoute('surveyquestion_index');
    }

    /**
     * Creates a form to delete a SurveyQuestion entity.
     *
     * @param SurveyQuestion $SurveyQuestion The SurveyQuestion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SurveyQuestion $SurveyQuestion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('surveyquestion_delete', array('id' => $SurveyQuestion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
