<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\ProfessionCodes;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Base\Strength;

class Ranger extends Profession
{
    const RANGER = ProfessionCodes::RANGER;

    /**
     * @return Ranger|static
     */
    public static function getIt()
    {
        return parent::getIt();
    }

    public function getPrimaryProperties()
    {
        return [Strength::STRENGTH, Knack::KNACK];
    }

}
