<?php
namespace DrdPlus\Professions;

use Doctrineum\Scalar\ScalarEnum;
use Granam\Tools\ValueDescriber;

abstract class Profession extends ScalarEnum
{
    const PROFESSION = 'profession';

    public static function getItByCode($professionCode)
    {
        $baseClassName = implode(array_map('ucfirst', explode('_', $professionCode)));
        /** @var Profession $className */
        $className = __NAMESPACE__ . '\\' . $baseClassName;
        if (!class_exists($className)) {
            throw new Exceptions\ProfessionNotFoundByCode(
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
        return new static(static::getDeterminedCode());
    }

    /**
     * @return string
     */
    protected static function getDeterminedCode()
    {
        $classBaseName = preg_replace('~.+\\\(\w+)$~', '$1', static::class);
        $underscored = preg_replace('~([a-z])([A-Z])~', '$1_$2', $classBaseName);
        $constantLike = strtolower($underscored);

        return $constantLike;
    }

    /**
     * @param string $propertyCode
     * @return bool
     */
    public function isPrimaryProperty($propertyCode)
    {
        return in_array($propertyCode, $this->getPrimaryProperties());
    }

    /**
     * @return string[]
     */
    abstract public function getPrimaryProperties();
}
