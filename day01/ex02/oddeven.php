#!/usr/bin/php
<?php
	while (1)
	{
		echo "Enter a number: ";
		$input = trim(fgets(STDIN));
		if (feof(STDIN) == TRUE)
			exit();
		if (!is_numeric($input))
			echo "'" . $input . "'" . " is not a number!\n";
		else
		{
			$res = ($input % 2 == 0 ? "even\n" : "odd\n");
			echo "The number " . $input . " is " . $res;
		}
	}
?>