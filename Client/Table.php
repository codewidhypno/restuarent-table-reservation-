<?php  
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Confirm Reservation</title>
  </head>
  <body class="bg-light">
      <div class="container">
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <h2 class=" border-gray pb-2 mb-0 text-center">CONFIRM RESERVATION</h6>
            </div>
            <div class="my-3 p-3 bg-white rounded shadow-sm d-flex justify-content-center align-items-center container ">
            <form action="post_reservation.php" method="POST">
                    <!-- <label></label>                 -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Table Number :</label>
                        </div>
                        <div class="form-group col-md-6">
                        <!-- <label for="inputPassword4"> : <?php echo $_GET['key']; ?></label> -->
                        <input type="text" readonly class="form-control-plaintext" id="table_id" name="table_id" value=' <?php echo $_GET['key']; ?>'>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Date & Time :</label>
                        </div>
                        <div class="form-group col-md-6">
                        <!-- <label for="inputPassword4"> : <?php echo $_SESSION['rsvDate']; ?></label> -->
                        <input type="text" readonly class="form-control-plaintext" id="rsvdate" name="rsvdate" value=' <?php echo $_SESSION['rsvDate']; ?>'>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Total Person(s) :</label>
                        </div>
                        <div class="form-group col-md-6">
                        <!-- <label for="inputPassword4"> : <?php echo $_SESSION['rsvperson']; ?></label> -->
                        <input type="text" readonly class="form-control-plaintext" id="rsvperson" name="rsvperson" value=' <?php echo $_SESSION['rsvperson']; ?>'>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputPassword4">Secod Name</label>
                        <input type="text" class="form-control" id="secondname" name="secondname" placeholder="Second Name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputPassword4">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <input type="submit" class="btn btn-success" name="submit" id="submit" value="Checkout" required>
                            
                        </div>
                        <div class="form-group col-md-4">
                        </div>
                        <div class="form-group col-md-4 pl-3">
                            <input type="button" class="btn btn-success" name="change_table" id="change_table" onclick="history.back()" value="Change Table">
                        </div>
                    </div>
                    
                </form>
            </div>
            
          
    </div>

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


    
  </body>
</html>