<?php
namespace DrdPlus\Tests\Professions;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Knack;

class ThiefTest extends AbstractTestOfProfession
{
    protected function getPrimaryProperties()
    {
        return [Agility::AGILITY, Knack::KNACK];
    }
}
