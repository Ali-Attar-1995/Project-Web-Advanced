function showCustomers() {
  $.ajax({
    url: "../adminview/viewcustomer.php",
    method: "post",
    data: {
      show: 1,
    },
    success: function (response) {
      $(".home").html(response);
    },
  });
}

function CustomerDelete(usid) {
  $.ajax({
    url: "../controller/deletecutomerController.php",
    method: "post",
    data: { record: usid },
    success: function (data) {
      alert("Customer Successfully deleted");
      $("form").trigger("reset");
      showCustomers();
    },
  });
}

function showCars() {
  $.ajax({
    url: "../adminview/viewcars.php",
    method: "post",
    data: {
      show: 1,
    },
    success: function (response) {
      $(".home").html(response);
    },
  });
}

function addCars() {
  var c_type = $("#c_type").val();
  var c_model = $("#c_model").val();
  var c_fee = $("#c_fee").val();
  var addcar = $("#addcar").val();
  var c_Image = $("#c_Image")[0].files[0];

  var fd = new FormData();
  fd.append("c_type", c_type);
  fd.append("c_model", c_model);
  fd.append("c_fee", c_fee);
  fd.append("c_Image", c_Image);
  fd.append("addcar", addcar);
  $.ajax({
    url: "../controller/addCarController.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      alert("Car Added successfully.");
      $("form").trigger("reset");
      showCars();
    },
  });
}

function CarDelete(id) {
  $.ajax({
    url: "../controller/deletecarController.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      alert("Car Successfully deleted");
      $("form").trigger("reset");
      showCars();
    },
  });
}

function CarEditForm(id) {
  $.ajax({
    url: "../adminview/editCarForm.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      $(".home").html(data);
    },
  });
}

function updateCars() {
  var c_id = $("#c_id").val();
  var c_type = $("#c_type").val();
  var c_model = $("#c_model").val();
  var c_fee = $("#c_fee").val();
  var oldImage = $("#oldImage").val();
  var newImage = $("#newImage")[0].files[0];
  var fd = new FormData();
  fd.append("c_id", c_id);
  fd.append("c_type", c_type);
  fd.append("c_model", c_model);
  fd.append("c_fee", c_fee);
  fd.append("oldImage", oldImage);
  fd.append("newImage", newImage);

  $.ajax({
    url: "../controller/updateCarController.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      alert("Car Update Success.");
      $("form").trigger("reset");
      showCars();
    },
  });
}

function showRentals() {
  $.ajax({
    url: "../adminview/viewAllrentals.php",
    method: "post",
    data: {
      show: 1,
    },
    success: function (response) {
      $(".home").html(response);
    },
  });
}

function rentViewFrom(cid, usid) {
  $.ajax({
    url: "../userView/rentViewForm.php",
    method: "post",
    data: { record1: cid, record2: usid },
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}

function rentCars() {
  var c_id = $("#c_id").val();
  var u_id = $("#u_id").val();
  var fee = $("#fee").text();
  var date = $("#date").val();
  var duedate = $("#duedate").val();
  var location = $("#location").val();
  var av = $("#av").val();

  console.log("Fee Value Before Submission:", fee);

  var fd = new FormData();
  fd.append("c_id", c_id);
  fd.append("u_id", u_id);
  fd.append("fee", fee);
  fd.append("date", date);
  fd.append("duedate", duedate);
  fd.append("location", location);
  fd.append("av", av);
  $.ajax({
    url: "../controller/rentCarController.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      var response = JSON.parse(data);

      if (response.success) {
        alert(response.message);
        $("#rentCar").trigger("reset");
      } else {
        alert(response.message);
        $("#rentCar").trigger("reset");
      }
    },
  });
}

function returnCarForm(rid) {
  $.ajax({
    url: "../adminview/returnCarForm.php",
    method: "post",
    data: { record: rid },
    success: function (data) {
      $(".modal-body").html(data);
    },
  });
}

function returnCars(rid, cid) {
  $.ajax({
    url: "../controller/returnCarController.php",
    method: "post",
    data: {
      record1: rid,
      record2: cid,
    },
    success: function (data) {
      alert("Car Successfully returned");
      $(".home").trigger("reset");
      showRentals();
    },
  });
}

function showMessages() {
  $.ajax({
    url: "../adminview/viewMessages.php",
    method: "post",
    data: {
      show: 1,
    },
    success: function (response) {
      $(".home").html(response);
    },
  });
}

function ChangeMessageStatus(rid) {
  $.ajax({
    url: "../controller/updateMessageStatus.php",
    method: "post",
    data: { record: rid },
    success: function (data) {
      alert("Message Status updated successfully");
      $("form").trigger("reset");
      showMessages();
    },
  });
}
