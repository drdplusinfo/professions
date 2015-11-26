<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\ProfessionCodes;
use DrdPlus\Properties\Base\Agility;
use \DrdPlus\Properties\Base\Strength;

class Fighter extends AbstractProfession
{
    const FIGHTER = ProfessionCodes::FIGHTER;

    /**
     * @param string $propertyCode
     * @return bool
     */
    public function isPrimaryProperty($propertyCode)
    {
        return in_array($propertyCode, [Strength::STRENGTH, Agility::AGILITY]);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::FIGHTER;
    }

}
