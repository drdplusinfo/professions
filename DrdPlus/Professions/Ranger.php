<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\ProfessionCode;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Base\Strength;

class Ranger extends Profession
{
    const RANGER = ProfessionCode::RANGER;

    /**
     * @return Ranger|Profession
     */
    public static function getIt()
    {
        return parent::getIt();
    }

    /**
     * @return array|string[]
     */
    public function getPrimaryProperties()
    {
        return [Knack::KNACK, Strength::STRENGTH];
    }

}