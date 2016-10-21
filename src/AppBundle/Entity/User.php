<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(name="firstName", type="string", length=200)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=200)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="userName", type="string", length=200)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=200)
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="users")
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     */
    private $role;

    /**
     * @ORM\OneToMany(targetEntity="SurveyResponse", mappedBy="user")
     */
    private $surveyResponses;

    /**
     * @ORM\OneToMany(targetEntity="Survey", mappedBy="user")
     */
    private $survey;


    public function __construct()
    {
        $this->surveyResponses = new ArrayCollection();
        $this->survey = new ArrayCollection();
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    public function getSurveyResponses()
    {
        return $this->surveyResponses;
    }

    public function setSurveyResponses($responses)
    {
        $this->surveyResponses = $responses;
    }

    public function addSurveyResponse(\AppBundle\Entity\SurveyResponse $surveyResponse)
    {
        $this->surveyResponses[] = $surveyResponse;

        return $this;
    }

    public function removeSurveyResponse(\AppBundle\Entity\SurveyResponse $surveyResponse)
    {
        $this->surveyResponses->removeElement($surveyResponse);
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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstname = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstname;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastname = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastname;
    }

    /**
     * Set userName
     *
     * @param string $userName
     *
     * @return User
     */
    public function setUserName($userName)
    {
        $this->username = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }



}
