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
                    <h3 class="page-title">Specialization</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Specialities</li>
                    </ul>
                </div>
                <div class="col-sm-5 col" id="specAddBtn">
                    <a href="#Add_Specialities_details" data-toggle="modal"
                        class="btn btn-primary float-right mt-2 specAddBtn">Add</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive" id='specDetailsTable'>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->

<!-- specialization Add Modal -->
<?php include('modals/specialization-add.php'); ?>

<!-- /ADD Modal -->

<!-- Edit Details Modal -->
<?php include('modals/specialization-update.php'); ?>

<!-- /Edit Details Modal -->

<!-- Delete Modal -->
<?php include('modals/specialization-del.php'); ?>
<!-- /Delete Modal -->
</div>
<!-- /Main Wrapper -->

<!-- footer start **********************************-->
<?php 
// include footer
include(PUBLIC_PATH."/view/admin-footer.php");
?>