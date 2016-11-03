<?php
namespace DrdPlus\Tests\Professions;

use DrdPlus\Codes\ProfessionCode;
use DrdPlus\Professions\Fighter;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;
use DrdPlus\Professions\Profession;
use Granam\Tests\Tools\TestWithMockery;

abstract class ProfessionTest extends TestWithMockery
{
    /**
     * @test
     */
    public function I_can_create_any_profession_fom_generic_by_code()
    {
        foreach (ProfessionCode::getProfessionCodes() as $professionCode) {
            $profession = Profession::getItByCode(ProfessionCode::getIt($professionCode));
            $namespace = str_replace('Tests\\', '', __NAMESPACE__);
            $classBaseName = ucfirst($professionCode);
            self::assertInstanceOf($namespace . '\\' . $classBaseName, $profession);
        }
    }

    /**
     * @test
     * @expectedException \DrdPlus\Professions\Exceptions\ProfessionNotFound
     */
    public function I_can_not_create_profession_by_unknown_code()
    {
        $professionCode = $this->mockery(ProfessionCode::class);
        $professionCode->shouldReceive('getValue')
            ->andReturn('muralist');
        Profession::getItByCode($professionCode);
    }

    /**
     * @test
     * @dataProvider getPropertyAndRelation
     *
     * @return Profession
     */
    public function I_can_create_profession_and_get_its_code()
    {
        $professionClass = $this->getProfessionClass();
        /** @var Profession|Fighter $professionClass */
        $profession = $professionClass::getIt();
        self::assertInstanceOf($professionClass, $profession);
        self::assertSame($this->getProfessionCode(), $profession->getValue());
        self::assertSame($this->getProfessionCode(), constant($this->getProfessionCodeConstant()));

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
        /** @var Profession|Fighter $professionClass */
        $profession = $professionClass::getIt();
        self::assertSame($shouldBePrimary, $profession->isPrimaryProperty($propertyCode));
    }

    /**
     * @test
     */
    public function I_can_get_primary_properties()
    {
        $professionClass = $this->getProfessionClass();
        /** @var Profession|Fighter $professionClass */
        $profession = $professionClass::getIt();
        self::assertEquals($this->getExpectedPrimaryProperties(), $profession->getPrimaryProperties());
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
                [Strength::STRENGTH, in_array(Strength::STRENGTH, $this->getExpectedPrimaryProperties(), true)],
                [Agility::AGILITY, in_array(Agility::AGILITY, $this->getExpectedPrimaryProperties(), true)],
                [Knack::KNACK, in_array(Knack::KNACK, $this->getExpectedPrimaryProperties(), true)],
                [Will::WILL, in_array(Will::WILL, $this->getExpectedPrimaryProperties(), true)],
                [Intelligence::INTELLIGENCE, in_array(Intelligence::INTELLIGENCE, $this->getExpectedPrimaryProperties(), true)],
                [Charisma::CHARISMA, in_array(Charisma::CHARISMA, $this->getExpectedPrimaryProperties(), true)],
                ['non-existing-property', false],
            ]
        );
    }

    /** @return array */
    abstract protected function getExpectedPrimaryProperties();

    /**
     * @test
     */
    public function I_can_get_profession_code()
    {
        $professionClass = $this->getProfessionClass();
        /** @var Profession|Fighter $professionClass */
        $profession = $professionClass::getIt();
        $professionCodeObject = $profession->getCode();
        self::assertInstanceOf(ProfessionCode::class, $professionCodeObject);
        self::assertSame($this->getProfessionCode(), $professionCodeObject->getValue());
    }
}