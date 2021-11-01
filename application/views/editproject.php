<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/navbar.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style_form.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style_new_project.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style_fonts.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/fa-css/all.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/fa-css/fontawesome.min.css">
    <link rel="icon" type="image/png" href="<?= BASEURL; ?>/assets/img/icon/iconlogo.png">
</head>
<body>
    <div class="back"></div>
    <header>
        <nav>
            <h3><a href="<?= BASEURL; ?>">WebShowcase</a></h3>
            <div class="burger">
                <div class="empty"></div>
                <div class="empty"></div>
                <div class="empty"></div>
            </div>
            <ul class="three-list">
                <li><a href="<?= BASEURL; ?>/projects/all-projects">All Projects</a></li>
                <li><a href="<?= BASEURL; ?>/projects/<?= $this->session->userdata('user'); ?>">My Projects</a></li>
                <li>
                    <p class="out"><i class="fas fa-sign-out-alt"></i>Sign out</p>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="form confirm logout">
            <div class="question">
                <h3>Are you sure want to quit this account ?</h3>
            </div>
            <div class="answer">
                <p><a href="<?= BASEURL; ?>/dashboard/out">Yes</a></p>
                <p class="close-form">No</p>
            </div>
        </section>
        <section class="form addform">
            <form action="<?= BASEURL; ?>/Actions/editwebsite" method="POST" enctype="multipart/form-data">
                <h3>Edit Project</h3>
                <input type="hidden" name="webid" value="<?= $website["webid"]; ?>">
                <label for="webname">Website Name</label>
                <input type="text" class="input" id="webname" name="webname" value="<?= $website["webname"]; ?>" required>
                <label for="weburl">Website URL</label>
                <input type="text" class="input" id="weburl" name="weburl" value="<?= $website["weburl"]; ?>" required>
                <label>Picture</label>
                <img src="<?= BASEURL; ?>/assets/img/website/<?= $website["webpict"]; ?>" class="webpict" id="webpict">
                <input type="file" name="webpict" class="input file" onchange="document.querySelector('.webpict').src = window.URL.createObjectURL(this.files[0])">
                <button type="submit" class="action-form addform">Edit website</button>
            </form>
        </section>
    </main>
    <footer>
        <h5>Copyright &copy; 2021. All Right Reserved.</h5>
    </footer>
    <script src="<?= BASEURL; ?>/assets/js/script-navbar.js"></script>
    <script src="<?= BASEURL; ?>/assets/js/script-form.js"></script>
</body>
</html>