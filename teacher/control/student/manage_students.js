document.addEventListener("DOMContentLoaded", function () {
  // Call the function to load students when the page is loaded
  loadStudents();
});

function loadStudents() {
  fetch("manage_students.php")
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("studentTableBody").innerHTML = data;
    });
}

function addStudent() {
  var studentName = document.getElementById("studentName").value;
  if (studentName.trim() !== "") {
    var formData = new FormData();
    formData.append("action", "addStudent");
    formData.append("studentName", studentName);

    fetch("manage_students.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        document.getElementById("studentTableBody").innerHTML = data;
        document.getElementById("studentForm").reset();
      });
  }
}

function editStudent(studentId, studentName) {
  document.getElementById("studentName").value = studentName;
  var updateButton = document.createElement("button");
  updateButton.innerHTML = "Update Student";
  updateButton.onclick = function () {
    updateStudent(studentId);
  };
  document.getElementById("studentForm").appendChild(updateButton);
}

function updateStudent(studentId) {
  var studentName = document.getElementById("studentName").value;
  if (studentName.trim() !== "") {
    var formData = new FormData();
    formData.append("action", "updateStudent");
    formData.append("studentId", studentId);
    formData.append("studentName", studentName);

    fetch("manage_students.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        document.getElementById("studentTableBody").innerHTML = data;
        document.getElementById("studentForm").reset();
      });
  }
}

function removeStudent(studentId) {
  var formData = new FormData();
  formData.append("action", "removeStudent");
  formData.append("studentId", studentId);

  fetch("manage_students.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("studentTableBody").innerHTML = data;
      document.getElementById("studentForm").reset();
    });
}
