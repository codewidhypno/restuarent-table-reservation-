<?php

require 'Includes/connect.php';
include "Includes/Exception.php";
include "Includes/PHPMailer.php";
include "Includes/SMTP.php";

//Name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$rsv_id   = $_GET['rsv_id'];


//UPDATING RESERVATION TABLE
$query   = "UPDATE tbl_reservation_master SET booking_status = 'cancelled' WHERE reservationID = $rsv_id ";
$execQuery = mysqli_query($con,$query);
if($execQuery){

    $sql  = "select * from tbl_reservation_master where reservationID = $rsv_id " ;
    $exec = mysqli_query($con,$sql);
    $mail    = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = "true";
    $mail->Port = "587";
    $mail->Username  = "bibinbbm26@gmail.com";
    $mail->Password  = "Num#Py75";
    $mail->Subject   = "Reservation Request Cancelled";
    $mail->setFrom("bibinbbm26@gmail.com");
    $mail->Body = "Hello , your reservation request has been cancelled due to some problems.";
    while($row = mysqli_fetch_array($exec)){
        $mail->AddAddress($row['customer_email']);
    }
    if($mail->send()){
        echo "<script>alert('Cancelled')</script>";
        echo "<script>location.href='index.php'</script>";
    }
    else{
        echo "<script>alert('Oops.Something Went Wrong')</script>";
        echo "<script>location.href='index.php'</script>";
        $mail->smtpClose();
    }

}




?>