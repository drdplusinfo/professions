<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\ProfessionCode;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Knack;

class Thief extends Profession
{
    const THIEF = ProfessionCode::THIEF;

    /**
     * @return Thief|static
     */
    public static function getIt()
    {
        return parent::getIt();
    }

    public function getPrimaryProperties()
    {
        return [Agility::AGILITY, Knack::KNACK];
    }
}
