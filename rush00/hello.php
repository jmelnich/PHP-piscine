<?php
include 'header.php';

function hello($name) {
	echo '<section class="hello-user"><p>hello, ';
	echo $name;	
	echo '</p></section>';
}

include 'footer.php';
?>
