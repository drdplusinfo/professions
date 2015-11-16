<?php
namespace DrdPlus\Professions;

use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Intelligence;

class Theurgist extends AbstractProfession
{
    const THEURGIST = 'theurgist';

    /**
     * @param string $propertyCode
     * @return bool
     */
    public function isPrimaryProperty($propertyCode)
    {
        return in_array($propertyCode, [Intelligence::INTELLIGENCE, Charisma::CHARISMA]);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::THEURGIST;
    }

}
