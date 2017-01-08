<?php
namespace DrdPlus\Professions;

use Doctrineum\Scalar\ScalarEnum;
use DrdPlus\Codes\ProfessionCode;
use Granam\Tools\ValueDescriber;

abstract class Profession extends ScalarEnum
{
    const PROFESSION = 'profession';

    /**
     * @param ProfessionCode $professionCode
     * @return Profession
     * @throws Exceptions\ProfessionNotFound
     */
    public static function getItByCode(ProfessionCode $professionCode)
    {
        $baseClassName = implode(array_map('ucfirst', explode('_', $professionCode->getValue())));
        /** @var Profession $className */
        $className = __NAMESPACE__ . '\\' . $baseClassName;
        if (!class_exists($className)) {
            throw new Exceptions\ProfessionNotFound(
                'No profession found by code ' . ValueDescriber::describe($professionCode)
            );
        }

        return $className::getIt();
    }

    /**
     * @return static|Profession
     */
    protected static function getIt()
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static(static::getDeterminedCode());
    }

    /**
     * @return string
     */
    protected static function getDeterminedCode()
    {
        $classBaseName = preg_replace('~.+\\\(\w+)$~', '$1', static::class);
        $underscored = preg_replace('~([a-z])([A-Z])~', '$1_$2', $classBaseName);

        return strtolower($underscored);
    }

    /**
     * @param string $propertyCode
     * @return bool
     */
    public function isPrimaryProperty($propertyCode)
    {
        return in_array($propertyCode, $this->getPrimaryProperties(), true);
    }

    /**
     * @return array|string[]
     */
    abstract public function getPrimaryProperties();

    /**
     * @return ProfessionCode
     */
    public function getCode()
    {
        return ProfessionCode::getIt($this->getValue());
    }
}
