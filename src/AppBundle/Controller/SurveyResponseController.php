<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\SurveyResponse;
use AppBundle\Form\SurveyResponseType;

/**
 * SurveyResponse controller.
 *
 * @Route("/surveyresponse")
 */
class SurveyResponseController extends Controller
{
    /**
     * Lists all SurveyResponse entities.
     *
     * @Route("/", name="surveyresponse_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $surveyResponses = $em->getRepository('AppBundle:SurveyResponse')->findAll();

        return $this->render('surveyresponse/index.html.twig', array(
            'surveyResponses' => $surveyResponses,
        ));
    }

    /**
     * Creates a new SurveyResponse entity.
     *
     * @Route("/new", name="surveyresponse_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $surveyResponse = new SurveyResponse();
        $form = $this->createForm('AppBundle\Form\SurveyResponseType', $surveyResponse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($surveyResponse);
            $em->flush();

            return $this->redirectToRoute('surveyresponse_show', array('id' => $surveyResponse->getId()));
        }

        return $this->render('surveyresponse/new.html.twig', array(
            'surveyResponse' => $surveyResponse,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SurveyResponse entity.
     *
     * @Route("/{id}", name="surveyresponse_show")
     * @Method("GET")
     */
    public function showAction(SurveyResponse $surveyResponse)
    {
        $deleteForm = $this->createDeleteForm($surveyResponse);

        return $this->render('surveyresponse/show.html.twig', array(
            'surveyResponse' => $surveyResponse,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SurveyResponse entity.
     *
     * @Route("/{id}/edit", name="surveyresponse_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SurveyResponse $surveyResponse)
    {
        $deleteForm = $this->createDeleteForm($surveyResponse);
        $editForm = $this->createForm('AppBundle\Form\SurveyResponseType', $surveyResponse);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($surveyResponse);
            $em->flush();

            return $this->redirectToRoute('surveyresponse_edit', array('id' => $surveyResponse->getId()));
        }

        return $this->render('surveyresponse/edit.html.twig', array(
            'surveyResponse' => $surveyResponse,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SurveyResponse entity.
     *
     * @Route("/{id}", name="surveyresponse_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SurveyResponse $surveyResponse)
    {
        $form = $this->createDeleteForm($surveyResponse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($surveyResponse);
            $em->flush();
        }

        return $this->redirectToRoute('surveyresponse_index');
    }

    /**
     * Creates a form to delete a SurveyResponse entity.
     *
     * @param SurveyResponse $surveyResponse The SurveyResponse entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SurveyResponse $surveyResponse)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('surveyresponse_delete', array('id' => $surveyResponse->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
