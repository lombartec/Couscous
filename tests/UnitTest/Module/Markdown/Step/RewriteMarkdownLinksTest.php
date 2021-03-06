<?php

namespace Couscous\Tests\UnitTest\Module\Markdown\Step;

use Couscous\Module\Markdown\Model\MarkdownFile;
use Couscous\Model\Project;
use Couscous\Module\Markdown\Step\RewriteMarkdownLinks;

/**
 * @covers \Couscous\Module\Markdown\Step\RewriteMarkdownLinks
 */
class RewriteMarkdownLinksTest extends \PHPUnit_Framework_TestCase
{
    public function testReplaceLinks()
    {
        $markdown = <<<MARKDOWN
This is a [link](doc/some-other.file.md), can you handle it (even with these parentheses)?

Here is a FILE.md.

[LICENSE.md](LICENSE.md)
[Documentation](doc/README.md)
[How to contribute](CONTRIBUTING.md)
[Anchor link](doc/FILENAME.md#something-else)
[My file](doc/MyFile.md)
[Some other messy file](this-is/SOME-OTHER_messy.FILE.md)

Please leave [this](doc/test.html) and [this link](test.md.txt) alone.
MARKDOWN;

        $expected = <<<MARKDOWN
This is a [link](doc/some-other.file.html), can you handle it (even with these parentheses)?

Here is a FILE.md.

[LICENSE.md](license.html)
[Documentation](doc/index.html)
[How to contribute](contributing.html)
[Anchor link](doc/filename.html#something-else)
[My file](doc/myfile.html)
[Some other messy file](this-is/some-other_messy.file.html)

Please leave [this](doc/test.html) and [this link](test.md.txt) alone.
MARKDOWN;

        $file    = new MarkdownFile('foo', $markdown);
        $project = new Project('foo', 'bar');
        $project->addFile($file);

        $step = new RewriteMarkdownLinks();
        $step->__invoke($project);

        $this->assertEquals($expected, $file->content);
    }
}
