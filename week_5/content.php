<?php
//protect against a useless call to the script
if(empty($_GET['article']))
{
	echo "No article provided.";
	exit;
}

switch($_GET['article'])
{
	case "weather":
		?>
		<h3>The Weather</h3>
		<p>It is really bad right now.</p>
		<?php
	break;
	case "chicken":
		?>
		<h3>Chicken is Tasty</h3>
		<p>Experts agree!!!</p>
		<?php
	break;
	case "dragon":
		?>
		<h3>Dragons Found!</h3>
		<p>They were made out of plastic, but still . . .</p>
		<?php
	break;
	default:
		echo "Article not found.";
	break;
}