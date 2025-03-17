<?php

use Laravolt\SemanticForm\Elements\Date;

class DateTest extends PHPUnit\Framework\TestCase
{
	public function testDateCanBeCreated(): void
	{
		$date = new Date('birthday');
	}

	public function testRenderDateInput(): void
	{
		$date = new Date('birthday');
		$expected = '<input type="date" name="birthday">';
		$result = $date->render();
		$this->assertEquals($expected, $result);
	}
}
