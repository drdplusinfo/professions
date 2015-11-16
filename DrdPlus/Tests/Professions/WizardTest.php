<?php
namespace DrdPlus\Tests\Professions;

use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Will;

class WizardTest extends AbstractTestOfProfession
{
    protected function getPrimaryProperties()
    {
        return [Will::WILL, Intelligence::INTELLIGENCE];
    }
}
