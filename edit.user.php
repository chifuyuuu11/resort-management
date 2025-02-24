<?php
    require_once 'database/users.php';

    if (isset($_GET['user_id'])) {

        $user_id = $_GET['user_id'];
        $row = $user->selectUser('', $user_id);
    
    } else {
        header("Location: list.user.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Villa Madison Resort | Add User</title>
    <!-- Favicon icon -->
    <?php require 'includes/links.php'; ?>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <?php require 'includes/navbar.php'?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php require 'includes/sidebar.php'?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit User</a></li>
                        <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit User</h4>
                                <div class="basic-form">
                                    <form action="control/ctrl.edit.user.php?user_id=<?php echo $user_id?>" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-4 my-2">
                                                <label>First Name</label>
                                                <input value="<?php echo $row['firstname']; ?>" type="text" name="firstname" class="form-control input-rounded" placeholder="First Name">
                                            </div>
                                            <div class="form-group col-md-4 my-2">
                                                <label>Middle Name</label>
                                                <input value="<?php echo $row['middlename']; ?>" type="text" name="middlename" class="form-control input-rounded" placeholder="Middle Name">
                                            </div>
                                            <div class="form-group col-md-4 my-2">
                                                <label>Last Name</label>
                                                <input value="<?php echo $row['lastname']; ?>" ="text" name="lastname" class="form-control input-rounded" placeholder="Last Name">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6 my-2">
                                                <label>Username</label>
                                                <input value="<?php echo $row['username']; ?>" type="text" name="username" class="form-control input-rounded" placeholder="Username">
                                            </div>
                                            <div class="form-group col-md-6 my-2">
                                                <label>Password</label>
                                                <input type="text" name="password" class="form-control input-rounded" placeholder="Password">
                                            </div>
                                        </div>

                                        <!-- <div class="form-group my-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">Check me out</label>
                                            </div>
                                        </div> -->
                                        <button type="submit" name="submit" class="btn btn-dark my-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <?php require 'includes/footer.php'; ?>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <?php require 'includes/scripts.php'; ?>

</body>

</html>