<?php
namespace DrdPlus\Professions\EnumTypes;

class ProfessionsEnumsRegistrar
{
    public static function registerAll()
    {
        ProfessionType::registerSelf();
        ProfessionType::registerProfessionsAsSubtypes();
    }
}
