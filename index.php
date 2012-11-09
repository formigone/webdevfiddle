<?php

/**
 * @author Rodrigo Silveira
 * @date 11/9/2012
 */
$path = ".";
$dh = opendir($path);

function fileOrDirClass($handle) {
	$classes = array("file", "dir");
	return is_dir("./". $handle) ? $classes[1] : $classes[0];
}

function isFileOrDir($entry) {
	return (bool)(preg_match("/\w/", $entry));
}

function projectUrlMap($name) {
	$projects = array();

	return array_key_exists($name, $projects) ? $projects[$name] : $name;
}

?><html>
<head>
<style>
ul {
	overflow: auto;
	padding: 5px 10px 100px;
}

li {
	display: block;
	float: left;
	padding: 15px 20px;
	font-size: 1.5em;
	margin: 10px;
	border: 1px solid #fff;
	box-shadow: 0 3px 12px #aaa;
	-webkit-transition: all 0.25s;
	cursor: pointer;
}

li:hover {
	box-shadow:  inset 0 -2px 8px #555;
	padding: 225px 10px 5px;
}

li a {
	text-decoration: none;
	color: #333;
}

.file {
	background: #ddf;
}

.dir {
	background: #ffa;
}
</style>
</head>
<body>

<ul>
<?php while (($entry = readdir($dh)) !== false): ?>
	<?php if (isFileOrDir($entry)):?>
		<li class="<?= fileOrDirClass($entry); ?>" onclick="window.location = '<?= projectUrlMap($entry); ?>';"><?= $entry; ?></li>
	<?php endif; ?>
<?php endwhile; ?>
</ul>

</body>
</html>
