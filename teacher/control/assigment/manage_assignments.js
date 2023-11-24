document.addEventListener("DOMContentLoaded", function () {
  // Call the function to load assignments when the page is loaded
  loadAssignments();
});

function loadAssignments() {
  fetch("manage_assignments.php")
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("assignmentTableBody").innerHTML = data;
    });
}

function addAssignment() {
  var assignmentName = document.getElementById("assignmentName").value;
  if (assignmentName.trim() !== "") {
    var formData = new FormData();
    formData.append("action", "addAssignment");
    formData.append("assignmentName", assignmentName);

    fetch("manage_assignments.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        document.getElementById("assignmentTableBody").innerHTML = data;
        document.getElementById("assignmentForm").reset();
      });
  }
}

function editAssignment(assignmentId, assignmentName) {
  document.getElementById("assignmentName").value = assignmentName;
  var updateButton = document.createElement("button");
  updateButton.innerHTML = "Update Assignment";
  updateButton.onclick = function () {
    updateAssignment(assignmentId);
  };
  document.getElementById("assignmentForm").appendChild(updateButton);
}

function updateAssignment(assignmentId) {
  var assignmentName = document.getElementById("assignmentName").value;
  if (assignmentName.trim() !== "") {
    var formData = new FormData();
    formData.append("action", "updateAssignment");
    formData.append("assignmentId", assignmentId);
    formData.append("assignmentName", assignmentName);

    fetch("manage_assignments.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        document.getElementById("assignmentTableBody").innerHTML = data;
        document.getElementById("assignmentForm").reset();
      });
  }
}

function removeAssignment(assignmentId) {
  var formData = new FormData();
  formData.append("action", "removeAssignment");
  formData.append("assignmentId", assignmentId);

  fetch("manage_assignments.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("assignmentTableBody").innerHTML = data;
      document.getElementById("assignmentForm").reset();
    });
}
