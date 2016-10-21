<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SurveyQuestion
 *
 * @ORM\Table(name="survey_question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SurveyQuestionRepository")
 */
class SurveyQuestion
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
     * Get id
     *
     * @return int
     */

    /**
     * @ORM\ManyToOne(targetEntity="Survey", inversedBy="SurveyQuestion")
     * @ORM\JoinColumn(name="survey_id", referencedColumnName="id")
     */
    private $survey;


    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="SurveyQuestion")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     */
    private $question;


    public function getSurvey()
    {
        return $this->survey;
    }

    public function setSurvey($survey)
    {
        $this->survey = $survey;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getQuestion()
    {
        return $this->question;
    }

    public function setQuestion($question)
    {
        $this->question = $question;
        return $this;
    }
}
