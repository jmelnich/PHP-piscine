#!/usr/bin/php
<?php
function	create_users() {
	$file_dir = "private/";
	$file_path = "private/admin";
	$bcherkas_passwd = hash("whirlpool", "12345asd");
	$imelnych_passwd = hash("whirlpool", "12345asd");

	mkdir($file_dir, 0700, true);
	
	$array[] = ["user" => "bcherkas", "passwd" => $bcherkas_passwd];
	$array[] = ["user" => "imelnych", "passwd" => $imelnych_passwd];
	$file_str = serialize($array);
	file_put_contents($file_path, $file_str);
}

function	make_list() {
	$list[] = ["id" => 0, "name" => 't-shirt', "img" => 'products/img/default.png', "cost" => '9.99', "gender" => 'female', "desc" => 'default description'];
	$list[] = ["id" => 1, "name" => 't-shirt', "img" => "./products/img/w_white.jpg", "cost" => '9.99', "gender" => 'female', "desc" => 'default description'];
	$list[] = ["id" => 2, "name" => 't-shirt', "img" => "./products/img/m_white.jpg", "cost" => '9.99', "gender" => 'female', "desc" => 'default description'];
	$list[] = ["id" => 3, "name" => 't-shirt', "img" => 'products/img/default.png', "cost" => '9.99', "gender" => 'female', "desc" => 'default description'];
	$list[] = ["id" => 4, "name" => 't-shirt', "img" => 'products/img/default.png', "cost" => '9.99', "gender" => 'female', "desc" => 'default description'];
	$list[] = ["id" => 5, "name" => 't-shirt', "img" => 'products/img/default.png', "cost" => '9.99', "gender" => 'female', "desc" => 'default description'];
	$list[] = ["id" => 6, "name" => 't-shirt', "img" => 'products/img/default.png', "cost" => '9.99', "gender" => 'female', "desc" => 'default description'];
	$list[] = ["id" => 7, "name" => 't-shirt', "img" => 'products/img/default.png', "cost" => '9.99', "gender" => 'female', "desc" => 'default description'];
	

	return ($list);
}

function	product(&$list_old, $list_new) {
	foreach ($list_new as $new) {
		foreach ($list_old as $old) {
			if (($res = ($old["name"] === $new["name"]))) {
				break ;
			}
		}
		if (!$res) {
			$list_old[] = $new;
		}
	}
}


function	add_products() {
	$file_dir = "./products/";
	$file_path = "./products/data";

	mkdir($file_dir, 0700, true);
	$list = make_list();
	$file_arr = $list;
	$file_str = serialize($file_arr);
	file_put_contents($file_path, $file_str);
}
create_users();
add_products();
?>
