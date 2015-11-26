<?php
namespace DrdPlus\Tests\Professions;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Strength;

class FighterTest extends AbstractTestOfProfession
{
    protected function getPrimaryProperties()
    {
        return [Strength::STRENGTH, Agility::AGILITY];
    }
}