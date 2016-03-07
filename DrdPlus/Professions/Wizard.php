<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\ProfessionCodes;
use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Will;

class Wizard extends Profession
{
    const WIZARD = ProfessionCodes::WIZARD;

    /**
     * @return Wizard|static
     */
    public static function getIt()
    {
        return parent::getIt();
    }

    public function getPrimaryProperties()
    {
        return [Will::WILL, Intelligence::INTELLIGENCE];
    }
}
