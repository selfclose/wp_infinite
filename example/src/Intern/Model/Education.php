<?php
namespace Intern\Model;

use Intern\ConcatTrait\EnabledTrait;
use Intern\ConcatTrait\NameTrait;
use Intern\Config\Table;
use Intern\Controller\RedBeanController;

/**
 * @property int id
 * @property User user
 * @property string degree
 * @property int university_id
 * @property int GPA
 * @property \DateTime start_year
 * @property \DateTime end_year
 * @property int honour = 0 เกีรตินินม
 *
 * @property string description
 */
class Education extends RedBeanController
{
//    const DEGREE_Diploma = 'dip'; //อนุปริญญา
//    const DEGREE_Bachelor = 'bac'; //ปริญญาตรี
//    const DEGREE_Masters = 'mas'; //ปริญญาโท
//    const DEGREE_Doctoral = 'doc'; //ปริญญาโท

    protected $user;
    protected $degree;

    function __construct($id = 0)
    {
        parent::__construct($id);

        $this->dataModel->honour = 0;
    }

    //TODO: mis understanding move please
    /**
     * @return User
     */
    public function getUser()
    {
        if (empty($this->user)) {
            $this->user = new User($this-$this->dataModel->wp_users_id);
        }
        return $this->user;
    }

    /**
     * @param User $user_id
     */
    public function setUser($user_id)
    {
        $this->dataModel->wp_users_id = $user_id;
    }

    /**
     * @return EducationDegree
     */
    public function getDegree()
    {
        if (empty($degree)) {
            $this->degree = new EducationDegree($this->dataModel->degree_id);
        }
        return $this->degree;
    }

    /**
     * @param string $degree_id
     */
    public function setDegree($degree_id)
    {
        $this->dataModel->degree_id = $degree_id;
    }

    /**
     * @return EducationMajor
     */
    public function getMajors()
    {
        return $this->dataModel->sharedMajor;
    }

    /**
     * @param array $education_majors
     */
    public function setMajors($education_majors)
    {
        unset($this->dataModel->sharedMajor);
        if (is_array($education_majors)) {
            foreach ($education_majors as $education_major) {
                $this->dataModel->sharedMajor[] = \R::load(Table::MAJOR, $education_major);
            }
        }
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return University
     */
    public function getUniversity()
    {
        return new University($this->dataModel->sharedUniversity);
    }

    /**
     * @param $university_id array University
     */
    public function setUniversity($university_id)
    {
        $this->dataModel->university_id = $university_id;
    }

    /**
     * @return int
     */
    public function getGPA()
    {
        return $this->dataModel->GPA;
    }

    /**
     * @param int $GPA
     */
    public function setGPA($GPA)
    {
        $this->dataModel->GPA = $GPA;
    }

    /**
     * @return \DateTime
     */
    public function getStartYear()
    {
        return $this->dataModel->start_year;
    }

    /**
     * @param \DateTime $start_year
     */
    public function setStartYear($start_year)
    {
        $this->dataModel->start_year = $start_year;
    }

    /**
     * @return \DateTime
     */
    public function getEndYear()
    {
        return $this->dataModel->end_year;
    }

    /**
     * @param \DateTime $end_year
     */
    public function setEndYear($end_year)
    {
        $this->dataModel->end_year = $end_year;
    }

    /**
     * @return int
     */
    public function getHonour()
    {
        return $this->dataModel->honour;
    }

    /**
     * @param int $honour
     */
    public function setHonour($honour)
    {
        $this->dataModel->honour = $honour;
    }
}
