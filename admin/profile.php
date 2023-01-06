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
// test($_SERVER);
// include sidebar
include(PUBLIC_PATH."/view/admin-sidebar.php");
// get data 
?>
<!-- header end *********************************** -->

<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="doctor.php">Doctor</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="tab-content profile-tab-cont">
                    <!-- Personal Details Tab -->
                    <div class="tab-pane fade show active" id="per_details_tab">

                        <!-- Personal Details -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Doctor Details</span>
                                            <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i
                                                    class="fa fa-edit mr-1"></i>Edit</a>
                                        </h5>
                                        <!-- doctor program star -->
                                        <?php
                                            if((trim($_GET['req']) === 'profile') && (trim($_GET['p']) === 'doctor')){
                                                if(!(intval($_GET['id']))){
                                                    redirect("doctor.php");
                                                }else{
                                                    $id = $_GET['id'];
                                                    $getSql = "SELECT * FROM doctors LEFT JOIN doctorspecialization ON doctors.specializationId = doctorspecialization.specialization_id WHERE id = '$id'";
                                                    $result = $conn->query($getSql);
                                                    if($result->num_rows > 0){
                                                       $row = $result->fetch_assoc();
                                                       $docMiddleName = $row['docMiddleName'] === 'N/A' ? '' : $row['docMiddleName']." ";
                                                       $docProfileImgName =  isset($row['docProfile']) ? $row['docProfile'] : 'noprofil.jpg';
                                                       $accoutStatusClr = ($row['accountStatus'] === "active") ? "success" : "danger";
                                        ?>
                                        <div class="profile-image text-center mb-4" style="position: relative;">

                                            <img class="rounded-circle" alt="User Image"
                                                src="<?php echo uploadFile("profile/{$docProfileImgName}");  ?>">

                                            <div class="round">
                                                <input type="file">
                                                <i class="fa fa-camera" style="color: #fff;"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <input type="hidden" name="docProfile"
                                                data-docProfile=<?php echo $row['id'];?>>
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                            <p class="col-sm-10">
                                                <?php echo "{$row['docFirstName']} {$docMiddleName}{$row['docLastName']} $docProfileImgName"; ?>
                                            </p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth
                                            </p>
                                            <p class="col-sm-10"><?php echo "{$row['dob']}"; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                            <p class="col-sm-10"><?php echo "{$row['docEmail']}"; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                            <p class="col-sm-10"><?php echo "{$row['docContactNo']}"; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Gender</p>
                                            <p class="col-sm-10"><?php echo "{$row['docGender']}"; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Specialization</p>
                                            <p class="col-sm-10"><?php echo "{$row['specialization']}"; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Account Status</p>
                                            <p class="col-sm-10"><span
                                                    class="badge badge-<?php echo $accoutStatusClr;?>"><?php echo "{$row['accountStatus']}"; ?></span>
                                            </p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Rgister At</p>
                                            <p class="col-sm-10"><?php echo "{$row['docRegisterAt']}"; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
                                            <p class="col-sm-10 mb-0"><?php echo "{$row['docAddress']}"; ?></p>
                                        </div>
                                        <?php  }
                                                    
                                                }
                                        }
                                        ?>
                                    </div>
                                </div>

                                <!-- Edit Details Modal -->
                                <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Personal Details</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="row form-row">
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text" class="form-control" value="John">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input type="text" class="form-control" value="Doe">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Date of Birth</label>
                                                                <div class="cal-icon">
                                                                    <input type="text" class="form-control"
                                                                        value="24-07-1983">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Email ID</label>
                                                                <input type="email" class="form-control"
                                                                    value="johndoe@example.com">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Mobile</label>
                                                                <input type="text" value="+1 202-555-0125"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <h5 class="form-title"><span>Address</span></h5>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                <input type="text" class="form-control"
                                                                    value="4663 Agriculture Lane">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <input type="text" class="form-control" value="Miami">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>State</label>
                                                                <input type="text" class="form-control" value="Florida">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Zip Code</label>
                                                                <input type="text" class="form-control" value="22434">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <input type="text" class="form-control"
                                                                    value="United States">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-block">Save
                                                        Changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Edit Details Modal -->

                            </div>


                        </div>
                        <!-- /Personal Details -->

                    </div>
                    <!-- /Personal Details Tab -->
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /Page Wrapper -->




<!-- footer start **********************************-->
<?php 
// include footer
include(PUBLIC_PATH."/view/admin-footer.php");
?>