<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateType;

/**
 * Survey
 *
 * @ORM\Table(name="survey")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SurveyRepository")
 */
class Survey
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
     * @ORM\Column(name="title", type="text")
     */

    private $title;


    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdDate", type="DateTime")
     */

    private $createdDate;

    /**
     * @ORM\OneToMany(targetEntity="SurveyQuestion", mappedBy="survey")
     */

    private $surveyQuestions;

    /**
     * @ORM\OneToMany(targetEntity="SurveyResponse", mappedBy="survey")
     */

    private $SurveyResponse;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="survey")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


    /**
     * Get id
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Survey
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Survey
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return Survey
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        // $this->getCreatedDate()->format('Y-m-d H:i:s');
        return $this->createdDate;

    }

    public function __construct()
    {
        $this->surveyQuestions = new ArrayCollection();
        $this->SurveyResponse = new ArrayCollection();
        $this->user = new ArrayCollection();
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

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function addUser(\AppBundle\Entity\User $user    )
    {
        $this->user[] = $user ;

        return $this;
    }

    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }
    /**
     * @var \DateTime
     */
      private $createddate;

    /**
     * @var \AppBundle\Entity\User
     */



}
