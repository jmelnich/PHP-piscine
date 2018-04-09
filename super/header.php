<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>T-shirt shop</title>
        <meta name="description" content="T-shirt - find a t-shirt for your taste!">
        <meta name="keywords" content="shop, t-shirt">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="pro/css/styles.css">
        <link rel="stylesheet" href="pro/css/popups.css">
    </head>

    <body>
    <header class="header">
        <div class="content-wrapper contact-stripe">
        <a href="mailto:support@lyrathemes.com" class="contact-stripe__email">support@best_t-shirt.com </a>
        <a href="tel:+3801231231234"class="contact-stripe__phone">123-123-1234</a>
        </div>
    </header>
    <nav class="navigation">
        <div class="content-wrapper menu">
            <a href="index.php"><picture class="logo">
                <img src="pro/img/logo.png" alt="Logo">
            </picture></a>
            <ul class="menu__links">
                <li><a class="menu__links__main" href="index.php">Home</a></li>
                <li><a href="contacts.html">Contacts</a></li>
                <?php 
                    session_start();
                    if ($_SESSION['loggued_on_user'] !== '') {
                        echo '<li><a class="menu__links__main_name"> Hi, ' . $_SESSION['loggued_on_user'] . '</a></li>';
                        echo '<li><a class="menu__links__login" href="logout.php">Exit</a></li>';
                    } else {
                        echo '<li><a class="menu__links__login" href="#logIn">Log in</a></li>';
                    }
                ?> 
                <li><a class="menu__links__basket" href="basket.php">🗑</a></li>
            </ul>
            <button class="navbar-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>
        </div>
    </nav>
    <!-- Pop up for logIn -->
    <div id="logIn">
        <div class="modal__login">
            <a href="#" class="modal__close">X</a>
            <div class="modal__login__content">
                <h2>Log in</h2>
                <form method="POST" action="login.php" class="modal__login__content__form">
                    <label>Login</label>
                    <input type="text" name="login" required>
                    <label>Password</label>
                    <input type="password" name="passwd" requred>
                    <button value="submit" type="submit" name="submit" class="modal__login__content__button">Log in</button>
                </form>
                <p>Don't have account? <a href="#signUp">Sign up</a></p>

            </div>
        </div>
    </div>
    <!-- End of LogIn -->

     <!-- Pop up for signUp -->
     <div id="signUp">
     <div class="modal__signup">
            <a href="#" class="modal__close">X</a>
            <div class="modal__signup__content">
                <h2>Register</h2>
                <form class="modal__signup__content__form" method="POST" action="create.php">
                    <label>Login</label>
                    <input type="text" name="login" required>
                    <label>Password</label>
                    <input type="password" name="passwd" requred>
                    <label>Password (repeat)</label>
                    <input type="password" name="passwd_repeat" requred>
                    <button value="submit" type="submit" name="submit" class="modal__signup__content__button">Sign up</button>
                </form>

            </div>
        </div>
     </div>
         <!-- End of signUp -->


     <div class="grid">