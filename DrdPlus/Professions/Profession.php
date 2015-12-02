<?php
namespace DrdPlus\Professions;

use Doctrineum\Scalar\Enum;

abstract class Profession extends Enum
{
    const PROFESSION = 'profession';

    public static function getIt()
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
