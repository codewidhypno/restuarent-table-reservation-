

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Reserve Table</title>
  </head>
  <body class="bg-light">
      <div class="container">
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <h2 class=" border-gray pb-2 mb-0 text-center">RESERVE TABLE</h6>
            </div>
            <div class="my-3 p-3 bg-white rounded shadow-sm d-flex justify-content-center align-items-center container ">
                <form class="form-inline" action="#" method="POST" id="chkrsvform">
                   
                    <div class="form-group">
                        <input type="datetime-local" class="fomr-control p-2 m-2" name="rsvtime" id="rsvtime" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="fomr-control p-2 m-2" name="rsvperson" id="rsvperson" min="1" placeholder="Total Person(s)" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success p-2 m-2" id="rsvchk" value="CHECK AVAILABILITY" onclick="getAvailableTables()" >
                    </div>
                   
                    
                </form>
            </div>
            
            <div class="my-3 p-3 bg-white rounded shadow-sm d-flex justify-content-center align-items-center container" id="map">
            
            <?php

                include 'Includes/connect.php';

                $sql  = "select * from tbl_seat_map where map_status = '1'";
                $exec = mysqli_query($con,$sql);
                while($map = mysqli_fetch_array($exec)){
                    echo "<img src='../Admin/SeatMap/".$map['seat_map_file']."' usemap='#tablemap' id='rsvhtlmap'>";
                }
               
            ?>   
                <map name="tablemap" id="map1">
                 
                </map> 
               
            </div>

    </div>

    <script>
        
    </script>   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script>
   $(document).ready(function(){
       $('#rsvhtlmap').hide();
   })

   function getAvailableTables(){
    $("#chkrsvform").submit(function(e){
                e.preventDefault();
            });
       var date    = $('#rsvtime').val();
       var person  = $('#rsvperson').val();

       var DataJSON ={
           date     : date,
           person   : person
       }
    //    alert(JSON.stringify(DataJSON));

    $.ajax({
        type  : "POST",
        url  : "check_tbl.php",
        data: DataJSON,
        success : function(result){
            if(result){
                $("#map1").html(result);
                $('#rsvhtlmap').show();
                document.getElementById("#chkrsvform").reset();
            }
           
            }

    })
   }
    
    </script>
  </body>
</html>