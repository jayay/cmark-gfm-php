<?php declare(strict_types=1);

class SmokeTest
   extends PHPUnit\Framework\TestCase
{
    /**
     */
    public function testRender()
    {
        $pInstance = new \jayay\CommonMarkGithub\MarkdownParser();
        $result = $pInstance->parse_string(file_get_contents(__DIR__.'/resources/SmokeTest.input.md'));
        $this->assertStringEqualsFile(__DIR__.'/resources/SmokeTest.output.html', $result);
    }


    public function createMarkdownString(): string
    {
        return "# Hi\n\n"
            ."I do markdown.\n\n"
            ."<a href=\"test\">link</a>\n\n"
            ."* list entry 1.\n"
            ."* two.\n\n"
            ."1. list entry 1.\n"
            ."2. two.\n\n"
            ."```rust\n"
            ."println!(\"Hello!\");\n"
            ."```";
    }
}