<?php

use Laravolt\SemanticForm\Elements\File;

final class FileTest extends PHPUnit\Framework\TestCase
{
	public function testFileCanBeCreated(): void
	{
		$this->expectNotToPerformAssertions(); 

		new File('article');
	}

	public function testRenderFileInput(): void
	{
		$file = new File('article');
		$expected = '<input type="file" name="article">';
		$result = $file->render();
		$this->assertEquals($expected, $result);
	}
}
