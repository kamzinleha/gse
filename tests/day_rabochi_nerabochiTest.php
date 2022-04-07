<?php

require_once __DIR__ . '/../date_day.php';
require_once __DIR__ . '/../day_rabochi_nerabochi.php';
use Rabochi\Nerabochi\Day;

class day_rabochi_nerabochiTest extends \PHPUnit\Framework\TestCase {
	
	public function test_day_Rabochi() {
		global $date_day;
		$dr = new Day();
		$dr->date_day=$date_day;
		$this->assertSame( true,  $dr->dayRabochi('03.03.2022') );
		$this->assertSame( true,  $dr->dayRabochi('04.03.2022') );
		$this->assertSame( true,  $dr->dayRabochi('05.03.2022') );
		$this->assertSame( false, $dr->dayRabochi('06.03.2022') );
		$this->assertSame( false, $dr->dayRabochi('07.03.2022') );
		$this->assertSame( false, $dr->dayRabochi('08.03.2022') );
		$this->assertSame( true,  $dr->dayRabochi('09.03.2022') );
	}
	
	public function test_day_Next() {
		global $date_day;
		$dr = new Day();
		$dr->date_day=$date_day;
		$this->assertSame( '04.03.2022', $dr->dayNext('03.03.2022',1) );
		$this->assertSame( '05.03.2022', $dr->dayNext('03.03.2022',2) );
		$this->assertSame( '09.03.2022', $dr->dayNext('03.03.2022',3) );
		$this->assertSame( '09.03.2022', $dr->dayNext('05.03.2022',1) );
		$this->assertSame( '10.03.2022', $dr->dayNext('05.03.2022',2) );
		$this->assertSame( '11.03.2022', $dr->dayNext('05.03.2022',3) );
		$this->assertSame( '14.03.2022', $dr->dayNext('05.03.2022',4) );
		$this->assertSame( '09.03.2022', $dr->dayNext('06.03.2022',1) );
	}	
}

?>