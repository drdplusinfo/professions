<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\Properties\PropertyCode;

class Fighter extends Profession
{
    /**
     * @return Fighter|Profession
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
        return [PropertyCode::STRENGTH, PropertyCode::AGILITY];
    }
}