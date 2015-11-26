<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\ProfessionCodes;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Knack;

class Thief extends AbstractProfession
{
    const THIEF = ProfessionCodes::THIEF;

    /**
     * @param string $propertyCode
     * @return bool
     */
    public function isPrimaryProperty($propertyCode)
    {
        return in_array($propertyCode, [Agility::AGILITY, Knack::KNACK]);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::THIEF;
    }

}
