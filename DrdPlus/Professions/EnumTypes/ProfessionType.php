<?php
namespace DrdPlus\Professions\EnumTypes;

use Doctrineum\Scalar\ScalarEnumType;
use DrdPlus\Professions\Fighter;
use DrdPlus\Professions\Priest;
use DrdPlus\Professions\Profession;
use DrdPlus\Professions\Ranger;
use DrdPlus\Professions\Theurgist;
use DrdPlus\Professions\Thief;
use DrdPlus\Professions\Wizard;

class ProfessionType extends ScalarEnumType
{
    const PROFESSION = Profession::PROFESSION;

    public static function registerSelf()
    {
        return parent::registerSelf() || static::registerProfessionsAsSubtypes();
    }

    protected static function registerProfessionsAsSubtypes()
    {
        $result = false;
        foreach (static::getProfessions() as $professionClass => $professionCode) {
            if (!static::hasSubTypeEnum($professionClass)) {
                $result |= static::addSubTypeEnum($professionClass, '~^' . $professionCode . '$~');
            }
        }

        return $result;
    }

    protected static function getProfessions()
    {
        return [
            Fighter::class => Fighter::FIGHTER,
            Wizard::class => Wizard::WIZARD,
            Priest::class => Priest::PRIEST,
            Theurgist::class => Theurgist::THEURGIST,
            Thief::class => Thief::THIEF,
            Ranger::class => Ranger::RANGER,
        ];
    }
}
