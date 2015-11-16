<?php
namespace DrdPlus\Professions;

use DrdPlus\Properties\Base\Agility;
use \DrdPlus\Properties\Base\Strength;

class Fighter extends AbstractProfession
{
    const FIGHTER = 'fighter';

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
