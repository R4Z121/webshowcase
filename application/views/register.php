<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/navbar.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style_welcome.css">
    <link rel="stylesheet" href="<?=BASEURL; ?>/assets/css/style_form.css">
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
                <li><a class="form-login" href="<?= BASEURL; ?>/login">Sign in</a></li>
            </ul>
        </nav>
    </header>
   <main>
            <?php if($this->session->flashdata('error')): ?>
                <div class="alert error">
                    <div class="close-form-mini">X</div>
                    <?php if($this->session->flashdata('usercheck_error')): ?>
                        <i class="fas fa-exclamation-triangle"></i> Username has already taken !
                    <?php elseif($this->session->flashdata('confirm_password_error')): ?>
                        <i class="fas fa-exclamation-triangle"></i> Failed to confirm password !
                    <?php endif; ?>
                </div>
            <?php elseif($this->session->flashdata('success_register')): ?>
                <div class="alert success">
                    <div class="close-form-mini">X</div>
                    <i class="fas fa-check-circle"></i> New user registered !
                </div>
            <?php endif; ?>
            <section class="form register">
                <h3>Sign up now!</h3>
                <form action="<?= BASEURL; ?>/Actions/register" method="POST">
                    <label for="username">Username</label>
                    <input type="text" id="username" class="input" name="username" required>
                    <label for="password">Password</label>
                    <input type="password" id="password" class="input" name="password" required>
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" class="input" name="confirm-password" required>
                    <button type="submit" name="register" class="action-form register">Sign up</button>
                </form>
                <hr>
                <h3>Already have an account?</h3>
                <a class="form-login" href="<?= BASEURL; ?>/login">Sign in</a>
            </section>
   </main>
   <script src="<?= BASEURL; ?>/assets/js/script-form.js"></script>
   <script src="<?= BASEURL; ?>/assets/js/script-navbar.js"></script>
</body>
</html>