<?php
namespace DrdPlus\Tests\Professions;

use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Will;

class PriestTest extends ProfessionTest
{
    protected function getPrimaryProperties()
    {
        return [Will::WILL, Charisma::CHARISMA];
    }
}
