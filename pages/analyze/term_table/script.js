document.addEventListener("DOMContentLoaded", function () {
  generateChart();

  document
    .getElementById("chartForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();
      generateChart();
    });
});

function generateChart() {
  var studentId = document.getElementById("studentId").value;
  var subjectId = document.getElementById("subjectId").value;

  var xhr = new XMLHttpRequest();
  var timestamp = new Date().getTime();
  xhr.open(
    "GET",
    "getData.php?studentId=" +
      studentId +
      "&subjectId=" +
      subjectId +
      "&timestamp=" +
      timestamp,
    true
  );
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var data = JSON.parse(xhr.responseText);

      var chartContainer = document.getElementById("performanceChart");
      chartContainer.innerHTML = '<canvas id="performanceChart"></canvas>';

      var ctx = document.getElementById("performanceChart").getContext("2d");
      var performanceChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Term 1", "Term 2", "Term 3", "Term 4", "Term 5", "Term 6"],
          datasets: [
            {
              label: "Student Performance",
              data: data,
              backgroundColor: "rgba(75, 192, 192, 0.5)",
              borderColor: "rgba(76, 193, 193, 1)",
              borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });
    }
  };
  xhr.send();
}
