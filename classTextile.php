<?php
/*
 * Textpattern - Replace Textile with MarkdownExtra Lib + Smartypants
 * Works with Textpattern 4.5.5 and 4.5.7
 *  
 * Dependencies:
 * 
 *  - MarkdownExtra Lib (https://github.com/michelf/php-markdown)
 *  - SmartyPants Typographer (https://michelf.ca/projects/php-smartypants/)
 *  - HTML Purifier STANDALONE distribution (http://htmlpurifier.org/download)
 *
 * The original PHP Markdown code included a file very like this one.
 * Active development, however, has switched to PHP Markdown Lib, which
 * no longer includes a drop-in classTextile replacement. Additionally this
 * version uses HTML Purifier to prevent inclusion of malicious code.
 *
 * This file should replace the classTextile.php in the textpattern/lib 
 * folder, and the files from the above dependencies should be placed in
 * subfolders in the same location (except for smartypants.php which should go
 * alongside this file).
 *
 */

@include_once 'smartypants.php';
@require_once dirname(__FILE__) . '/Michelf/MarkdownExtra.inc.php';
require_once dirname(__FILE__) . '/htmlpurifier/HTMLPurifier.standalone.php';

use \Michelf\MarkdownExtra;


# Fake Textile class. It calls Markdown instead.
class Textile {
	function TextileThis($text, $lite='', $encode='') {
		if ($lite == '' && $encode == '')  $text = MarkdownExtra::defaultTransform($text);
		if (function_exists('SmartyPants')) $text = SmartyPants($text);
		return $text;
	}
	# Fake restricted version: restrictions are not supported for now.
	# UPDATE - HTML is encoded, at least -- Joel Dueck
	function TextileRestricted($text, $lite='', $noimage='') {
		$purifier = new HTMLPurifier();
		$text = $this->TextileThis($text, $lite);
		return $purifier->purify($text);
	}
	# Workaround to ensure compatibility with TextPattern 4.0.3.
	function blockLite($text) { return $text; }
}

?>