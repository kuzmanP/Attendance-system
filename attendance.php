<?php

require_once("php/processes.php");
require_once("php/Database.php");
ConnectDB();

session_start();

// header("refresh: 8");

?>



<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance CheckIn Page</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>


    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand">
            <h5>&nbsp; <img class="img-fluid" src="UMaT-logo-238x300.jpg" alt="" height="40px" width="40px">&nbsp; Peace Royal Attendance System </h5>

        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <div class="buttons">
                <a href="index.php" class="btn btn-outline-success">Register</a>&nbsp;&nbsp; <form action="" method="post"> <button type="submit" name="export" class="btn btn-outline-success">Excel Format</button></form>
            </div>
        </div>
    </nav>


    <div class="col-md-12 text-center justify-content-center">
        <h1 class="subject"></h1>
    </div>
    <div class="main1">
        <div class="col-md-6 text-center justify-content-center">
            <h1 class="py-4 bg-light text-dark">
                <i class="fa-solid fa-user"></i> &nbsp; Enter Your Details
            </h1>
            <div class="container-fluid" id="entry">
                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-gear"></i></span>
                        <input type="text" id="formControlLg" class="form-control form-control-lg" name="first_name" placeholder="First Name" />
                    </div>
                    &nbsp;



                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-gear"></i></span>
                        <input type="text" id="formControlLg" class="form-control form-control-lg" name="surname" placeholder="Surname" aria-label="Username" />
                    </div>
                    &nbsp;

                    <div class="form-check form-switch input-group mb-3">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">&nbsp; Remember Me</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" name="check_in" class="btn btn-primary" type="button">Check In</button>


                    </div>
                </form>
            </div>
            <div class="col-md-12 text-center justify-content-center">
                <br>
                <div class="output">
                    <div class="col-md-12 text-center justify-content-center">
                        <?php

                        $date = date('Format string');

                        echo date("l-j-F-Y h:i:sA", time());

                        ?>
                    </div>

                    <?php
                    if (isset($_POST['check_in'])) {
                        header("refresh: 4");
                        $_SESSION['check_in'];

                        $result = checkIn();
                    }
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>

                            <!-- <?php echo $row['ID'];
                                    unset($row['ID']) ?> -->
                            <br>
                            <?php echo $row['First_name']; ?>
                            <?php echo $row['Surname']; ?>
                            <br>
                            <?php echo $row['Class']; ?>
                            <br>
                            <?php echo $row['User_type']; ?>
                            <br>
                            <?php echo ("Checked In!") ?>

                            <?php
                            unset($_SESSION['check_out']);

                            ?>

                    <?php

                        }
                    }

                    ?>

                </div>
            </div>
        </div>

    </div>
    <div class="footer">
        <h5>&copy; Rift Systems</h5>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
</body>

</html>