<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Projects</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/navbar.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style_form.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style_projects.css">
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
                    <li><a href="<?= BASEURL; ?>/projects/new-project">New Project</a></li>
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
                    <?php if($this->session->flashdata('error_delete')): ?>
                        <i class="fas fa-exclamation-triangle"></i> Failed delete project !
                    <?php elseif($this->session->flashdata('error_add')): ?>
                        <i class="fas fa-exclamation-triangle"></i> Failed add new project !
                    <?php elseif($this->session->flashdata('error_save')): ?>
                        <i class="fas fa-exclamation-triangle"></i> Failed save project !
                    <?php elseif($this->session->flashdata('error_unsave')): ?>
                        <i class="fas fa-exclamation-triangle"></i> Failed unsave project !
                    <?php elseif($this->session->flashdata('error_update')): ?>
                        <i class="fas fa-exclamation-triangle"></i> Failed update website !
                    <?php elseif($this->session->flashdata('error_image')): ?>
                        <i class="fas fa-exclamation-triangle"></i> Success update website but failed upload image !
                    <?php endif; ?>
                </div>
            <?php elseif($this->session->flashdata('success')): ?>
                <div class="alert success">
                    <div class="close-form-mini">X</div>
                    <?php if($this->session->flashdata('success_add')): ?>
                        <i class="fas fa-check-circle"></i> Success add new project !
                    <?php elseif($this->session->flashdata('success_delete')): ?>
                        <i class="fas fa-check-circle"></i> Success delete project !
                    <?php elseif($this->session->flashdata('success_save')): ?>
                        <i class="fas fa-check-circle"></i> Success save project !
                    <?php elseif($this->session->flashdata('success_unsave')): ?>
                        <i class="fas fa-check-circle"></i> Success unsave project !
                    <?php elseif($this->session->flashdata('success_update')): ?>
                        <i class="fas fa-check-circle"></i> Success update website !
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <section class="form confirm logout">
                <div class="question">
                    <h3>Are you sure want to quit this account ?</h3>
                </div>
                <div class="answer">
                    <p><a href="<?= BASEURL; ?>/dashboard/out">Yes</a></p>
                    <p class="close-form">No</p>
                </div>
            </section>
            <section class="content">
                <h3 class="title">My Latest Projects</h3>
                <hr class="line">
                <?php if(count($my_websites) < 1) :?>
                    <div class="no-content">
                        <h3>No Project Available</h3>
                    </div>
                <?php else : ?>
                    <div class="project">
                        <?php foreach($my_websites as $website): ?>
                            <div class="hidden"><?= $website["webid"]; ?></div>
                            <div class="card">
                                <div class="uploader">
                                    <img src="<?= BASEURL; ?>/assets/img/user/<?= $user['picture']; ?>" alt="uploader" class="uploader">
                                    <h5><a href="<?= BASEURL; ?>/projects/<?= $user['username']; ?>"><?= $user['username']; ?></a></h5>
                                </div>
                                <img src="<?= BASEURL; ?>/assets/img/website/<?= $website['webpict']; ?>" alt="web-image">
                                <div class="card-desc">
                                    <h4><a href="<?= $website["weburl"]; ?>"><?= $website["webname"]; ?></a></h4>
                                    <?php if($website['userid'] == $selfid): ?>
                                        <div class="act">
                                            <a href="<?= BASEURL; ?>/Actions/delweb?webid=<?= $website['webid']; ?>" onclick="return confirm('Are you sure want to delete this project ?');" class="delete"><i class="fas fa-trash-alt"></i></a>
                                            <a href="<?= BASEURL; ?>/projects/<?= $website['webname']; ?>/edit" class="edit"><i class="fas fa-edit"></i></a>
                                        </div>
                                    <?php else: ?>
                                        <?php if(!in_array($website['webid'], $favprojects)): ?>
                                            <a href="<?= BASEURL; ?>/Actions/saveweb?webid=<?= $website['webid']; ?>&page=userprojects&user=<?= $user['username']; ?>" onclick="return confirm('Are you sure want to save this project ?');"><i class="far fa-bookmark"></i></a>
                                        <?php else : ?>
                                            <a href="<?= BASEURL; ?>/Actions/unsaveweb?webid=<?= $website['webid']; ?>&page=userprojects&user=<?= $user['username']; ?>" onclick="return confirm('Are you sure want to unsave this project ?');"><i class="fas fa-bookmark"></i></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>
        </main>
        <footer class="full-content">
            <h5>Copyright &copy; 2021. All Right Reserved.</h5>
        </footer>
    <script src="<?= BASEURL; ?>/assets/js/script-form.js"></script>
    <script src="<?= BASEURL; ?>/assets/js/script-navbar.js"></script>
</body>
</html>