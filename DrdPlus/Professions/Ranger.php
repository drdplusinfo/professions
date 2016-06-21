<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\ProfessionCode;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Base\Strength;

class Ranger extends Profession
{
    const RANGER = ProfessionCode::RANGER;

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
