<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\ProfessionCodes;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Will;

class Priest extends AbstractProfession
{
    const PRIEST = ProfessionCodes::PRIEST;

    /**
     * @param string $propertyCode
     * @return bool
     */
    public function isPrimaryProperty($propertyCode)
    {
        return in_array($propertyCode, [Will::WILL, Charisma::CHARISMA]);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::PRIEST;
    }

}
