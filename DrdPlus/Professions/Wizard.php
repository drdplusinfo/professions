<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\PropertyCode;

class Wizard extends Profession
{
    /**
     * @return Wizard|Profession
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
        return [PropertyCode::WILL, PropertyCode::INTELLIGENCE];
    }
}