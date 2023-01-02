<?php


require_once("php/processes.php");
require_once("php/Database.php");
ConnectDB();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Page</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" </head>

<body>

    <style>
        .main {
            margin-top: 50px;
            display: grid;
            place-items: center;

        }
    </style>
    <div class="col-md-12 text-center justify-content-center">
        <h1 class="subject">Peace Royal Attendance System</h1>
    </div>
    <div class="main">
        <div class="col-md-6 text-center justify-content-center">
            <h1 class="py-4 bg-dark text-light">
                <i class="fa-solid fa-user"></i> &nbsp; Register
            </h1>
            <div class="container-fluid">
                <form method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-gear"></i></span>
                        <input type="text" class="form-control" name="first_name" placeholder="First Name" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    &nbsp;
                    &nbsp;
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-gear"></i></span>
                        <input type="text" class="form-control" name="surname" placeholder="Surname" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    &nbsp;
                    &nbsp;
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-school"></i></i></span>
                        <input type="text" class="form-control" name="class" placeholder="Class" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    &nbsp;
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                        <input type="text" class="form-control" name="role" placeholder="Student or Teacher" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    &nbsp;
                    <div class="form-check form-switch input-group mb-3">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">&nbsp; Remember Me</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" name="sign_up" class="btn btn-primary" type="button">Sign Up</button>

                    </div>
                </form>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="./js/index.js"></script>
</body>

</html>