<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\ProfessionCode;
use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Will;

class Wizard extends Profession
{
    const WIZARD = ProfessionCode::WIZARD;

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
        return [Will::WILL, Intelligence::INTELLIGENCE];
    }
}