<?php 
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once('Player.php');
require_once('Mage.php');

class MageTest extends TestCase {

    private Mage $mage;
    private string $sample_spell;
    private string $wrong_spell;

    protected function setUp(): void
    {
        $this->mage = new Mage("Merlín");
        $this->sample_spell = "Fireball";
        $this->wrong_spell = "Sleep";
    }

    public function testAddSpell(): void
    {
        $this->mage->addSpell($this->sample_spell);
        $this->assertTrue(in_array($this->sample_spell,$this->mage->spells));
    }

    public function testUseRightSpell(): void {
        $this->mage->addSpell($this->sample_spell);
        $expected_msg = $this->mage->getNickname()." used ".$this->sample_spell."!".PHP_EOL;
        $this->assertEquals($this->mage->useSpell($this->sample_spell),$expected_msg);
    }

    public function testUseWrongSpell(): void {
        $expected_msg = $this->mage->getNickname()." doesn't know ".$this->wrong_spell."!".PHP_EOL;
        $this->assertEquals($this->mage->useSpell($this->wrong_spell),$expected_msg);
    }

}
