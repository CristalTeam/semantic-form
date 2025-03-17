<?php

use Laravolt\SemanticForm\Elements\Datepicker;

class DatepickerTest extends PHPUnit\Framework\TestCase
{
	public function testTextCanBeCreated()
	{
		new Datepicker('birthdate');
	}

	public function testCanRenderBasicText()
	{
		$text = new Datepicker('birthdate');

		$expected = '<input type="text" readonly="readonly" name="birthdate">';
		$result = $text->render();
		$this->assertEquals($expected, $result);
	}

}
