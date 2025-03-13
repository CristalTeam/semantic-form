<?php

use Laravolt\SemanticForm\Elements\Password;

final class PasswordTest extends PHPUnit\Framework\TestCase
{
	public function testPasswordCanBeCreated(): void
	{
		$this->expectNotToPerformAssertions(); 

		new Password('password');
	}
}
