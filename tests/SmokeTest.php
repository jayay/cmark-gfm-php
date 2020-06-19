<?php declare(strict_types=1);

class SmokeTest
   extends PHPUnit\Framework\TestCase
{
    public function testRender()
    {
        $pInstance = new \jayay\CommonMarkGithub\MarkdownParser();
        $result = $pInstance->parse_string(file_get_contents(__DIR__.'/resources/SmokeTest.input.md'));
        $this->assertStringEqualsFile(__DIR__.'/resources/SmokeTest.output.html', $result);
    }
}