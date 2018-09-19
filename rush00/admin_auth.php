<?php
    $file_dir = "private/";
    $file_path = "private/admin";
    session_start();

if (auth_admin($_POST['login'], $_POST['passwd'])) {
    $_SESSION['loggued_admin'] = $_POST['login'];
    echo "<script>window.location = 'admin_page.php'</script>";
} else {
    $_SESSION['loggued_admin'] = '';
    echo "LOG and PASS don't match\n";
}

function auth_admin($login, $passwd) {
        if (!file_exists("./private/admin")){ 
            return false;
        }
        
        $data = unserialize(file_get_contents("./private/admin"));
        $pass_hash = hash("whirlpool", $passwd);
        foreach ($data as $key => $pr) {
            if ($pr["user"] === $login) {
                if ($pr["passwd"] === $pass_hash)
                    return true;
                else
                    return false;
            }
        }
    }
?>
