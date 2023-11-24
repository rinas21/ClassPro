function loadStudentPerformance() {
  const studentId = document.getElementById("studentId").value;

  // Make an AJAX request to the server to fetch the student performance report
  // Modify the URL to match the actual location of your PHP file
  const url = "report.php";
  const data = new FormData();
  data.append("studentId", studentId);

  fetch(url, {
    method: "POST",
    body: data,
  })
    .then((response) => response.json())
    .then((result) => {
      if (result.error) {
        alert(result.error);
      } else {
        displayReport(result);
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function displayReport(reportData) {
  const reportContainer = document.getElementById("reportContainer");
  reportContainer.style.display = "block";

  // Construct and display the report HTML
  const reportHTML = `
        <h2>Student Performance Report</h2>
        <p><strong>Student Name:</strong> ${reportData.studentName}</p>
        <p><strong>Highest Mark:</strong> ${reportData.highestMark} (${reportData.courseName} - ${reportData.assignmentName})</p>
        <!-- Add more report details as needed -->
    `;

  reportContainer.innerHTML = reportHTML;
}
