<?php
/*
	Getting the relative URL && Setting name/title.
*/

//	Splitting SCRIPT_NAME from index.php
$script_name = explode('/', $_SERVER['SCRIPT_NAME']);
array_pop($script_name);
$script_name = join('/', $script_name);

//	Applying SCRIPT_NAME
$url = urldecode(str_replace($script_name, '', $_SERVER['REQUEST_URI']));

/*
	Reading file
*/

//	available files
$file = "insults/".rand(1, 20).".txt";

//	Pre setting insult
$insult = "";

//	Reading file
$myFile = fopen($file, "r") or $insult = "a";
$insultsRAW = fread($myFile, filesize($file));

//	Checking if its set
if($insult == "a") {
	$insult = "Couldn't load insult";

} else {
	$insults = explode("\n", $insultsRAW);
	$insult = $insults[ array_rand( $insults ) ];
}

//	Closing file
fclose($myFile);


function url($to) {
	return $_SERVER['REQUEST_URI'] . $to;
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Insults are Gay.</title>
	<meta name="description" content="<?= $insult ?>">

	<meta property="og:image" content="assets/img/tech.jpg">
	<meta property="og:title" content="Insults are Gay.">
	<meta property="og:description" content="<?= $insult ?>">
	<meta property="og:type" content="">

	<meta name="theme-color" content="#BF00FF">

	<meta name="twitter:description" content="<?= $insult ?>">
	<meta name="twitter:image" content="assets/img/tech.jpg">
	<meta name="twitter:title" content="Insults are Gay.">
	<meta name="twitter:card" content="summary">
	<link rel="icon" type="image/jpeg" sizes="400x400" href="assets/img/tech.jpg">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.5.0/cosmo/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700&amp;display=swap">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		
	<link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
	<nav class="navbar navbar-dark navbar-expand fixed-top bg-dark">
		<div class="container-fluid"><a class="navbar-brand text-monospace" href="<?= url('') ?>"><img src="assets/img/tech.jpg" style="width: 32px;height: 32px;margin-right: 8px;">Insult.tech</a></div>
	</nav>
	<section>
		<div class="jumbotron" id="jumbo" style="width: 100vw;height: 100vh;margin: 0px;">
			<div class="container text-center" style="max-width: 700px;margin: auto;">

				<h1 class="display-3 text-monospace">Insults are Gay.</h1>
				<p class="lead">Are you done with getting insulted by some fucking nerds? Use this button to fight fire with fire.</p>
				<p><button class="btn btn-primary btn-lg text-monospace text-white" id="generate" type="button">Generate</button></p>
				<textarea id="insult" readonly="readonly" class="reset px-3 py-1" style="border-width: 2px;border-style: solid;border-radius: 10px;"></textarea>
			</div>
		</div>
	</section>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/script.min.js"></script>
	<script src="assets/js/lib/bootstrap-notify.min.js"></script>
</body>

</html>