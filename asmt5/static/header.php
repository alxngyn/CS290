<?php
echo '
<!DOCTYPE html>
<!--
Alex Nguyen
CS290 FALL 2015
11-15-15
Asmt 4
-->
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="asmt4.css">
		<title>
			Alex Nguyen CS290 Asmt4
		</title>
	</head>
	<body>
		<div class="wrapper">
	        <div class="header">
	            <h1>ROCK PAPER SCISSORS IN PHP</h1>
	            <h2>Instructions</h2>
	            <p>
	                Scissor beats Paper, Paper beats Rock, and Rock beats Scissor.
	                Signup to record your score to the leaderboard
	            </p>
		        <nav>
		            <ul>
		                <li>
		                    <a href="game.php">Game</a>
		                </li>
		                <li>
		                    <a href="leaderboard.php">Leaderboard</a>
		                </li>
';
session_start();
$user = $_SESSION['valid_user'];
if( isset($user) ){
	echo'
							<li>
			                    <a href="logout.php">Logout</a>
			                </li>
	';
}else {
	echo '
							<li>
			                    <a href="login.php">Login</a>
			                </li>
							<li>
			                    <a href="signup.php">Signup</a>
			                </li>
	';
}

echo'
					</ul>
		        </nav>
			</div><!-- header div closer -->
			<div class="content">
';
?>
