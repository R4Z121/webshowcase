<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/navbar.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style_form.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style_dashboard.css">
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
            <?php if($this->session->flashdata('error')): ?>
                <div class="alert error">
                    <div class="close-form-mini">X</div>
                    <?php if($this->session->flashdata('error_update')): ?>
                        <i class="fas fa-exclamation-triangle"></i> Failed update user !
                    <?php elseif($this->session->flashdata('usercheck_error')): ?>
                        <i class="fas fa-exclamation-triangle"></i> Username has already taken !
                    <?php elseif($this->session->flashdata('error_image')): ?>
                        <i class="fas fa-exclamation-triangle"></i> Failed upload image !
                    <?php endif; ?>
                </div>
            <?php elseif($this->session->flashdata('success')): ?>
                <div class="alert success">
                    <div class="close-form-mini">X</div>
                    <?php if($this->session->flashdata('success_update')): ?>
                        <i class="fas fa-check-circle"></i> Success update user !
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <section class="form confirm logout" id="dshbrd">
            <div class="question">
                <h3>Are you sure want to quit this account ?</h3>
            </div>
            <div class="answer">
                <p><a href="<?= BASEURL; ?>/dashboard/out">Yes</a></p>
                <p class="close-form">No</p>
            </div>
        </section>
        <section class="greeting">
            <h1>Welcome,<?= $user['username']; ?></h1>
            <h4>show or find your web design inspiration here...</h4>
        </section>
        <div class="container">
            <section class="profile">
                <div class="profile-detail">
                    <h3>My Profile</h3>  
                <div class="picture">
                        <img src="<?= BASEURL; ?>/assets/img/user/<?= $user['picture']; ?>" alt="user-profil" class="userpict">
                </div>
                <div class="profile-data form">
                        <form action="<?= BASEURL; ?>/Actions/edituser" class="form-profil" method="POST" enctype="multipart/form-data">
                            <label for="fullname">Fullname</label>
                            <input type="text" class="input" id="fullname" name="fullname" value="<?= $user['fullname']; ?>" required>
                            <label for="username">Username</label>
                            <input type="text" class="input" id="username" name="username" value="<?= $user['username']; ?>" required>
                            <label for="userpict">Profil Picture</label>
                            <input type="file" class="input" name="userpict">
                            <button type="submit" class="action-form edit"><i class="fas fa-marker"></i> Edit</button>
                        </form>
                </div>
            </div>
        </section>
        <section class="activities">
                <div class="activities-list">
                    <h3>My Activities</h3>
                    <hr>
                    <ul>
                        <li><a href="<?= BASEURL; ?>/projects/new-project"><i class="fas fa-folder-plus"></i>New Project</a></li>
                        <li><a href="<?= BASEURL; ?>/projects/<?= $this->session->userdata('user'); ?>"><i class="fas fa-laptop-code"></i>My Projects</a></li>
                        <li><a href="<?= BASEURL; ?>/projects/favorites"><i class="fas fa-star"></i>Favorite</a></li>
                        <li><a href="<?= BASEURL; ?>/projects/search"><i class="fas fa-search"></i>Search Website</a></li>
                    </ul>
                </div>
        </section>
       </div>
    </main>
    <footer>
        <h5>Copyright &copy; 2021. All Right Reserved.</h5>
    </footer>
    <script src="<?= BASEURL; ?>/assets/js/script-navbar.js"></script>
    <script src="<?= BASEURL; ?>/assets/js/script-form.js"></script>
</body>
</html>