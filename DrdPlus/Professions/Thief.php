<?php
namespace DrdPlus\Professions;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Knack;

class Thief extends AbstractProfession
{
    const THIEF = 'thief';

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
