<?php
namespace DrdPlus\Professions\EnumTypes;

use Doctrineum\Scalar\EnumType;
use DrdPlus\Professions\Fighter;
use DrdPlus\Professions\Priest;
use DrdPlus\Professions\Profession;
use DrdPlus\Professions\Ranger;
use DrdPlus\Professions\Theurgist;
use DrdPlus\Professions\Thief;
use DrdPlus\Professions\Wizard;

class ProfessionType extends EnumType
{
    const PROFESSION = Profession::PROFESSION;

    public static function registerSelf()
    {
        parent::registerSelf();
        static::registerProfessionsAsSubtypes();
    }

    protected static function registerProfessionsAsSubtypes()
    {
        foreach (static::getProfessions() as $professionClass => $professionCode) {
            if (!static::hasSubTypeEnum($professionClass)) {
                static::addSubTypeEnum($professionClass, '~^' . $professionCode . '$~');
            }
        }
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