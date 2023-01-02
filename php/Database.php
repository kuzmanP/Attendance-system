<?php

function ConnectDB()
{
    $servername = "localhost";
    $username   = "root";
    $password   = "rootpass";
    $database   = "attendance_system";


    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection Error" . mysqli_connect_error());
    }

    $sql  = "CREATE DATABASE IF NOT EXISTS $database ";


    if (mysqli_query($conn, $sql)) {

        $conn = mysqli_connect($servername, $username, $password, $database);

        // $sql = " CREATE TABLE IF NOT EXISTS name_list
        // (
        //     ID INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        //     First_name VARCHAR(50) NOT NULL,
        //     Surname VARCHAR(50) NOT NULL,
        //     Class VARCHAR(50) NOT NULL,
        //     User_type VARCHAR(50) NOT NULL
        // )
        // ";

        // $sql = " CREATE TABLE IF NOT EXISTS check_in_time
        // (
        //     date_in DATE NOT NULL ,
        //     time_in TIME NOT NULL,
        //     User VARCHAR(50) NOT NULL,
        //     Surname VARCHAR(50) NOT NULL
        // ) 
        // ";

        // $sql = " CREATE TABLE IF NOT EXISTS check_out_time
        // (
        //     date_out DATE NOT NULL ,
        //     time_out TIME NOT NULL,
        //     User VARCHAR(50) NOT NULL,
        //     Surname VARCHAR(50) NOT NULL
        // ) 
        // ";


        if (mysqli_query($conn, $sql)) {
            //echo ("Table Created");
            return $conn;
        } else {
            echo ("Error Occured");
        }
    }
}
