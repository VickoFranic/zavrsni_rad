<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionRepository")
 */
class Question
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

   /**
     * @var string
     *
     * @ORM\Column(name="questiontype", type="string", length=200)
     */
    private $questiontype;

    /**
     * @ORM\OneToMany(targetEntity="SurveyQuestion", mappedBy="question")
     */

    private $surveyQuestions;

    /**
     * @ORM\OneToMany(targetEntity="SurveyResponse", mappedBy="question")
     */

    private $SurveyResponse;
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Question
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set questiontype
     *
     * @param string $questiontype
     *
     * @return Question
     */
    public function setQuestiontype($questiontype)
    {
        $this->questiontype = $questiontype;

        return $this;
    }

    /**
     * Get questiontype
     *
     * @return string
     */
    public function getQuestiontype()
    {
        return $this->questiontype;

    }

    public function __construct()
    {
        $this->surveyQuestions = new ArrayCollection();
        $this->SurveyResponse = new ArrayCollection();
    }

    public function getSurveyQuestions()
    {
        return $this->surveyQuestions;
    }

    public function setSurveyQuestions($questions)
    {
        $this->surveyQuestions = $questions;
    }

    public function addSurveyQuestions(\AppBundle\Entity\SurveyQuestion $surveyQuestion)
    {
        $this->surveyQuestion[] = $surveyQuestion;

        return $this;
    }

    public function removeSurveyQuestion(\AppBundle\Entity\SurveyQuestion $surveyQuestion)
    {
        $this->surveyQuestion->removeElement($surveyQuestion);
    }
    public function getSurveyResponse()
    {
        return $this->SurveyResponse;
    }

    public function setSurveyResponse($responses)
    {
        $this->SurveyResponse = $responses;
    }

    public function addSurveyResponses(\AppBundle\Entity\SurveyResponse $surveyResponse)
    {
        $this->SurveyResponse[] = $surveyResponse;

        return $this;
    }

    public function removeSurveyResponse(\AppBundle\Entity\SurveyResponse $surveyResponse)
    {
        $this->SurveyResponse->removeElement($surveyResponse);
    }


}
