<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\ProfessionCode;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Will;

class Priest extends Profession
{
    const PRIEST = ProfessionCode::PRIEST;

    /**
     * @return Priest|Profession
     */
    public static function getIt()
    {
        return parent::getIt();
    }

    public function getPrimaryProperties()
    {
        return [Will::WILL, Charisma::CHARISMA];
    }
}