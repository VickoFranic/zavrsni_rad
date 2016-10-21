<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SurveyResponse
 *
 * @ORM\Table(name="survey_response")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SurveyResponseRepository")
 */
class SurveyResponse
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
     * @ORM\Column(name="value", type="text")
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="SurveyResponses")
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Survey", inversedBy="SurveyResponse")
     * @ORM\JoinColumn(name="survey_id", referencedColumnName="id")
     */
    private $survey;

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="SurveyResponse")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     */
    private $question;

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }


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
     * Set value
     *
     * @param string $value
     *
     * @return SurveyResponse
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
    public function getSurvey()
    {
        return $this->survey;
    }

    public function setSurvey($survey)
    {
        $this->survey = $survey;
        return $this;
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
