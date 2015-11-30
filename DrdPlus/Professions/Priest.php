<?php
namespace DrdPlus\Professions;

use DrdPlus\Codes\ProfessionCodes;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Will;

class Priest extends Profession
{
    const PRIEST = ProfessionCodes::PRIEST;

    public function getPrimaryProperties()
    {
        return [Will::WILL, Charisma::CHARISMA];
    }
}
