<?php
function isExist($var){
	if (isset($var)){
	  echo $var;
	}
  }

if(isset($_POST['submit'])){

  $options = array(
  'name' 	=> FILTER_SANITIZE_STRING,
  'email' 		=> FILTER_VALIDATE_EMAIL,
  'message' 		=> FILTER_SANITIZE_STRING);

   $result = filter_input_array(INPUT_POST, $options);
   $checkResult =[];

    if(isset($_POST['subject'])) {
      foreach ($_POST['subject'] as $value) {
        $checkResult[] = filter_var( $value ,FILTER_SANITIZE_STRING);
      }
    }
    $result["subject"]= $checkResult;

    $name = trim($result['name']);
    $email = trim($result['email']);
    $message = trim($result['message']);

    if(isset($name) AND !empty($name) ){
      $verif_name = "ok";
    }else {
      $verif_name = "pok";
    }

    if(isset($email) AND !empty($email) ){
      $verif_email = "ok";
    }else {
      $verif_email = "pok";
    }

    if(isset($message) AND !empty($message) ){
      $verif_message = "ok";
    }else {
      $verif_message = "pok";
    }

    if($verif_name == "ok" AND $verif_email == "ok" AND $verif_message == "ok"){
	
	$destinataire = 'kevcharlier@gmail.com';
	$contenu = '<html><head><title>Titre du message</title></head><body>';
	$contenu .= '<p>Bonjour, vous avez reçu un message à partir de votre site web.</p>';
	$contenu .= '<p><strong>Nom</strong>: '.$name.'</p>';
	$contenu .= '<p><strong>Email</strong>: '.$email.'</p>';
	$contenu .= '<p><strong>Message</strong>: '.$message.'</p>';
	$contenu .= '</body></html>';

	$headers = 'MIME-Version: 1.0'."\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

	@mail($destinataire, $sujet, $contenu, $headers); 
	header("Location: merci.php?name=$name");
    }
 }
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>HELLO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
			crossorigin="anonymous">			
	</head>
	<body class="is-preload">

		<!-- Header -->
			<section id="header">
				<header class="major">
					<h1>Hello</h1>
					<p>I am Kévin Charlier and I am currently in web developement training at
						<a style="color:#61C2D0" id="becode" href="https://www.becode.org/" target="blank">BECODE</a>
					</p>
					<p>I AM LOOKING FOR AN INTERNSHIP AND I LIKE YOUR COMPANY, WHICH WAS RECOMMENDED BY ONE OF MY TRAINERS</p>
				</header>
				<div class="container">
					<ul class="actions special">
						<li><a href="#one" class="button primary scrolly">About me</a></li>
					</ul>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="main special">
				<div class="container">
					<span id="bkg1" class="image fit primary"><img src="images/pic01.jpg" alt="" /></span>
					<div class="content">
						<header class="major">
							<h2>Who I am</h2>
						</header>
						<p>Extremely motivated and curious, I am constantly looking for new skills and new learning. My e-business studies have
							allowed me to surpass myself and develop a real passion for technology and digital strategies. Creative and ambitious,
							I like to face challenges and I am ready to help you face yours.</p>
					</div>
					<a href="#two" class="goto-next scrolly">Next</a>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="main special">
				<div class="container">
					<span id="bkg2" class="image fit primary"><img src="images/pic02.jpg" alt="" /></span>
					<div class="content">
						<header class="major">
							<h2>My profile</h2>
						</header>
						<p>By learning more about your company, I realized that your expectations are values that I share. Hence I have a lot to
							learn from you.</p>
						<ul class="icons-grid">
							<li>
								<span class="fas fa-fire"></span>
								<h3>Motivation</h3>
							</li>
							<li>
								<span class="fas fa-heart"></span>
								<h3>Passion</h3>
							</li>
							<li>
								<span class="fas fa-users"></span>
								<h3>Team spirit</h3>
							</li>
							<li>
								<span class="fas fa-exclamation-triangle"></span>
								<h3>Ambition</h3>
							</li>
						</ul>
					</div>
					<a href="#three" class="goto-next scrolly">Next</a>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="main special">
				<div class="container">
					<span id="bkg3"  class="image fit primary"><img src="images/pic03.jpg" alt="" /></span>
					<div class="content">
						<header class="major">
							<h2>WHAT I DO</h2>
						</header>
						<p>Being a Becode learner, I am able to learn self-educated, I am trained to learn on the job. I have no problem learning
							alone, a language I don't know yet.</p>
						<ul class="icons-grid">
							<li>
								<span class="fab fa-html5"></span>
								<h3>HTML</h3>
							</li>
							<li>
								<span class="fab fa-css3-alt"></span>
								<h3>CSS</h3>
							</li>
							<li>
								<span class="fab fa-php"></span>
								<h3>PHP</h3>
							</li>
							<li>
								<span class="fab fa-js-square"></span>
								<h3>JAVASCRIPT</h3>
							</li>
						</ul>					</div>
					<a href="#footer" class="goto-next scrolly">Next</a>
				</div>
			</section>

		<!-- Footer -->
		<section id="footer">
			<div class="container">
				<header class="major">
					<h2>Get in touch</h2>
				</header>
				<p>I hope that you are interested in my profile and that you will contact me soon.</p>
				<form action="index.php" method="POST" name="formulaire" id="formulaire">
					<div class="row gtr-uniform">
						<div class="col-6 col-12-xsmall">
							<input type="text" name="name" id="name" placeholder="Name" value="<?= isExist($name); ?>">
							<?php if($verif_name === 'pok'){
							echo '<span style="color:red; font-weight:italic;">The field is empty</span>';
						}
						?>
						</div>
						<div class="col-6 col-12-xsmall">
							<input type="email" name="email" id="email" placeholder="Email" value="<?= isExist($email); ?>">
							<?php if($verif_email === 'pok'){
							echo '<span style="color:red; font-weight:italic;">The field is empty</span>';
						}
						?>
						</div>
						<div class="col-12">
							<input type="text" name="message" id="message" placeholder="Message" rows="4" value="<?= isExist($message); ?>">
							<?php if($verif_message === 'pok'){
							echo '<span style="color:red; font-weight:italic;">The field is empty</span>';
						}
						?>
						</div>
						<div class="col-12">
							<ul class="actions special">
								<li>
									<input type="submit" name="submit" form="formulaire" value="Send Message" class="primary" />
								</li>
							</ul>
						</div>
					</div>
				</form>
			</div>
			<footer>
				<ul class="icons">
					<li>
						<a href="https://www.linkedin.com/in/kevincharlier/" target="blank" class="fab fa-linkedin"></a>
					</li>
					<li>
						<a href="https://github.com/KevinCharlier" target="blank" class="fab fa-github"></a>
					</li>
					<li>
						<a href="http://kevcharlier.wixsite.com/k-charlier-eporfolio" target="blank" class="fas fa-portrait"></a>
					</li>
				</ul>
				<ul class="copyright">
					<li></li>
				</ul>
			</footer>
		</section>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.scrollex.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

	</body>

	</html>