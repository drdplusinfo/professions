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
        self::assertTrue(ProfessionType::registerSelf());
        self::assertFalse(ProfessionType::registerSelf()); // can be called more times without punishment
        self::assertTrue(Type::hasType(ProfessionType::PROFESSION));
        self::assertTrue(ProfessionType::hasSubTypeEnum(Fighter::class));
        self::assertTrue(ProfessionType::hasSubTypeEnum(Wizard::class));
        self::assertTrue(ProfessionType::hasSubTypeEnum(Priest::class));
        self::assertTrue(ProfessionType::hasSubTypeEnum(Theurgist::class));
        self::assertTrue(ProfessionType::hasSubTypeEnum(Thief::class));
        self::assertTrue(ProfessionType::hasSubTypeEnum(Ranger::class));
    }
}
