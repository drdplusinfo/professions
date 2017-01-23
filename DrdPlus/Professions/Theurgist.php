<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\Properties\PropertyCode;

class Theurgist extends Profession
{
    /**
     * @return Theurgist|Profession
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
        return [PropertyCode::INTELLIGENCE, PropertyCode::CHARISMA];
    }
}