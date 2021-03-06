<?php 
session_start();
if(isset($_SESSION['uname']))
{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>DASHBOARD</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed" onload="startTime()">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">SPEGATTI</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                   
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a> -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Logined As: Administrator</div>
                            <a class="nav-link text-white" href="index.php"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div> Dashboard</a >
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts" ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>   
                            Reservations<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="rsv_today.php">Today Reservations</a><!--<a class="nav-link" href="schedule.php">Schedule</a></nav>-->
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Restuarant
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav" id="sidenavAccordionPages">
                                    <a class="nav-link" href="add_table_map.php" >Table Map</a>
                                    <a class="nav-link " href="add_table.php">Tables</a>
                                </nav>
                            </div>
                            <a class="nav-link text-white" href="site_settings.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Site Settings</a>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer" id="dash_clock">
                       
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><h2>
                                        <?php 
                                        include "Includes/connect.php";
                                        $date   = date("Y-m-d");
                                        $result = mysqli_query($con,"select count(*) as total from tbl_reservation_master where  reservation_date = $date ");
                                        $data = mysqli_fetch_assoc($result);
                                        echo $data['total'];
                                         ?>
                                        </h2></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="rsv_today.php" style="text-decoration:none;">Todays Reservations</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><h2>
                                        <?php 
                                        include "Includes/connect.php";
                                        $date   = date("Y-m-d");
                                        $result = mysqli_query($con,"select count(*) as total from tbl_reservation_master where  booking_status = 'confirmed' ");
                                        $data = mysqli_fetch_assoc($result);
                                        echo $data['total'];
                                         ?>
                                    </h2></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="rsv_confirmed.php" style="text-decoration:none;">Confirmed Reservations</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><h2>
                                        <?php 
                                        include "Includes/connect.php";
                                        $result = mysqli_query($con,"select count(*) as total from tbl_reservation_master where  booking_status = 'pending' ");
                                        $data = mysqli_fetch_assoc($result);
                                        echo $data['total'];
                                         ?>
                                    </h2></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#" style="text-decoration:none;">Pending Reservations</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"><h2>
                                        <?php 
                                        include "Includes/connect.php";
                                        $date   = date("Y-m-d");
                                        $result = mysqli_query($con,"select count(*) as total from tbl_hotspot_coods where status = 0 ");
                                        $data = mysqli_fetch_assoc($result);
                                        echo $data['total'];
                                         ?>
                                    </h2></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="all_tables.php" style="text-decoration:none;">Total Available Tables</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Customer Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Reservation Date</th>
                                                <th>Total Person(s)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        

                                            require 'Includes/connect.php';

                                            $date   = date("Y-m-d");
                                            $query      = "SELECT * FROM tbl_reservation_master where booking_status = 'pending'  ";
                                            $execQuery  = mysqli_query($con,$query);


                                            while ($row = mysqli_fetch_assoc($execQuery)) {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['customer_firstname']; ?></td>
                                                <td><?php echo $row['customer_email']; ?></td>
                                                <td><?php echo $row['customer_mobile']; ?></td>
                                                <td><?php echo $row['reservation_date']; ?></td>
                                                <td><?php echo $row['person_count']; ?></td>
                                                <td><a href='rsv_confirm.php?rsv_id=<?php echo $row["reservationID"]; ?>' style="text-decoration:none;">Confirm</a> | <a href='rsv_cancel.php?rsv_id=<?php echo $row["reservationID"]; ?>' style="text-decoration:none;">Cancel</a> </td>
                                                
                                            </tr>
                                        </tbody>
                                            <?php };?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>

        <script>
            function startTime() {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('dash_clock').innerHTML =
                h + ":" + m + ":" + s;
                var t = setTimeout(startTime, 500);
                }
                function checkTime(i) {
                if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                return i;
            }
        </script>
        <script type="text/javascript">
    history.pushState(null, null, location.href);
    history.back();
    history.forward();
    window.onpopstate = function () { history.go(1); };
</script>
    </body>
</html>
<?php
}
else
{
header("location:login.php");
}
?>
