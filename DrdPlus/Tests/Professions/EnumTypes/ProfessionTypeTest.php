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
    public function I_got_registered_subtypes_even_if_profession_is_already_registered()
    {
        if (!Type::hasType(ProfessionType::getTypeName())) {
            Type::addType(ProfessionType::getTypeName(), ProfessionType::class);
        }
        self::assertTrue(Type::hasType(ProfessionType::getTypeName()));

        self::assertFalse(ProfessionType::hasSubTypeEnum(Fighter::class));
        self::assertFalse(ProfessionType::hasSubTypeEnum(Wizard::class));
        self::assertFalse(ProfessionType::hasSubTypeEnum(Priest::class));
        self::assertFalse(ProfessionType::hasSubTypeEnum(Theurgist::class));
        self::assertFalse(ProfessionType::hasSubTypeEnum(Thief::class));
        self::assertFalse(ProfessionType::hasSubTypeEnum(Ranger::class));

        self::assertTrue(ProfessionType::registerAll());
        self::assertFalse(ProfessionType::registerAll(), 'Repeated registering should not register anything new');
        self::assertTrue(ProfessionType::hasSubTypeEnum(Fighter::class));
        self::assertTrue(ProfessionType::hasSubTypeEnum(Wizard::class));
        self::assertTrue(ProfessionType::hasSubTypeEnum(Priest::class));
        self::assertTrue(ProfessionType::hasSubTypeEnum(Theurgist::class));
        self::assertTrue(ProfessionType::hasSubTypeEnum(Thief::class));
        self::assertTrue(ProfessionType::hasSubTypeEnum(Ranger::class));
    }

    /**
     * @test
     * @depends I_got_registered_subtypes_even_if_profession_is_already_registered
     */
    public function I_can_register_all_professions_at_once()
    {
        ProfessionType::registerAll();
        self::assertFalse(ProfessionType::registerAll()); // can be called more times without punishment
        self::assertTrue(Type::hasType(ProfessionType::getTypeName()));
        self::assertSame(ProfessionType::PROFESSION, ProfessionType::getTypeName());

        self::assertTrue(ProfessionType::hasSubTypeEnum(Fighter::class));
        self::assertTrue(ProfessionType::hasSubTypeEnum(Wizard::class));
        self::assertTrue(ProfessionType::hasSubTypeEnum(Priest::class));
        self::assertTrue(ProfessionType::hasSubTypeEnum(Theurgist::class));
        self::assertTrue(ProfessionType::hasSubTypeEnum(Thief::class));
        self::assertTrue(ProfessionType::hasSubTypeEnum(Ranger::class));
    }
}
