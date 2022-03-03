<?php 
    require 'includes/head.php'; 
    require 'utils.php';

    if(!$_SESSION['name']) {
        $_SESSION['error'] = "Unauthorized page!";
        header('location:index.php');
    }

?>

<body>
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class='text-capitalize'>Welcome <span class='fw-bold text-success'><?= $_SESSION['name'] ?></span></h1>
                        <p>Now your task is to add a logout function </p> <br>

                        <p>Follow me on my youtube channel <a class="text-success" href="https://www.youtube.com/channel/UChix8iFImaHGf8nobV8JAgg">Please do subscribe here 🔥</a></p>
                        <p>Follow me on my facebook page <a class="text-success" href="https://www.facebook.com/dvocapstonedeveloper">Please follow to my page here 🔥</a></p>
                        <p>Add me on facebook <a class="text-success" href="https://www.facebook.com/im.dev.aes/">Let's connect 🔥</a></p>
                        <p>Capstone Project? No Problem! 🔥</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require 'includes/footer.php' ?>