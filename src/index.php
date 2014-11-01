<?php
error_reporting(E_ALL);
ini_set('display_errors', True);

define('ROOT_PATH', str_replace("\\", "/", dirname(__FILE__)) . '/');
define('APP_PATH', ROOT_PATH . 'WebContent/PHP/');

require_once APP_PATH . "application/FringeForum.php";
$forum = new FringeForum();

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		
		<link rel="stylesheet" href="WebContent/CSS/normalize.css">
		
		<link rel="stylesheet" href="WebContent/CSS/bootstrap.css">
		<link rel="stylesheet" href="WebContent/CSS/bootstrap-responsive.css">
		
		<link rel="stylesheet" href="WebContent/CSS/main.css">
		
		<script src="WebContent/JavaScript/fringe.debug.js" type="text/javascript"></script>
		<script src="WebContent/JavaScript/markdown.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="test"></div>
		<div id="map-canvas"></div>
		<!--[if lt IE 7]>
	            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	        <![endif]-->

			<?php
			if (!isSet($_SESSION['authenticated']) || !$_SESSION['authenticated'])
				if (isSet($_GET['view']) && ($_GET['view'] == 'post' && !isSet($_GET['new']))){
					require_once APP_PATH . "application/views/PostView.php";
				} else {
					require_once APP_PATH . "application/views/Search.php";
				}
			else {
				if (!isSet($_GET['view']) || (isSet($_GET['view']) && $_GET['view'] == 'search')){ 
					require_once APP_PATH . "application/views/Search.php";
				} elseif ($_GET['view'] == 'post'){
					require_once APP_PATH . "application/views/PostView.php";
				}
			}
		?>
		
		<!-- BEGIN : Google Analytics -->
		<!--script>
	            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	            s.parentNode.insertBefore(g,s)}(document,'script'));
	        </script-->
		<!-- END : Google Analytics -->
	</body>
</html>
