$(document).ready(function () {
  loadDataDoctorTable();
  // doctor add
  $("#docBtn").on("click", function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "code/doctor-code.php",
      data: $("#docAddForm").serialize(),
      success: function (response) {
        var obj = $.parseJSON(response);
        if (obj["exits"]) {
          $("#docShowMsg").append(
            `<p class="alert alert-danger mt-3">${obj["exits"]}</p>`
          );
        } else {
          $("#docDetailsTable").html("");
          loadDataDoctorTable();
          $("#docShowMsg > p").remove();
          $("#add_doctor_modal").modal("hide"); // hide the modal after insert the data
          $("#docAddForm").trigger("reset"); // for reset the form after new data inserted
          toastr.success("Doctor Registration successfull", "success", {
            timeOut: "5000",
          });
        }
      },
    });
  });
  //   ********************* end doctor ***************

  // ************************get del id *************
  $(document).on("click", ".docDelBtn", function (e) {
    e.preventDefault();
    var delId = $(this).attr("data-doc-did");
    $("#delDocId").val(delId);
    console.log("del id is " + delId);
  });
  //******************* end **************** */
  // ******************* delete specialization **************
  $(".delDoc").on("click", function (e) {
    e.preventDefault();
    var delId = $("#delDocId").val();
    $.ajax({
      url: "code/doctor-code.php",
      method: "POST",
      data: {
        did: delId,
        req: "docDel",
      },
      success: function (response) {
        var obj = $.parseJSON(response);
        if (obj["success"]) {
          $("#delete_doctor_modal").modal("hide");
          toastr.success("Doctor successfully deleted ", "success", {
            timeOut: "5000",
          });
          $("#docDetailsTable").html("");
          loadDataDoctorTable();
        }
      },
    }); //end ajax
  });

  // ****************** end *************
});

// function for get all specialization
function loadDataDoctorTable() {
  $.ajax({
    url: "code/doctor-code.php",
    method: "GET",
    data: { doctor: "all-docData" },
    success: function (response) {
      // create table
      $("#docDetailsTable").append(response);
      // console.log(response);
      // alert(response);
    },
  });
}
