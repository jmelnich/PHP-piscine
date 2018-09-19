
<section class="hello-user">
	<h1>
		Hello, admin!
	</h1>
	<h2> Add product </h2>
	<form action="add_item.php" method="post">
		Name of product: <input type="text" name="product-name">
		<br />
		Product image: <input type="text" name="product-image" />
		<br />
		Cost: <input type="text" name="product-cost" />
		<br />
		Male: <input type="radio" name="gender" value="male" checked>
		Female: <input type="radio" name="gender" value="female">
		<br />
		Description of product: <input type="text" name="product-desc" />
		<br />
		<input type="submit" name="submit" value="OK"/>
	</form>

	<h2>Dell product</h2>
	<form action="del_item.php" method="post">
		Id: <input type="text" name="item_del">
		<input type="submit" name="submit" value="OK"/>
	</form>
	
	<h2>Dell user</h2>
	<form action="del_user.php" method="post">
		Id: <input type="text" name="user_del">
		<input type="submit" name="submit" value="OK"/>
	</form>
</section>
