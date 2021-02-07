<?php

//includes
include "Includes/connect.php";
include "Includes/Exception.php";
include "Includes/PHPMailer.php";
include "Includes/SMTP.php";

//Name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;






if(isset($_POST['submit'])){

    $table_id       = $_POST['table_id'];
    $rsvdate        = $_POST['rsvdate'];
    $rsvperson      = $_POST['rsvperson'];
    $firstname      = $_POST['firstname'];
    $secondname     = $_POST['secondname'];
    $email          = $_POST['email'];
    $mobile         = $_POST['mobile'];
    $rsv_status     = "Pending";

    

    $postQuery      = "INSERT INTO tbl_reservation_master(customer_firstname, customer_secondname,customer_email, customer_mobile, reservation_date, person_count, table_id, booking_status) VALUES('$firstname', '$secondname', '$email','$mobile', '$rsvdate', '$rsvperson',' $table_id',' $rsv_status') ";
    $execQuery      = mysqli_query($con,$postQuery);

    if($execQuery){
        //setting PHPMailer instance
        $mail    = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = "true";
        $mail->Port = "587";
        $mail->Username  = "bibinbbm26@gmail.com";
        $mail->Password  = "Num#Py75";
        $mail->Subject   = "Reservation Request";
        $mail->setFrom("bibinbbm26@gmail.com");
        $mail->Body = "Hello $firstname, your reservation request has been recieved. Wait for the confirmation.";
        $mail->AddAddress($email);
        if($mail->send()){
            echo "<script>alert('Reservation Request Posted')</script>";
            echo "<script>location.href='rsv_success.php'</script>";
        }
        else{
            echo "<script>alert('Mail error')</script>";
        $mail->smtpClose();
        }
    }

    else{
        echo " something went wrong";
    }
   

}

?>