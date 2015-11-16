<?php
namespace DrdPlus\Tests\Professions;

use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Base\Strength;

class RangerTest extends AbstractTestOfProfession
{
    protected function getPrimaryProperties()
    {
        return [Strength::STRENGTH, Knack::KNACK];
    }
}
