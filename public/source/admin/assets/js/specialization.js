$(document).ready(function () {
  var current_title = $(document).attr("title");
  if (current_title === "Specialization") {
    loadDataTable();
  }
  // specialization add
  $("#specBtn").on("click", function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "code.php",
      data: $("#specForm").serialize(),
      success: function (response) {
        var obj = $.parseJSON(response);
        if (obj["exits"]) {
          $("#specShowMsg").append(
            `<p class="alert alert-danger mt-3 specShowMsg">${obj["exits"]}</p>`
          );
        } else {
          $("#Add_Specialities_details").modal("hide"); // hide the modal after insert the data
          $("#specForm").trigger("reset"); // for reset the form after new data inserted
          $("#specDetailsTable").html(""); // for reset table the append it
          loadDataTable(); // load the table
          toastr.success("Specialization is added", "success", {
            timeOut: "5000",
          });
          $("#specAddBtn").html("");
          $("#specAddBtn").append(`
          <a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2 specAddBtn">Add</a>`);
        }
      },
    });
  });
  //   ********************* end specializtion ***************
  //   for specialization status toggle
  $(document).on("click", ".checktoggle", function () {
    var getSpecId = $(this).attr("data-spec-sts-id");
    if (confirm("Do you want ?")) {
      $.ajax({
        type: "POST",
        url: "code.php",
        data: { specId: getSpecId, sentReq: true },
        success: function (response) {
          var obj = $.parseJSON(response);
          toastr.success(
            "Specialization is " + obj["activeStatus"],
            "success",
            {
              timeOut: "5000",
            }
          );
          // reset the status column
          $(`#specDetailsTable .classid_${getSpecId}`).html("");
          // insert the status column
          $(`#specDetailsTable .classid_${getSpecId}`).append(obj["html"]);
        },
      });
    } else {
      var data = $(`#specDetailsTable .classid_${getSpecId}`).html();
      $(`#specDetailsTable .classid_${getSpecId}`).html(data); //
    }
  });
  // ************************** end *************

  // *************************** get single specialization ***************
  $(document).on("click", ".editSpecBtn", function (e) {
    e.preventDefault();
    var editId = $(this).attr("data-spec-eid");
    $.ajax({
      url: "code.php",
      method: "POST",
      data: { eid: editId, req: "docSpecSingle" },
      success: function (response) {
        var obj = $.parseJSON(response);
        if (obj["success"]) {
          $(".editSpecId").val(editId);
          $("#edit_specialization").val(obj["data"]);
        }
      },
    }); //end ajax
  });
  // ************************ end ***************

  // ****************************** edit specialization *****************
  $(".editSpec").on("click", function (e) {
    e.preventDefault();
    var editId = $(".editSpecId").val();
    var specialization_in = $("#edit_specialization").val();
    $.ajax({
      url: "code.php",
      method: "POST",
      data: {
        eid: editId,
        specialization: specialization_in,
        req: "docSpecEdit",
      },
      success: function (response) {
        var obj = $.parseJSON(response);
        if (obj["success"]) {
          $("#edit_specialities_details").modal("hide");
          toastr.success("Specialization successfully edited ", "success", {
            timeOut: "5000",
          });
          $(`#specDetailsTable #row_id-${editId} .table-avatar`).html("");
          $(`#specDetailsTable #row_id-${editId} .table-avatar`).append(
            obj["data"]
          );
        } else {
          $(".editSpecMsg").html("");
          $(".editSpecMsg").append(
            `<p class='alert alert-danger mt-3'>${obj["exits"]}</p>`
          );
        }
        $("#docShowMsg > p").remove();
      },
    }); //end ajax
  });
  //******************* end **************** */
  // ************************get del id *************
  $(document).on("click", ".delSpecBtn", function (e) {
    e.preventDefault();
    var delId = $(this).attr("data-spec-did");
    $("#delSpecId").val(delId);
  });
  //******************* end **************** */
  // ******************* delete specialization **************
  $(".delSpec").on("click", function (e) {
    e.preventDefault();
    var delId = $("#delSpecId").val();
    $.ajax({
      url: "code.php",
      method: "POST",
      data: {
        did: delId,
        req: "docSpecDel",
      },
      success: function (response) {
        var obj = $.parseJSON(response);
        if (obj["success"]) {
          $("#delete_specialization_modal").modal("hide");
          toastr.success("Specialization successfully deleted ", "success", {
            timeOut: "5000",
          });
          $("#specDetailsTable").html("");
          loadDataTable();
        }
        console.log(obj);
      },
    }); //end ajax
  });

  // ****************** end *************
});

// function for get all specialization
function loadDataTable() {
  $.ajax({
    url: "code.php",
    method: "GET",
    data: { specialization: "all-docData" },
    success: function (response) {
      // create table
      $("#specDetailsTable").append(response);
      // alert(response);
    },
    error: function (e) {
      alert(e);
    },
  });
}
