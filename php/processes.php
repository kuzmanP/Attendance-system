<?php

require_once("Database.php");

$con = ConnectDB();

session_start();




if (isset($_POST['sign_up'])) {
    //echo ("Signup Clicked");
    Register();
}
function Register()
{
    $firstname = textboxValue("first_name");
    $surname = textboxValue("surname");
    $class = textboxValue("class");
    $role  = textboxValue("role");

    if ($firstname && $surname && $class && $role) {
        $sql = " INSERT INTO name_list(First_name,Surname,Class,User_type)
                VALUES('$firstname','$surname','$class','$role') ";

        if (mysqli_query($GLOBALS['con'], $sql)) {
            echo ("Registeration Successful");

            header("location:attendance.php");
        } else {
            echo ("Failed");
        }
    } else {
        echo ("Fill The Fields");
    }
}






function textboxValue($value)
{
    $textboxValue = mysqli_escape_string($GLOBALS['con'], trim($_POST[$value]));

    if (empty($textboxValue)) {
        return false;
    } else {
        return $textboxValue;
    }
}


//Displaying the Logged in User


if (isset($_POST['check_in'])) {
    //echo ("Check In Clicked");
    checkIn();
    sessIn();
}
function checkIn()
{
    $firstname = textboxValue2("first_name");
    // $surname = textboxValue2("surname");


    if ($firstname) {
        $sql = " SELECT * FROM name_list WHERE First_name='" . $firstname . "'";
        $result = (mysqli_query($GLOBALS['con'], $sql));

        if (mysqli_num_rows($result) > 0) {
            return ($result);
        } else {
            echo ("Name Not In the System");
        }
    } else {
        echo ("Fill The Fields");
    }
}

function textboxValue2($value)
{
    $textboxValue2 = mysqli_escape_string($GLOBALS['con'], trim($_POST[$value]));

    if (empty($textboxValue2)) {
        return false;
    } else {
        return $textboxValue2;
    }
}

function sessIn()
{
    $date = date("Y-m-d");
    $time = date("h:i:s");
    $first_name = $_POST['first_name'];
    $surname  = $_POST['surname'];
    $_SESSION['check_in'] = true;

    if ($date && $time && $first_name && $surname) {
        $sql = " INSERT INTO check_in_time(date_in,time_in,User,Surname) VALUES('$date','$time','$first_name','$surname') ";
        $result = mysqli_query($GLOBALS['con'], $sql);
        return $result;
    }
}




//checkout page

if (isset($_POST['check_out'])) {
    //echo ("Check In Clicked");
    checkOut();
    sessOut();
}
function checkOut()
{
    $firstname = textboxValue3("first_name");
    // $surname = textboxValue2("surname");

    if ($firstname) {
        $sql = " SELECT * FROM name_list WHERE First_name='" . $firstname . "'";
        $result = (mysqli_query($GLOBALS['con'], $sql));

        if (mysqli_num_rows($result) > 0) {
            return ($result);
        } else {
            echo ("Name Not In the System");
        }
    } else {
        echo ("Fill The Fields");
    }
}


function sessOut()
{
    $date = date("Y-m-d");
    $time = date("h:i:s");
    $first_name = $_POST['first_name'];
    $surname  = $_POST['surname'];
    $_SESSION['check_out'] = true;

    if ($date && $time && $first_name && $surname) {
        $sql = " INSERT INTO check_out_time(date_out,time_out,User,Surname) VALUES('$date','$time','$first_name','$surname') ";
        $result = mysqli_query($GLOBALS['con'], $sql);
        return $result;
    }
}

function textboxValue3($value)
{
    $textboxValue3 = mysqli_escape_string($GLOBALS['con'], trim($_POST[$value]));

    if (empty($textboxValue3)) {
        return false;
    } else {
        return $textboxValue3;
    }
}



//Export
if (isset($_POST['export'])) {
    Excel_convert();
}
function Excel_convert()
{
    $export = "Student-data_" . date('Y-m-d') . ".xls";
    $sql = "SELECT * FROM check_in_time";
    $result = mysqli_query($GLOBALS['con'], $sql);
    if (mysqli_num_rows($result) > 0) {
        $export .=
            '
 <tr> 
 <th>Time In</th>
 <th>First Name</th> 
 <th>Surname</th> 
 <th>price</th> 

 </tr>
 ';
        while ($row = mysqli_fetch_array($result)) {
            $export .= '
 <tr>
 <td>' . $row["ID"] . '</td> 
 <td>' . $row["time_in"] . '</td> 
 <td>' . $row["User"] . '</td> 
 <td>' . $row["Surname"] . '</td> 


 </tr>
 ';
        }
        $export .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Export.xls');
        echo $export;
    }
}
