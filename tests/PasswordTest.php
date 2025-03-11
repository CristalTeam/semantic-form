<?php

use Laravolt\SemanticForm\Elements\Password;

class PasswordTest extends PHPUnit\Framework\TestCase
{
	public function testPasswordCanBeCreated(): void
	{
		$password = new Password('password');
	}
}
