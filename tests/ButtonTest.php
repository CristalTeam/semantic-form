<?php

use Laravolt\SemanticForm\Elements\Button;

class ButtonTest extends PHPUnit\Framework\TestCase
{
    public function testButtonCanBeCreated(): void
    {
        $submit = new Button('Click Me', 'click-me');
    }

    public function testRenderBasicButton(): void
    {
        $button = new Button('Click Me', 'click-me');
        $expected = '<button type="button" class="ui button" name="click-me">Click Me</button>';
        $result = $button->render();

        $this->assertEquals($expected, $result);
    }

    public function testCanChangeValue(): void
    {
        $button = new Button('Button');
        $button->value('Click Me');
        $expected = '<button type="button" class="ui button">Click Me</button>';
        $result = $button->render();

        $this->assertEquals($expected, $result);
    }
}
