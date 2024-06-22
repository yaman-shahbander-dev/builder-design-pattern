<?php

// Resume Director
class ResumeDirector
{
    private ResumeBuilder $builder;

    public function setBuilder(ResumeBuilder $builder): void
    {
        $this->builder = $builder;
    }

    public function buildResume(): Resume
    {
        return $this->builder
        	->buildPersonalInfo()
        	->buildEducation()
        	->buildWorkExperience()
        	->buildSkills()
        	->getResume();
    }
}

// Resume Builder Interface
interface ResumeBuilder
{
    public function buildPersonalInfo();
    public function buildEducation();
    public function buildWorkExperience();
    public function buildSkills();
    public function getResume(): Resume;
}

// Concrete Resume Builders
class BasicResumeBuilder implements ResumeBuilder
{
    private Resume $resume;

    public function __construct()
    {
        $this->resume = new Resume();
    }

    public function buildPersonalInfo()
    {
        $this->resume->setPersonalInfo([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '123-456-7890',
        ]);

        return $this;
    }

    public function buildEducation()
    {
        $this->resume->setEducation([
            [
                'school' => 'University of Example',
                'degree' => 'Bachelor of Science',
                'graduation_year' => 2020,
            ],
        ]);

        return $this;
    }

    public function buildWorkExperience()
    {
        $this->resume->setWorkExperience([
            [
                'company' => 'Example Corp',
                'position' => 'Software Engineer',
                'start_date' => '2020-06-01',
                'end_date' => '2022-12-31',
                'responsibilities' => [
                    'Developed and maintained web applications',
                    'Collaborated with cross-functional teams',
                    'Participated in agile software development practices',
                ],
            ],
        ]);

        return $this;
    }

    public function buildSkills()
    {
        $this->resume->setSkills([
            'PHP',
            'JavaScript',
            'SQL',
            'Git',
        ]);

        return $this;
    }

    public function getResume(): Resume
    {
        return $this->resume;
    }
}

class AdvancedResumeBuilder implements ResumeBuilder
{
    private Resume $resume;

    public function __construct()
    {
        $this->resume = new Resume();
    }

    public function buildPersonalInfo()
    {
        $this->resume->setPersonalInfo([
            'name' => 'Jane Doe',
            'email' => 'jane.doe@example.com',
            'phone' => '987-654-3210',
            'address' => '123 Main St, Anytown USA',
        ]);

        return $this;
    }

    public function buildEducation()
    {
        $this->resume->setEducation([
            [
                'school' => 'University of Example',
                'degree' => 'Master of Science',
                'graduation_year' => 2022,
                'gpa' => 3.8,
            ],
            [
                'school' => 'College of Example',
                'degree' => 'Bachelor of Arts',
                'graduation_year' => 2020,
                'gpa' => 3.5,
            ],
        ]);

        return $this;
    }

    public function buildWorkExperience()
    {
        $this->resume->setWorkExperience([
            [
                'company' => 'Example Corp',
                'position' => 'Senior Software Engineer',
                'start_date' => '2022-01-01',
                'end_date' => 'Present',
                'responsibilities' => [
                    'Led the development of a new web application',
                    'Mentored junior engineers',
                    'Participated in architectural design discussions',
                ],
            ],
            [
                'company' => 'Previous Company',
                'position' => 'Software Engineer',
                'start_date' => '2020-06-01',
                'end_date' => '2021-12-31',
                'responsibilities' => [
                    'Developed and maintained web applications',
                    'Collaborated with cross-functional teams',
                    'Participated in agile software development practices',
                ],
            ],
        ]);

        return $this;
    }

    public function buildSkills()
    {
        $this->resume->setSkills([
            'PHP',
            'JavaScript',
            'React',
            'Node.js',
            'SQL',
            'Git',
            'Agile',
        ]);

        return $this;
    }

    public function getResume(): Resume
    {
        return $this->resume;
    }
}

// Resume Class
class Resume
{
    private array $personalInfo = [];
    private array $education = [];
    private array $workExperience = [];
    private array $skills = [];

    public function setPersonalInfo(array $info): void
    {
        $this->personalInfo = $info;
    }

    public function setEducation(array $education): void
    {
        $this->education = $education;
    }

    public function setWorkExperience(array $experience): void
    {
        $this->workExperience = $experience;
    }

    public function setSkills(array $skills): void
    {
        $this->skills = $skills;
    }

    public function getPersonalInfo(): array
    {
        return $this->personalInfo;
    }

    public function getEducation(): array
    {
        return $this->education;
    }

    public function getWorkExperience(): array
    {
        return $this->workExperience;
    }

    public function getSkills(): array
    {
        return $this->skills;
    }
}

// Usage Example
$director = new ResumeDirector();

$director->setBuilder(new BasicResumeBuilder());
$basicResume = $director->buildResume();
var_dump($basicResume->getPersonalInfo());
var_dump($basicResume->getEducation());
var_dump($basicResume->getWorkExperience());
var_dump($basicResume->getSkills());

$director->setBuilder(new AdvancedResumeBuilder());
$advancedResume = $director->buildResume();
var_dump($advancedResume->getPersonalInfo());
var_dump($advancedResume->getEducation());
var_dump($advancedResume->getWorkExperience());
var_dump($advancedResume->getSkills());
