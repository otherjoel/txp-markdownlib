txp-markdownlib
===============

Allows you to use MarkdownExtra in Textpattern instead of Textile.
Drop-in replacement for Textpattern’s classTextile.php using PHP Markdown Lib, SmartyPants and HTML Purifier. Works with Textpattern 4.5.7 and older.

Michel Fortin’s original PHP Markdown code included a file very like this one. Active development, however, has switched to [PHP Markdown Lib](https://michelf.ca/projects/php-markdown/), which (for some reason) no longer includes a drop-in classTextile replacement. So I updated it.

Additionally this version uses [HTML Purifier](http://htmlpurifier.org/download) to prevent inclusion of malicious code, which Michel’s original never did. This is important because Markdown syntax explicitly allows the use of plain HTML, and Michel’s library doesn’t include any measures for ensuring the safety of the HTML it passes through (nor should it, in my opinion; the problem is a huge one and better handled by a separate library). This is not a concern when processing your own blog posts, but Textpattern uses the same engine to process comments.

How to Install
----------------

Of course all of this assumes a working [Textpattern][txp] installation.

The `classTextile.php` file included here should replace the one in the `textpattern/lib` folder, and the files from the dependencies below should be placed in subfolders in the same location (except for `smartypants.php` which should go alongside this file):

 - MarkdownExtra Lib — <https://github.com/michelf/php-markdown>
 - SmartyPants Typographer — <https://michelf.ca/projects/php-smartypants/>
 - HTML Purifier *Standalone distribution* — <http://htmlpurifier.org/download>

[txp]: http://textpattern.com