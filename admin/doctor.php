<?php
// to get the root file path
function getActualFilePath(){
$path = __DIR__;
$startPoint = strpos($path,"\shms");
$endPoint = intval($startPoint) + 5;
return substr($path,0,$endPoint);
}

// TO INCLUDE THE INITIALIZATION.PHP
include(getActualFilePath()."/private/initialization.php");

// include header
include(PUBLIC_PATH."/view/admin-header.php");
// include sidebar
include(PUBLIC_PATH."/view/admin-sidebar.php");
?>
<!-- header end *********************************** -->
<!-- Main Wrapper -->

<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-7 col-auto">
                    <h3 class="page-title">Doctors</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Doctor</li>
                    </ul>
                </div>
                <div class="col-sm-5 col" id="docAddBtn">
                    <a href="#add_doctor_modal" data-toggle="modal"
                        class="btn btn-primary float-right mt-2 docAddBtn">Add</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive" id='docDetailsTable'>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->

<!-- specialization Add Modal -->
<?php include('modals/doctor-add.php'); ?>

<!-- /ADD Modal -->

<!-- Edit Details Modal -->
<?php include('modals/doctor-update.php'); ?>

<!-- /Edit Details Modal -->

<!-- Delete Modal -->
<?php include('modals/doctor-del.php'); ?>
<!-- /Delete Modal -->
</div>
<!-- /Main Wrapper -->

<!-- footer start **********************************-->
<?php 
// include footer
include(PUBLIC_PATH."/view/admin-footer.php");
?>