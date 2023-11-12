<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

?>
<!doctype html>
<html lang="en">

<head>

    <title>Autodoc.com | Track Your Request</title>

    <link rel="stylesheet" href="assets/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="assets/vendor/fontawesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body class="theme-indigo">
    <!-- Page Loader -->

    <?php include_once('includes/header.php'); ?>

    <div class="main_content" id="main-content">
        <?php include_once('includes/sidebar.php'); ?>

        <div class="page">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="javascript:void(0);">Track Request</a>
            </nav>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h2>Track using Booking Number: </h2>
                            </div>

                            <div class="body">
                                <form id="basic-form" method="post">
                                    <div class="form-group">
                                        <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Enter your Booking Number">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary" name="search" id="submit">Track Now!!</button>
                                </form>
                                <div class="table-responsive">
                                    <?php
                                    if (isset($_POST['search'])) {

                                        $sdata = $_POST['searchdata'];
                                    ?>
                                    <br>
                                        <?php
                                        $sql = "SELECT * from  tblbook where BookingNumber like '%$sdata%'";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $row) {               ?>
                                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <tr>
                                                        <th style="color: orange;">Booking Number</th>
                                                        <td colspan="4" style="color: orange;font-weight: bold;"><?php echo $bookingno = ($row->BookingNumber); ?></td>

                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td><?php echo $row->Email; ?></td>
                                                        <th>Name</th>
                                                        <td><?php echo $row->Name; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <th>Destination</th>
                                                        <td><?php echo $row->Destination; ?></td>
                                                        <th>Pickup Location</th>
                                                        <td><?php echo $row->PickupLoc; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <th>Pickup Time</th>
                                                        <td><?php echo $row->PickupTime; ?></td>
                                                        <th>Service Type</th>
                                                        <td><?php echo $row->ServiceType; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Assign To</th>
                                                        <?php if ($row->AssignTo == "") { ?>

                                                            <td><?php echo "Not Updated Yet"; ?></td>
                                                        <?php } else { ?> <td><?php echo htmlentities($row->AssignTo); ?>
                                                            </td>
                                                        <?php } ?>
                                                        <th>Date of Request</th>
                                                        <td><?php echo $row->DateofRequest; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <th>Order Final Status</th>
                                                        <td> <?php $status = $row->Status;

                                                                if ($row->Status == "On The Way") {
                                                                    echo "Driver is on the way";
                                                                }

                                                                if ($row->Status == "Completed") {
                                                                    echo "Your request has been completed";
                                                                }; ?></td>
                                                        <th>Driver Remark</th>
                                                        <?php if ($row->Status == "") { ?>

                                                            <td colspan="4"><?php echo "Not Updated Yet"; ?></td>
                                                        <?php } else { ?> <td><?php echo htmlentities($row->Status); ?>
                                                            </td>
                                                        <?php } ?>

                                                    </tr>

                                            <?php $cnt = $cnt + 1;
                                            }
                                        } ?>

                                                </table>
                                                <?php
                                                $ret = "select tbltracking.Remark,tbltracking.Status,tbltracking.UpdationDate from tbltracking where tbltracking.BookingNumber like '%$sdata%'";
                                                $query = $dbh->prepare($ret);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                ?>
                                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <tr align="center">
                                                        <th colspan="4" style="color: blue">Tracking History</th>
                                                    </tr>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Remark</th>
                                                        <th>Status</th>
                                                        <th>Time</th>
                                                    </tr>
                                                    <?php
                                                    foreach ($results as $row) {               ?>
                                                        <tr>
                                                            <td><?php echo $cnt; ?></td>
                                                            <td><?php echo $row->Remark; ?></td>
                                                            <td><?php echo $row->Status; ?></td>
                                                            <td><?php echo $row->UpdationDate; ?></td>
                                                        </tr>
                                                    <?php $cnt = $cnt + 1;
                                                    } ?>
                                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <!-- Jquery DataTable Plugin Js -->
    <script src="assets/bundles/datatablescripts.bundle.js"></script>
    <script src="assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="assets/vendor/jquery-datatable/buttons/buttons.flash.min.js"></script>
    <script src="assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>

    <script src="assets/js/theme.js"></script><!-- Custom Js -->
    <script src="assets/js/pages/tables/jquery-datatable.js"></script>
</body>

</html> <?php } ?>