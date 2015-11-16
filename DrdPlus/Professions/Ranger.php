<?php
namespace DrdPlus\Professions;

use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Base\Strength;

class Ranger extends AbstractProfession
{
    const RANGER = 'ranger';

    /**
     * @param string $propertyCode
     * @return bool
     */
    public function isPrimaryProperty($propertyCode)
    {
        return in_array($propertyCode, [Strength::STRENGTH, Knack::KNACK]);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::RANGER;
    }

}
