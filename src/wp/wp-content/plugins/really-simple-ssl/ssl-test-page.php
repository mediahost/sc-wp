<html>
<head>
 <meta charset="UTF-8">
 <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
</head>
<body>
<h1>SSL test page</h1>
<p>This page is used purely to test for ssl availability.</p>
<?php
	$ssl = FALSE;
	if (isset($_SERVER['HTTPS']) ) {
		if ( strtolower($_SERVER['HTTPS']) == 'on') {

			echo "#SERVER-HTTPS-ON#"." (".htmlentities($_SERVER['HTTPS'], ENT_QUOTES, 'UTF-8').")<br>";
			$ssl = TRUE;
		}
		if ( '1' == $_SERVER['HTTPS'] ) {
			echo "#SERVER-HTTPS-1#<br>";
			$ssl = TRUE;
		}
	}
	if (isset($_SERVER['SERVER_PORT']) && ( '443' == $_SERVER['SERVER_PORT'] )) {
			echo "#SERVERPORT443#<br>";
			$ssl = TRUE;
	}
	if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')){
		echo "#LOADBALANCER#<br>";
		$ssl = TRUE;
	}
	if (!empty($_SERVER['HTTP_X_FORWARDED_SSL']) && ($_SERVER['HTTP_X_FORWARDED_SSL'] == 'on')){
		echo "#CDN#<br>";
		$ssl = TRUE;
	}

	if ($ssl) {
		echo "<br>#SUCCESFULLY DETECTED SSL#";
	} else {
		echo "<br>#NO KNOWN SSL CONFIGURATION DETECTED#";
	}
?>
<br><br><br>
<?php
  echo "HTTP_HOST: ".htmlentities($_SERVER["HTTP_HOST"], ENT_QUOTES, 'UTF-8');
  echo "<br>";
  echo "REQUEST_URI: ".htmlentities($_SERVER["REQUEST_URI"], ENT_QUOTES, 'UTF-8');
?>
</body>
</html>
