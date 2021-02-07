<?php
 include "Includes/connect.php";

 session_start();

 

 $date          = $_POST['date'];
 $personcount   = $_POST['person'];

$_SESSION['rsvDate']    = $date;
$_SESSION['rsvperson']  = $personcount;


 $time = strtotime($date) + 3600; 
 $time = date('Y-m-d H:i:s', $time); 

 $t1 = '2020-08-22 09:30:00';
 $t2 = '2020-08-22 10:30:00';
 

 
 $query  = "SELECT * FROM tbl_hotspot_coods AS t LEFT OUTER JOIN tbl_reservation_master AS b ON b.table_id = t.CoodID WHERE b.table_id IS NULL OR b.reservation_date NOT BETWEEN '$date' AND '$time' ";
 $fetch  = mysqli_query($con,$query);

if($fetch){
    
    while ($row = mysqli_fetch_array($fetch)) {
        ?>
           
                  
                  <area shape="poly" id="table1" coords="<?php echo $row['x1'];?>,<?php echo $row['y1'];?>,<?php echo $row['x2'];?>,<?php echo $row['y2'];?>,<?php echo $row['x3'];?>,<?php echo $row['y3'];?>,<?php echo $row['x4'];?>,<?php echo $row['y4'];?>"  href="Table.php?key=<?php echo $row['CoodID'];?>" onclick="" style="outline: none;">
                  
               
        <?php
       

    }
}
else{

}


?>