<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\ProfessionCodes;
use DrdPlus\Properties\Base\Agility;
use \DrdPlus\Properties\Base\Strength;

class Fighter extends Profession
{
    const FIGHTER = ProfessionCodes::FIGHTER;

    public function getPrimaryProperties()
    {
        return [Strength::STRENGTH, Agility::AGILITY];
    }
}
