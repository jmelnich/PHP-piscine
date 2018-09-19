<main class="main">
    <div class="content-wrapper main__intro">
        <h1 class="main__intro__title ">T-shirt</h1>
        <div class="main__intro__about ">Lorem ipsum dolor sit amet</div>
    </div>
</main>


 <section class="team">
            <div class="content-wrapper team__content">
                <h2 class="team__content__title">Our products</h2>
                <div class="team__content__text"><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos voluptatum molestias nisi molestiae esse eum sit vero voluptatem saepe, sapiente, aliquam repudiandae illo ratione quia labore unde doloremque. Eos, ducimus.</div>
                <div>Quibusdam mollitia magnam et, inventore nihil veritatis dolorem nesciunt ducimus, possimus beatae quae eius ullam hic necessitatibus nobis fugit maiores porro reprehenderit sed ab tempora est facere. Ipsam, natus, odio.</div></div>
            </div>
            <div id="div_item" class="content-wrapper team__nested">
						<?php
						$file_dir = "./products";
						$file_path = "./products/data";
							$array = NULL;

						if (file_exists($file_path)) {
							$file_str = file_get_contents($file_path);
							$array = unserialize($file_str);
							foreach ($array as $key => $value) {
								?>

		                		<div class="team__nested__card" id="<?php echo $value["id"];?>">
		                    		<h3 class="team__nested__card__name"><?php echo $value["name"];?></h3>
		                    		<img class="img-rounded" src=<?php echo $value['img'];?> alt="product">
		                    		<p class="team__nested__card__desc"><?php echo $value["desc"];?></p>
		                    		<p class="team__nested__card__desc">Gender: <?php echo $value["gender"];?></p>
		                    		<p class="team__nested__card__desc">Price: $<?php echo $value["cost"];?></p>

									<form action="basket.php" method="post">
										<input type="hidden" name="id" value="<?php echo $value["id"];?>">
										<input type="hidden" name="name" value="<?php echo $value["name"];?>">
										<input type="hidden" name="cost" value="<?php echo $value["cost"];?>">
										<button type="submit" value="Add to cart" class="team__nested__card__button">Add to cart</button>
									</form>

				                	    <!-- <a -->
				                	    <?php
				                	    // session_start();
				                	    // if ($_SESSION['loggued_on_user'] !== '') {
				                	    // 	echo 'href="#addToBasket"><button class="team__nested__card__button">Add to cart</button></a>';
				                	    // }
				                	    // else {
				                	    // 	echo 'href="#logIn"><button class="team__nested__card__button">Order</button></a>';
				                	    // }
				                	    ?>
				                </div>
						<?php
							}
						}
						?>
                
            </div>
        </section>


<!-- Pop up for addToBasket -->
    <div id="addToBasket">
        <div class="modal__login" style="width: 750px">
            <a href="#" class="modal__close">X</a>
            <div class="modal__login__content" id="modal__login__content">
                <h2>Add to basket</h2>
                <form>
					<table>

					  <tr>
					    <th>Name</th>
					    <th>Quantity</th>
					    <th>Price</th>
					    <th>Sum</th>
					  </tr>
					  <tr>
					    <td id="name" class="name"></td>
						<td>
							<form>
								<input style="width: 30%; height: 50%; margin: auto 0;" type="number" name="quantity" min="1" max="1000" value="1" id="quantity" onchange="getSum()" onkeypress="getSum()" onkeydown="getSum()">
							</form>
						</td>
					    <td id="price"></td>
					    <td id="sum"></td>
					  </tr>
					</table>
	                <input type="password" name="passwd" requred>
	               
	                <button value="submit" type="submit" name="submit" class="modal__login__content__button" method="POST" action="basket.php">Add to cart</button>
                </form>

            </div>
        </div>
    </div>

        <!-- End of addToBasket -->

	<script type="text/javascript">
			var item = document.getElementById("div_item");
			item.addEventListener("click", addToBasket);
			function addToBasket(e){
				var target = e.target;
				var pressed = target.parentElement.parentElement;
				var pressedId = pressed.id;
				var addToBasket = document.getElementById("addToBasket");
				var file = "./products/data";
				readTextFile(file);
				function readTextFile(file)
				{
				    var rawFile = new XMLHttpRequest();
				    //console.log("rawFile: " + rawFile);
				    rawFile.open("GET", file, false);
				    rawFile.onreadystatechange = function ()
				    {
				        if(rawFile.readyState === 4)
				        {
				            if(rawFile.status === 200 || rawFile.status == 0)
				            {
				                var allText = rawFile.responseText;
				       			 var arr = unserialize(allText);
				       			 //console.log(arr);
				       			 arr.map(el => {
				       			 	if(el.id == pressedId){
										var name = document.getElementById("name");
										var price = document.getElementById("price");
										var sum = document.getElementById("sum");
				       			 		name.innerHTML = el.name;
				       			 		price.innerHTML = el.cost;
				       			 		sum.innerHTML = el.cost;
				       			 	};
				       			 })
				            }
				        }
				    }
				    rawFile.send(null);
				}
			}

			// document.getElementById("price").addEventListener('DOMSubtreeModified', function () {
			//   // console.log('DOM Changed at ' + new Date());
			// }, false);

			function getSum() {
				// console.log(this);
				var quantity = document.getElementById("quantity");
				var quantity_value = document.getElementById("quantity").value;
				console.log(quantity_value);
				var price_value = document.getElementById("price").innerHTML;
				console.log(price_value);
				var sum = document.getElementById("sum");
				var sum_value = quantity_value * price_value;
				sum.innerHTML = price_value * quantity_value;

			}


