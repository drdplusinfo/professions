<?php
namespace DrdPlus\Professions\EnumTypes;

use Doctrine\DBAL\Types\Type;
use DrdPlus\Professions\Fighter;
use DrdPlus\Professions\Priest;
use DrdPlus\Professions\Ranger;
use DrdPlus\Professions\Theurgist;
use DrdPlus\Professions\Thief;
use DrdPlus\Professions\Wizard;

class ProfessionTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function I_can_register_all_professions_at_once()
    {
        ProfessionType::registerSelf();
        ProfessionType::registerSelf(); // can be called more times without punishment
        Type::hasType(ProfessionType::PROFESSION);
        ProfessionType::hasSubTypeEnum(Fighter::class);
        ProfessionType::hasSubTypeEnum(Wizard::class);
        ProfessionType::hasSubTypeEnum(Priest::class);
        ProfessionType::hasSubTypeEnum(Theurgist::class);
        ProfessionType::hasSubTypeEnum(Thief::class);
        ProfessionType::hasSubTypeEnum(Ranger::class);
    }
}
