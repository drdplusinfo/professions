<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\Properties\PropertyCode;

class Ranger extends Profession
{
    /**
     * @return Ranger|Profession
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
        return [PropertyCode::KNACK, PropertyCode::STRENGTH];
    }
}