function unserialize ( inp ) {	// Creates a PHP value from a stored representation
	// 
	// +   original by: Arpad Ray (mailto:arpad@php.net)

	error = 0;
	if (inp == "" || inp.length < 2) {
		errormsg = "input is too short";
		return;
	}
	var val, kret, vret, cval;
	var type = inp.charAt(0);
	var cont = inp.substring(2);
	var size = 0, divpos = 0, endcont = 0, rest = "", next = "";

	switch (type) {
	case "N": // null
		if (inp.charAt(1) != ";") {
			errormsg = "missing ; for null";
		}
		// leave val undefined
		rest = cont;
		break;
	case "b": // boolean
		if (!/[01];/.test(cont.substring(0,2))) {
			errormsg = "value not 0 or 1, or missing ; for boolean";
		}
		val = (cont.charAt(0) == "1");
		rest = cont.substring(1);
		break;
	case "s": // string
		val = "";
		divpos = cont.indexOf(":");
		if (divpos == -1) {
			errormsg = "missing : for string";
			break;
		}
		size = parseInt(cont.substring(0, divpos));
		if (size == 0) {
			if (cont.length - divpos < 4) {
				errormsg = "string is too short";
				break;
			}
			rest = cont.substring(divpos + 4);
			break;
		}
		if ((cont.length - divpos - size) < 4) {
			errormsg = "string is too short";
			break;
		}
		if (cont.substring(divpos + 2 + size, divpos + 4 + size) != "\";") {
			errormsg = "string is too long, or missing \";";
		}
		val = cont.substring(divpos + 2, divpos + 2 + size);
		rest = cont.substring(divpos + 4 + size);
		break;
	case "i": // integer
	case "d": // float
		var dotfound = 0;
		for (var i = 0; i < cont.length; i++) {
			cval = cont.charAt(i);
			if (isNaN(parseInt(cval)) && !(type == "d" && cval == "." && !dotfound++)) {
				endcont = i;
				break;
			}
		}
		if (!endcont || cont.charAt(endcont) != ";") {
			errormsg = "missing or invalid value, or missing ; for int/float";
		}
		val = cont.substring(0, endcont);
		val = (type == "i" ? parseInt(val) : parseFloat(val));
		rest = cont.substring(endcont + 1);
		break;
	case "a": // array
		if (cont.length < 4) {
			errormsg = "array is too short";
			return;
		}
		divpos = cont.indexOf(":", 1);
		if (divpos == -1) {
			errormsg = "missing : for array";
			return;
		}
		size = parseInt(cont.substring(1, divpos - 1));
		cont = cont.substring(divpos + 2);
		val = new Array();
		if (cont.length < 1) {
			errormsg = "array is too short";
			return;
		}
		for (var i = 0; i + 1 < size * 2; i += 2) {
			kret = unserialize(cont, 1);
			if (error || kret[0] == undefined || kret[1] == "") {
				errormsg = "missing or invalid key, or missing value for array";
				return;
			}
			vret = unserialize(kret[1], 1);
			if (error) {
				errormsg = "invalid value for array";
				return;
			}
			val[kret[0]] = vret[0];
			cont = vret[1];
		}
		if (cont.charAt(0) != "}") {
			errormsg = "missing ending }, or too many values for array";
			return;
		}
		rest = cont.substring(1);
		break;
	case "O": // object
		divpos = cont.indexOf(":");
		if (divpos == -1) {
			errormsg = "missing : for object";
			return;
		}
		size = parseInt(cont.substring(0, divpos));
		var objname = cont.substring(divpos + 2, divpos + 2 + size);
		if (cont.substring(divpos + 2 + size, divpos + 4 + size) != "\":") {
			errormsg = "object name is too long, or missing \":";
			return;
		}
		var objprops = unserialize("a:" + cont.substring(divpos + 4 + size), 1);
		if (error) {
			errormsg = "invalid object properties";
			return;
		}
		rest = objprops[1];
		var objout = "function " + objname + "(){";
		for (key in objprops[0]) {
			objout += "" + key + "=objprops[0]['" + key + "'];";
		}
		objout += "}val=new " + objname + "();";
		eval(objout);
		break;
	default:
		errormsg = "invalid input type";
	}
	return (arguments.length == 1 ? val : [val, rest]);
}


</script>



