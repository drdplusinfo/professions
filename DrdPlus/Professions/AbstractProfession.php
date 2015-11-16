<?php
namespace DrdPlus\Professions;

use Granam\Strict\Object\StrictObject;

abstract class AbstractProfession extends StrictObject
{
    /**
     * @param string $propertyCode
     * @return bool
     */
    abstract public function isPrimaryProperty($propertyCode);

    /**
     * @return string
     */
    abstract public function getCode();
}
