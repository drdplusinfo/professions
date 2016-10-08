<?php
namespace DrdPlus\Tests\Professions;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Knack;

class ThiefTest extends ProfessionTest
{
    protected function getExpectedPrimaryProperties()
    {
        return [Agility::AGILITY, Knack::KNACK];
    }
}