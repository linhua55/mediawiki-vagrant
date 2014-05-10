<?php
/**
 * Missing wiki redirect / 404 page
 */

header( 'HTTP/1.x 404 Not Found' );
header( 'Content-Type: text/html; charset=utf-8' );
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>No wiki found</title>
	<style type="text/css">/* <![CDATA[ */
	* {
		font-family: 'Gill Sans', 'Gill Sans MT', sans-serif;
		margin: 0;
		padding: 0;
	}

	body {
		background: #fff repeat-x;
		color: #333;
		margin: 0;
		padding: 0;
	}

	#page {
		background: url('/mediawiki-vagrant.png') center left no-repeat;
		height: 300px;
		left: 50%;
		margin: -150px 0 0 -360px;
		overflow: visible;
		position: absolute;
		top: 50%;
		width: 720px;
	}

	#message {
		margin-left: 175px;
		padding-left: 15px;
	}

	h1, h2, p {
		margin-bottom: 1em;
	}

	a:link, a:visited {
		color: #005b90;
	}

	a:hover, a:active {
		color: #900;
	}

	ul {
		padding: 0 0 0 40px;
	}

	.footer {
		font-size: smaller;
		text-align: right;
	}
	/* ]]> */</style>
</head>
<body>
	<div id="page">
		<div id="message">
			<h1>No wiki found</h1>
			<p>Sorry, we were not able to work out what wiki you were trying to view.
			Please specify a valid Host header.</p>
			<h2>Available wikis:</h2>
			<ul>
			<?php
$port = $_SERVER['SERVER_PORT'];
$path = $_SERVER['REQUEST_URI'];
$url = htmlspecialchars( "//127.0.0.1:{$port}{$path}", ENT_QUOTES );
echo "<li><a href=\"{$url}\">devwiki</a></li>";
foreach ( $GLOBALS['wgLocalDatabases'] as $db ) {
	if ( $db == 'devwiki' ) {
		continue;
	}
	$wiki = substr( $db, 0, -4 );
	$url = htmlspecialchars(
		"//{$wiki}.wiki.local.wmftest.net:{$port}{$path}",
		ENT_QUOTES
	);
	echo "<li><a href=\"{$url}\">{$db}</a></li>";
}
?>
			</ul>
			<p class="footer"><a href="https://www.mediawiki.org/wiki/MediaWiki-Vagrant" title="MediaWiki-Vagrant">MediaWiki-Vagrant</a></p>

		</div>
	</div>
</body>
</html>
