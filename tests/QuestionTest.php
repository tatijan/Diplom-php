<?php
namespace Tests;

use App\Question;


class QuestionTest extends \PHPUnit_Framework_TestCase
{
    use CreatesApplication;

    protected function setUp()
    {
        $this->createApplication();
    }

    public function testQuestionToStopWordsGetRelations()
    {
        $questionBlocked = Question::getBlocked();

        $this->assertNotEmpty($questionBlocked);
    }
}
