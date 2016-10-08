<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\ProfessionCode;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Intelligence;

class Theurgist extends Profession
{
    const THEURGIST = ProfessionCode::THEURGIST;

    /**
     * @return Theurgist|Profession
     */
    public static function getIt()
    {
        return parent::getIt();
    }

    public function getPrimaryProperties()
    {
        return [Intelligence::INTELLIGENCE, Charisma::CHARISMA];
    }
}