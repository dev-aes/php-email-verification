<?php 
    require 'includes/head.php'; 
    require 'utils.php';
?>

<body>
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-md-6">
                <div class="card p-5 rounded">
                    <div class="card-body">

                    <!--Tabs-->
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-sign_in-tab" data-bs-toggle="pill" href="#pills-sign_in" role="tab" aria-controls="pills-sign_in" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-sign_up-tab" data-bs-toggle="pill" href="#pills-sign_up" role="tab" aria-controls="pills-sign_up" aria-selected="false">Register</a>
                        </li>
                    
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-sign_in" role="tabpanel" aria-labelledby="pills-sign_in-tab">

                            <?php if($_SESSION['success'] ?? ""):?>

                                <div class="alert alert-success alert-dismissible fade show p-3" role="alert">
                                    <p><?= $_SESSION['success'] ?></p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                            <?php endif;?>

                            <?php if($_SESSION['error'] ?? ""):?>

                                <div class="alert alert-danger alert-dismissible fade show p-3" role="alert">
                                    <p><?= $_SESSION['error'] ?></p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                            <?php endif;?>

                            <form action="./utils.php" method="post">
                                <div class="form-group mb-3">
                                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="text" name="password" placeholder="***********" required>
                                </div>
                                <input class="btn btn-sm btn-dark float-end" type="submit" name="login" value="Login">
                            </form>
                        </div>

                        <div class="tab-pane fade" id="pills-sign_up" role="tabpanel" aria-labelledby="pills-sign_up-tab">
                            <form action="./utils.php" method="post">
                                <div class="form-group mb-3">
                                    <input class="form-control" type="text" name="name" placeholder="Your Name" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="email" name="email" placeholder="Your Email" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="text" name="password" placeholder="Your Password" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="text" name="password_confirmation" placeholder="Confirm Password" required>
                                </div>
                                <input class="btn btn-sm btn-dark float-end" type="submit" name="register" value="Register">
                            </form>
                        </div>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require 'includes/footer.php' ?>