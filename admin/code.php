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
// ***********************************************************************
// **************************for specialization ****************
    if(isset($_POST['specialization']) && trim($_POST['specialization']) === trim("doctor")){
        $error = [];
        $specialization_in = trim($_POST['specialization_in']);
        // check this specialization is exits or not
        $getSql = "SELECT specialization FROM doctorspecialization WHERE specialization = '$specialization_in'";
        $result = $conn->query($getSql);
        if($result->num_rows > 0){
            $error['exits'] = "Already exits";
        }else{
            // insert the specialization
            $insertSql = "INSERT INTO doctorspecialization SET specialization = '$specialization_in'";
            if($conn->query($insertSql)){
                $error['success'] = "success";
            }else{
                $error['failed'] = 'failed';
            }
        }
        echo json_encode($error);
    }
    // ********************** end **************

    // *************************** for show all specialization*****
    if(isset($_GET['specialization']) && $_GET['specialization'] === trim
    ('all-docData')){
        $data = "";
        $getSql = "SELECT * FROM doctorspecialization";
        $result = $conn->query($getSql);
        if($result->num_rows > 0){
            $data .= '<table class="datatable table table-hover table-center mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Specialization</th>
                    <th>Stauts</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>';
            $count = 0;
            while($row = $result->fetch_assoc()){
                ++$count;
                $checked = $row['status'] === 'deactive' ? null : 'checked';
                $data .= "
                <tr id='row_id-{$row["specialization_id"]}'> 
                    <td>{$count}</td>
                    <td>
                        <h2 class='table-avatar'><a href='profile.html'>{$row["specialization"] }</a></h2>
                    </td>
                    <td>
                        <div class='status-toggle classid_{$row["specialization_id"]}'>
                            <input type='checkbox' id='status_{$row["specialization_id"]}' class='check' {$checked}>
                            <label for='status_{$row["specialization_id"]}' class='checktoggle' data-spec-sts-id='{$row["specialization_id"]}'>checkbox</label>
                        </div>
                    </td>
                    <td class='text-right'>
                        <div class='actions'>
                            <a class='btn btn-sm bg-success-light editSpecBtn' data-toggle='modal' href='#edit_specialities_details' data-spec-eid='{$row["specialization_id"] }'><i class='fe fe-pencil'></i> Edit
                            </a>
                            <a data-toggle='modal' href='#delete_specialization_modal'
                                class='btn btn-sm bg-danger-light delSpecBtn' data-spec-did='{$row["specialization_id"]}'>
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

    //********************* */ for specialization status

    if(isset($_POST['specId']) && isset($_POST['sentReq'])){
        $msg = [];
        $specialization_id = trim($_POST['specId']);
        
        $getCurrentStatusSql = "SELECT status FROM doctorspecialization WHERE specialization_id = '$specialization_id'";
        $result = $conn->query($getCurrentStatusSql);
        $row = $result->fetch_assoc();
        
        $toggleStatus = (trim($row['status']) === 'deactive') ? "active" : 'deactive';
        $checked = $toggleStatus === 'deactive' ? null : 'checked';
        $msg['activeStatus'] = $toggleStatus;
        
        $updateStatusSql = "UPDATE doctorspecialization SET status = '$toggleStatus', updated_at = current_timestamp() WHERE specialization_id = '$specialization_id'";
        $result = $conn->query($updateStatusSql);
        if($result){
            $msg['success'] = 'success';
            $html = "
            <input type='checkbox' id='status_{$specialization_id}' class='check' {$checked}>
            <label for='status_{$specialization_id}' class='checktoggle' data-spec-sts-id='{$specialization_id}'>checkbox</label>";
            $msg['html'] =trim($html);
        }else{
            $msg['failed'] = 'failed';
        }
        // header("Content-type:application/json");
        echo json_encode($msg);
        
    }

// ************************** end ***********************************
//*************************** get signle specialization data */
if(isset($_POST['req']) && $_POST['req'] === trim('docSpecSingle')){
    $msg= [];
    $id = trim($_POST['eid']);
    $getSql = "SELECT specialization FROM doctorspecialization WHERE specialization_id= '$id'";
    $result = $conn->query($getSql);
    if($result->num_rows > 0){
        $msg['success'] = true;
        $row = $result->fetch_assoc();
        $msg['data'] = $row['specialization'] ;
    }else{
        $msg['success'] = false;
    }
    echo json_encode($msg);
}
//*********************** end ************* */

// ********************* edit specialization **********************
if(isset($_POST['req']) && $_POST['req'] === trim('docSpecEdit')){
    $msg= [];
    $id = trim($_POST['eid']);
    $specialization = trim($_POST['specialization']);
    $getSql = "SELECT specialization FROM doctorspecialization WHERE specialization= '$specialization'";
    $result = $conn->query($getSql);
    if($result->num_rows > 0){
        $msg['success'] = false;
        $msg['exits'] = "Data already exits";
    }else{
        $updateSpecSql = "UPDATE doctorspecialization SET specialization = '$specialization', updated_at = current_timestamp() WHERE specialization_id = '$id'";
        if($conn->query($updateSpecSql)){
            $msg['success'] = true;
            $msg['data'] = "<a href='profile.html'>{$specialization}</a></h2>";
        }
    }
    echo json_encode($msg);
}
//******************end ********************** */

// *************************** delete specialization *****************
if(isset($_POST['req']) && $_POST['req'] === trim('docSpecDel')){
    $msg= [];
    $id = trim($_POST['did']);
    $delSql = "DELETE FROM doctorspecialization WHERE specialization_id = '$id'";
    if($conn->query($delSql)){
        $msg['success'] = true;
    }else{
        $msg['success'] = false;
    }
    echo json_encode($msg);
}

//********************** end */
?>