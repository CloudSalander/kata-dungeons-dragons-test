<?php 
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once('Player.php');
require_once('Archer.php');

class ArcherTest extends TestCase {

    private Archer $archer;
    
    protected function setUp(): void
    {
        $this->archer = new Archer("Freya","Windfore",20);
    }

    public function testHasNickname(): void
    {
        $nickname = $this->archer->getNickname(); 
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
