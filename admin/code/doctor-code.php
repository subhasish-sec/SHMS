<?php 

session_start();
// to get the root file path
function getActualFilePath(){
    $path = __DIR__;
    $startPoint = strpos($path,"\shms");
    $endPoint = intval($startPoint) + 5;
    return substr($path,0,$endPoint);
}  
 
// TO INCLUDE THE INITIALIZATION.PHP
include(getActualFilePath()."/private/initialization.php");
 //**************************for add doctor ****************
    if(isset($_POST['reqDocAdd']) && trim($_POST['reqDocAdd']) === trim("doctorAdd")){
        $error = [];
        $docEmail = trim($_POST['docEmail']);
        // check this specialization is exits or not
        $getSql = "SELECT docEmail FROM doctors WHERE docEmail = '$docEmail'";
        $result = $conn->query($getSql);
        if($result->num_rows > 0){
            $error['exits'] = "Email Already exits";
        }else{
            // get form data through post 
            $docFirstName = trim($_POST['docFirstName']);
            $docMiddleName = trim($_POST['docMiddleName']);
            $docMiddleName = ($docMiddleName === "") ? 'N/A' : $docMiddleName;
            $docLastName = trim($_POST['docLastName']);
            $docContactNo = trim($_POST['docContactNo']);
            $docPassword = trim($_POST['docPassword']);
            $password = hash_password($docPassword);
            // insert the specialization
            $insertSql = "INSERT INTO doctors SET docEmail = '$docEmail', docFirstName = '$docFirstName', docMiddleName = '$docMiddleName',	docLastName = '$docLastName', docContactNo = '$docContactNo', docPassword = '$password'";
            if($conn->query($insertSql)){
                $error['success'] = "success";
            }else{
                $error['failed'] = 'failed';
            }
        }
        echo json_encode($error);
    }
    // ********************** end **************

    // *************************** for show all doctr*****
    if(isset($_GET['doctor']) && $_GET['doctor'] === trim
    ('all-docData')){
        $data = "";
        $getSql = "SELECT * FROM doctors LEFT JOIN doctorspecialization ON doctors.specializationId = doctorspecialization.specialization_id";
        $result = $conn->query($getSql);
        if($result->num_rows > 0){
            $data .= '<table class="datatable table table-hover table-center mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Dr. Name</th>
                    <th>Specialization</th>
                    <th>Account Status</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>';
            $count = 0;
            while($row = $result->fetch_assoc()){ 
                ++$count;
                $docMiddleName = $row["docMiddleName"] ==="N/A" ? '': $row["docMiddleName"]." ";
                $specialization = $row['specialization'] === null ? 'N/A' : $row['specialization'];
                $docProfileImgName =  isset($row['docProfile']) ? $row['docProfile'] : 'noprofil.jpg';
                $accoutStatusClr = ($row['accountStatus'] === "active") ? "success" : "danger";
                $data .= "
                <tr id='row_id-{$row["id"]}'> 
                    <td>{$count}</td>
                    <td>
                        <h2 class='table-avatar'>
                        <a
                        class='avatar avatar-sm mr-2'
                        ><img
                          class='avatar-img rounded-circle'
                          src='".uploadFile("profile/{$docProfileImgName}")."'
                          alt='User Image'
                      /></a><a href='profile.php?req=profile&p=doctor&id={$row["id"]}'>Dr.{$row["docFirstName"] } {$docMiddleName}{$row["docLastName"]}</a>
                      </h2>
                    </td>
                    <td>{$specialization}</td>
                    <td><span class='badge badge-{$accoutStatusClr}'>{$row['accountStatus']}</span></td>
                    <td class='text-right'>
                        <div class='actions'>
                            <a data-toggle='modal' href='#delete_doctor_modal'
                                class='btn btn-sm bg-danger-light docDelBtn' data-doc-did='{$row["id"]}'>
                                <i class='fe fe-trash'></i> Delete
                            </a>
                        </div>
                    </td>
                </tr>";
            }
            $data .="</tbody>
            </table>";
            echo $data;
        }else{
            echo "<h2>No Record Found.</h2>";
        }
    }

    // **************************end *****************************
// *************************** delete specialization *****************
if(isset($_POST['req']) && $_POST['req'] === trim('docDel')){
    $msg= [];
    $id = trim($_POST['did']);
    $delSql = "DELETE FROM doctors WHERE id = '$id'";
    if($conn->query($delSql)){
        $msg['success'] = true;
    }else{
        $msg['success'] = false;
    }
    echo json_encode($msg);
}

//********************** end */


?>