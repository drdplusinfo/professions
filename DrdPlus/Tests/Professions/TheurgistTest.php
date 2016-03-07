<?php
namespace DrdPlus\Tests\Professions;

use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Intelligence;

class TheurgistTest extends ProfessionTest
{
    protected function getPrimaryProperties()
    {
        return [Intelligence::INTELLIGENCE, Charisma::CHARISMA];
    }
}
