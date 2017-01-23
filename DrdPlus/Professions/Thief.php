<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\Properties\PropertyCode;

class Thief extends Profession
{
    /**
     * @return Thief|Profession
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
        return [PropertyCode::AGILITY, PropertyCode::KNACK];
    }
}