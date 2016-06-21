<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\ProfessionCode;
use DrdPlus\Properties\Base\Agility;
use \DrdPlus\Properties\Base\Strength;

class Fighter extends Profession
{
    const FIGHTER = ProfessionCode::FIGHTER;

    /**
     * @return static|Fighter
     */
    public static function getIt()
    {
        return parent::getIt();
    }

    public function getPrimaryProperties()
    {
        return [Strength::STRENGTH, Agility::AGILITY];
    }
}
