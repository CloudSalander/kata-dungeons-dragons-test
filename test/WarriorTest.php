<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once('Player.php');
require_once('Warrior.php');

class WarriorTest extends TestCase {
    
    private Warrior $warrior;

    protected function setUp(): void
    {
        $this->warrior = new Warrior("Cecil","Doombringer");
    }

    public function testCanAttack(): void {
        $expected = $this->warrior->getNickname()." attacked with ".$this->warrior->getSword().PHP_EOL;
        $this->assertEquals($this->warrior->attack(),$expected_msg);
    }

    public function testCanRunUp() {
        $this->warrior->run(MoveDirection::UP);
        $this->assertSame($this->warrior->getY(),2);
    }

    public function testCanRunRight() {
        $this->warrior->run(MoveDirection::RIGHT);
        $this->assertSame($this->warrior->getX(),2);
    }

    public function testCanRunDown() {
        $this->warrior->run(MoveDirection::DOWN);
        $this->assertSame($this->warrior->getX(),0);
    }

    public function testCanRunLeft() {
        $this->warrior->run(MoveDirection::LEFT);
        $this->assertSame($this->warrior->getX(),0);
    }

    public function testHasLeftLimit() {
        $error_msg = "Can't move on ".MoveDirection::LEFT->value." direction!".PHP_EOL;
        $this->assertSame($this->warrior->run(MoveDirection::LEFT), $error_msg);
    }

    public function testHasDownLimit() {
        $error_msg = "Can't move on ".MoveDirection::DOWN->value." direction!".PHP_EOL;
        $this->assertSame($this->warrior->run(MoveDirection::DOWN),$error_msg);
    }

    public function testHasUpLimit() {
        $error_msg = "Can't move on ".MoveDirection::UP->value." direction!".PHP_EOL;
        $this->bringToMaxUp();
        $this->assertSame($this->warrior->run(MoveDirection::UP),$error_msg);
    }

    public function testHasRightLimit() {
        $error_msg = "Can't move on ".MoveDirection::RIGHT->value." direction!".PHP_EOL;
        $this->bringToMaxRight();
        $this->assertSame($this->warrior->run(MoveDirection::RIGHT),$error_msg);
    }

    private function bringToMaxUp() {
        for($i = 0; $i < 4; ++$i){
            $this->warrior->run(MoveDirection::UP);
        }
    }

    private function bringToMaxRight() {
        for($i = 0; $i < 4; ++$i){
            $this->warrior->run(MoveDirection::RIGHT);
        }
    }

    
}


?>