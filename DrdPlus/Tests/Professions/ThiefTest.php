<?php
namespace DrdPlus\Tests\Professions;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Knack;

class ThiefTest extends ProfessionTest
{
    protected function getPrimaryProperties()
    {
        return [Agility::AGILITY, Knack::KNACK];
    }
}
