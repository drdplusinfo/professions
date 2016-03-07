<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\ProfessionCodes;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Knack;

class Thief extends Profession
{
    const THIEF = ProfessionCodes::THIEF;

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
