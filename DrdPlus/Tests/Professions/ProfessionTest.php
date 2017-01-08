<?php
namespace DrdPlus\Tests\Professions;

use DrdPlus\Codes\ProfessionCode;
use DrdPlus\Codes\PropertyCode;
use DrdPlus\Professions\Fighter;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;
use DrdPlus\Professions\Profession;
use DrdPlus\Tables\Professions\ProfessionPrimaryPropertiesTable;
use Granam\Tests\Tools\TestWithMockery;

abstract class ProfessionTest extends TestWithMockery
{
    /**
     * @test
     */
    public function I_can_create_every_profession_by_code()
    {
        foreach (ProfessionCode::getPossibleValues() as $professionCode) {
            $profession = Profession::getItByCode(ProfessionCode::getIt($professionCode));
            $namespace = str_replace('Tests\\', '', __NAMESPACE__);
            $classBaseName = ucfirst($professionCode);
            $professionClass = $namespace . '\\' . $classBaseName;
            self::assertTrue(class_exists($professionClass));
            self::assertInstanceOf($professionClass, $profession);
        }
    }

    /**
     * @test
     * @expectedException \DrdPlus\Professions\Exceptions\ProfessionNotFound
     */
    public function I_can_not_create_profession_by_unknown_code()
    {
        /** @var ProfessionCode|\Mockery\MockInterface $professionCode */
        $professionCode = $this->mockery(ProfessionCode::class);
        $professionCode->shouldReceive('getValue')
            ->andReturn('muralist');
        Profession::getItByCode($professionCode);
    }

    /**
     * @test
     * @dataProvider getPropertyAndRelation
     * @return Profession
     */
    public function I_can_create_profession_and_get_its_code()
    {
        $professionClass = self::getSutClass();
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
     * @param string $propertyCode
     * @param string $shouldBePrimary
     */
    public function I_can_detect_primary_property($propertyCode, $shouldBePrimary)
    {
        $professionClass = self::getSutClass();
        /** @var Profession|Fighter $professionClass */
        $profession = $professionClass::getIt();
        self::assertSame($shouldBePrimary, $profession->isPrimaryProperty($propertyCode), $profession->getValue());
    }

    /**
     * @test
     */
    public function I_can_get_primary_properties()
    {
        $professionClass = self::getSutClass();
        /** @var Profession|Fighter $professionClass */
        $profession = $professionClass::getIt();
        self::assertEquals($this->getExpectedPrimaryProperties(), $profession->getPrimaryProperties(), $profession->getValue());
    }

    protected function getProfessionClassBaseName()
    {
        return preg_replace('~.*[\\\](\w+)$~', '$1', self::getSutClass());
    }

    protected function getProfessionCode()
    {
        return strtolower($this->getProfessionClassBaseName());
    }

    protected function getProfessionCodeConstant()
    {
        $constantBaseName = strtoupper($this->getProfessionCode());

        return self::getSutClass() . '::' . $constantBaseName;
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
    private function getExpectedPrimaryProperties()
    {
        $professionPrimaryPropertiesTable = new ProfessionPrimaryPropertiesTable();

        return array_map(
            function (PropertyCode $propertyCode) {
                return $propertyCode->getValue();
            },
            $professionPrimaryPropertiesTable->getPrimaryPropertiesOf(ProfessionCode::getIt($this->getProfessionCode()))
        );
    }

    /**
     * @test
     */
    public function I_can_get_profession_code()
    {
        $professionClass = self::getSutClass();
        /** @var Profession|Fighter $professionClass */
        $profession = $professionClass::getIt();
        $professionCodeObject = $profession->getCode();
        self::assertInstanceOf(ProfessionCode::class, $professionCodeObject);
        self::assertSame($this->getProfessionCode(), $professionCodeObject->getValue());
    }
}