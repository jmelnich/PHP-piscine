<?php
	session_start();
	include 'header.php';

	if (isset($_POST['id'])) {
		$product['id'] = $_POST['id'];
		$product['name'] = $_POST['name'];
		$product['cost'] = $_POST['cost'];

		$_SESSION["basket"][] = $product;
		header('Location: '.$_SERVER['PHP_SELF']);
		die();
	}

	// unset($_SESSION['basket']);
	// echo $_POST;
	// $basket = $_SESSION["basket"];
	// $basket[] = $_POST["basket-id"];
	// $_SESSION["basket"] = $basket;
?>

<div style="margin-top: 190px;margin-left: 100px;">
	<a href="<?php print $_SERVER['HTTP_REFERER']; ?>">Back to buy</a>

	<?php if (empty($_SESSION['basket'])): ?>
		<div style="background: red;">Empty</div>
	<?php else: ?>
		<div style="background: green;">
			<table>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Price</th>
				</tr>
				
				<?php foreach ($_SESSION["basket"] as $item): ?>
					<tr>
						<td><?php print $item["id"]; ?></td>
						<td><?php print $item["name"]; ?></td>
						<td><?php print $item["cost"]; ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	<?php endif; ?>

 <?php 
                    session_start();
                    if ($_SESSION['loggued_on_user'] !== '') {
                       
                        echo '<li><a class="modal__login__content__button" style="padding: 10px 30px; min-width: 220px" href="#order_ready">Order</a></li>';

                    } else {
                        echo '<li><a class="modal__login__content__button" style="padding: 10px 30px; min-width: 220px" href="#logIn">Log in</a></li>';
                    }
                ?> 
</div>
	<!-- <?php if (empty($_SESSION['loggued_on_user'])): ?>
		<a href="#logIn"><button class="team__nested__card__button">Log in</button></a>
	<?php else: ?>
		<a href="#orderPopup"><button class="team__nested__card__button">Order</button></a>
	<?php endif; ?> -->


	<!-- Pop up for addToBasket -->
    <div id="order_ready">
        <div class="modal__login" >
            <a href="#" class="modal__close">X</a>
            <div class="modal__login__content" id="modal__login__content">
                <h2>Your order is succesfully added!</h2>
                <h3>Our manager will call you soon :)</h3>
               <?php
               unset($_SESSION['basket']);
               ?>
            </div>
        </div>
    </div>

        <!-- End of addToBasket -->

