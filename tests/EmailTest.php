<?php

use Laravolt\SemanticForm\Elements\Email;

final class EmailTest extends PHPUnit\Framework\TestCase
{
	public function testEmailCanBeCreated(): void
	{
		$this->expectNotToPerformAssertions(); 

		new Email('email');
	}

	public function testRenderEmailInput(): void
	{
		$email = new Email('email');
		$expected = '<input type="email" name="email">';
		$result = $email->render();
		$this->assertEquals($expected, $result);
	}
}
