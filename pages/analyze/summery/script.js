function getStudentReport() {
  var studentId = document.getElementById("studentId").value;

  // Example using Fetch API
  fetch("get_student_report.php?student_id=" + studentId)
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("reportContainer").innerHTML = data;
      document.querySelector(".buttons-container").style.display = "block"; // Show the buttons
    })
    .catch((error) => console.error("Error:", error));
}

