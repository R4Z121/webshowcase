<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di WebShowcase</title>
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
            <section class="content">
                <h1>Show Your Website Projects to The World!</h1>
                <button class="start form-register"><a href="<?= BASEURL; ?>/register">Get Start</a></button>
            </section>
   </main>
   <script src="<?= BASEURL; ?>/assets/js/script-form.js"></script>
   <script src="<?= BASEURL; ?>/assets/js/script-navbar.js"></script>
</body>
</html>