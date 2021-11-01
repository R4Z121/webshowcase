<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/navbar.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style_welcome.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style_form.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style_fonts.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/fa-css/all.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/fa-css/fontawesome.min.css">
    <link rel="icon" type="image/png" href="<?= BASEURL; ?>/assets/img/icon/iconlogo.png">
</head>
<body>
    <header>
        <nav>
            <h3><a href="<?= BASEURL; ?>">WebShowcase</a></h3>
            <div class="burger">
                <div class="empty"></div>
                <div class="empty"></div>
                <div class="empty"></div>
            </div>
            <ul>
                <li><a href="<?= BASEURL; ?>">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a class="form-login">Sign in</a></li>
            </ul>
        </nav>
    </header>
   <main>
            <?php if($this->session->flashdata('error')): ?>
                <div class="alert error">
                    <div class="close-form-mini">X</div>
                    <?php if($this->session->flashdata('error_login')): ?>
                        <i class="fas fa-exclamation-triangle"></i> Invalid username or password !
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <section class="form login">
                <h3>Sign in to your account!</h3>
                <form action="<?= BASEURL;  ?>/Actions/login" method="POST">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="input" required>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="input" required>
                    <button type="submit" name="login" class="action-form login">Login</button>
                </form>
                <hr>
                <h3>Don't have account?</h3>
                <a class="form-register" href="<?= BASEURL; ?>/register">Sign up</a>
            </section>
   </main>
   <script src="<?= BASEURL; ?>/assets/js/script-form.js"></script>
   <script src="<?= BASEURL; ?>/assets/js/script-navbar.js"></script>
</body>
</html>