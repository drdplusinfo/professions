<?php
namespace DrdPlus\Professions;

use Doctrineum\Scalar\ScalarEnum;
use DrdPlus\Codes\ProfessionCode;
use DrdPlus\Codes\Properties\PropertyCode;
use Granam\Tools\ValueDescriber;

/**
 * @method string getValue
 */
abstract class Profession extends ScalarEnum
{
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
     * @param PropertyCode $propertyCode
     * @return bool
     */
    public function isPrimaryProperty(PropertyCode $propertyCode)
    {
        return in_array($propertyCode->getValue(), $this->getPrimaryProperties(), true);
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