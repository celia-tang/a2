<?php
require('scrabble.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	//validate word
	if (empty($_GET['word'])) {
		$wordErr = '*Please enter a word';
	} else {
		$word = $_GET['word'];
		if (!preg_match("/^[a-zA-Z]*$/", $word)) {
			$wordErr = '*Only alphabetical letters allowed';
		}
	}
	//if no errors
	if (!isset($wordErr)) {
		if ($_GET['bingo'] == 'true') {
			$bingo = 'true';
		} else {
			$bingo = 'false';
		}
		$bonus = $_GET['bonus'];
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Scrabble Word Score Calculator</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="style.css"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>

	<div>
	<br>
	<h1>Scrabble Word Score Calculator</h1>
	<br>
	<img src="scrabble.jpg">
	<br><br>
	<div class='content'>
	
	<form method="get"> 
		<label for='word'>Word    </label>
		<input type='text' name='word' id='word'> 
		<? if (isset($wordErr)) echo $wordErr ?>
		<br><br>

		<label for='bonus'>Bonus Points</label><br>
		<input type='radio' name='bonus' <?php if (isset($bonus) && $bonus=='none') echo "checked"; ?> value = 'none' checked> None<br>
		<input type='radio' name='bonus' <?php if (isset($bonus) && $bonus=='double') echo "checked"; ?> value = 'double'> Double Word<br>
		<input type='radio' name='bonus' <?php if (isset($bonus) && $bonus=='triple') echo "checked"; ?> value = 'triple'> Triple Word<br>
		<br>

		<label for='bingo'>Bingo</label><br>
		<input type='checkbox' name='bingo' value='true'> Yes 
		<br><br>

		<input type='submit' name='submit' value='Submit'>
		<br><br>

		<?php
		if (!isset($wordErr) && isset($word)) {
			echo '<p> Your points for "';
			echo $word;
			echo '" are ';
			echo points($word, $bonus, $bingo);
		}
		?>

	</form>
</div>


</div>

</body>
</html>
