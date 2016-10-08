<?php
namespace DrdPlus\Tests\Professions;

use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Will;

class WizardTest extends ProfessionTest
{
    protected function getExpectedPrimaryProperties()
    {
        return [Will::WILL, Intelligence::INTELLIGENCE];
    }
}