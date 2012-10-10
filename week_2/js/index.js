
var targetNumber = Math.ceil(Math.random()* 10);
var guess = NaN;
var correct = false;

function getGuess()
{
	var ret = NaN;
	while(isNaN(ret))
	{
		ret = prompt("Guess a number between 1 and 10.");
		ret = Number(ret);
	}
	return ret;
}

while(!correct)
{
	guess = getGuess();

	if(targetNumber < guess)
	{
		alert("You guessed too high.");
	}
	else if(targetNumber == guess)
	{
		correct = true;
		alert("You got it right!");
	}
	else
	{
		alert("You guessed too low.");
	}
}