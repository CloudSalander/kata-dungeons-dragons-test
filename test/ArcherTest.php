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
        $this->assertTrue(isset($nickname));
        $this->assertTrue($nickname != "");
    }

    public function testHasBow(): void {
        $bow = $this->archer->getBow(); 
        $this->assertTrue(isset($bow));
        $this->assertTrue($bow != "");
    }

    public function testCanShoot(): void {
        $arrow_qty = $this->archer->getArrowsQty();
        $this->archer->shoot();
        $this->assertSame($arrow_qty-1,$this->archer->getArrowsQty());
    }

    public function testRunningOutArrows(): void {
        $this->shootAllArrows();
        ob_start();
        $this->archer->shoot();
        $output = ob_get_clean();
        $expectedOutput = "Can't shoot! No arrows!".PHP_EOL;
        $this->assertEquals($expectedOutput, $output);
    }
    
    private function shootAllArrows(): void {
        $arrows_qty = $this->archer->getArrowsQty();
        for($i = 0; $i < $arrows_qty; ++$i) {
            $this->archer->shoot();
        }
    }
}
