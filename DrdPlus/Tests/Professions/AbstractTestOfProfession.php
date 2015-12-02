<?php
namespace DrdPlus\Tests\Professions;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;
use DrdPlus\Professions\Profession;


abstract class AbstractTestOfProfession extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider getPropertyAndRelation
     *
     * @return Profession
     */
    public function I_can_create_profession_and_get_its_code()
    {
        $professionClass = $this->getProfessionClass();
        /** @var Profession $professionClass */
        $profession = $professionClass::getIt();
        $this->assertInstanceOf($professionClass, $profession);
        $this->assertSame($this->getProfessionCode(), $profession->getValue());
        $this->assertSame($this->getProfessionCode(), constant($this->getProfessionCodeConstant()));

        return $profession;
    }

    /**
     * @test
     * @dataProvider getPropertyAndRelation
     * @depends      I_can_create_profession_and_get_its_code
     *
     * @param string $propertyCode
     * @param string $shouldBePrimary
     */
    public function I_can_detect_primary_property($propertyCode, $shouldBePrimary)
    {
        $professionClass = $this->getProfessionClass();
        /** @var Profession $professionClass */
        $profession = $professionClass::getIt();
        $this->assertSame($shouldBePrimary, $profession->isPrimaryProperty($propertyCode));
    }

    /**
     * @test
     */
    public function I_can_get_primary_properties()
    {
        $professionClass = $this->getProfessionClass();
        /** @var Profession $professionClass */
        $profession = $professionClass::getIt();
        $this->assertEquals($this->getPrimaryProperties(), $profession->getPrimaryProperties());
    }

    /**
     * @return string
     */
    protected function getProfessionClass()
    {
        return preg_replace('~[\\\]Tests(.+)Test$~', '$1', static::class);
    }

    protected function getProfessionClassBaseName()
    {
        return preg_replace('~.*[\\\](\w+)$~', '$1', $this->getProfessionClass());
    }

    protected function getProfessionCode()
    {
        return strtolower($this->getProfessionClassBaseName());
    }

    protected function getProfessionCodeConstant()
    {
        $constantBaseName = strtoupper($this->getProfessionCode());

        return $this->getProfessionClass() . '::' . $constantBaseName;
    }

    public function getPropertyAndRelation()
    {
        return array_merge_recursive(
            [
                [Strength::STRENGTH, in_array(Strength::STRENGTH, $this->getPrimaryProperties())],
                [Agility::AGILITY, in_array(Agility::AGILITY, $this->getPrimaryProperties())],
                [Knack::KNACK, in_array(Knack::KNACK, $this->getPrimaryProperties())],
                [Will::WILL, in_array(Will::WILL, $this->getPrimaryProperties())],
                [Intelligence::INTELLIGENCE, in_array(Intelligence::INTELLIGENCE, $this->getPrimaryProperties())],
                [Charisma::CHARISMA, in_array(Charisma::CHARISMA, $this->getPrimaryProperties())],
                ['non-existing-property', false]
            ]
        );
    }

    /** @return array */
    abstract protected function getPrimaryProperties();
}
