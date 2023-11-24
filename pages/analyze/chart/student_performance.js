function loadStudentPerformance() {
  var studentId = document.getElementById("studentId").value;
  fetch("student_performance_data.php?studentId=" + studentId)
    .then((response) => response.json())
    .then((data) => {
      generateCharts(data);
    });
}

function generateCharts(data) {
  var chartsContainer = document.getElementById("chartsContainer");
  chartsContainer.innerHTML = "";

  createDoubleColumnBarChart(
    chartsContainer,
    "Comparison with Other Students (Marks)",
    data.courseNames,
    [
      {
        label: "Student Marks",
        data: data.studentMarks,
        backgroundColor: "rgba(75, 192, 192, 0.5)",
        borderColor: "rgba(75, 192, 192, 1)",
        borderWidth: 1,
      },
      {
        label: "Average Marks",
        data: data.averageMarks,
        backgroundColor: "rgba(255, 99, 132, 0.5)",
        borderColor: "rgba(255, 99, 132, 1)",
        borderWidth: 1,
      },
    ]
  );

  createBarChart(chartsContainer, "Highest Achieved Marks", data.courseNames, [
    {
      label: "Highest Marks",
      data: data.highestMarks,
      backgroundColor: "rgba(255, 206, 86, 0.5)",
      borderColor: "rgba(255, 206, 86, 1)",
      borderWidth: 1,
    },
  ]);

  createLineChart(
    chartsContainer,
    "Student Marks Over Time",
    data.courseNames,
    data.studentMarks
  );

  createRadarChart(
    chartsContainer,
    "Comparison with Other Students (Average Marks)",
    data.courseNames,
    [
      {
        label: "Student Marks",
        data: data.studentMarks,
        backgroundColor: "rgba(75, 192, 192, 0.5)",
        borderColor: "rgba(75, 192, 192, 1)",
        borderWidth: 1,
      },
      {
        label: "Average Marks",
        data: data.averageMarks,
        backgroundColor: "rgba(255, 99, 132, 0.5)",
        borderColor: "rgba(255, 99, 132, 1)",
        borderWidth: 1,
      },
    ]
  );

  createBarChart(
    chartsContainer,
    "Student Marks Comparison (Course 1)",
    data.courseNames,
    [
      {
        label: "Student Marks",
        data: data.studentMarks,
        backgroundColor: "rgba(75, 192, 192, 0.5)",
        borderColor: "rgba(75, 192, 192, 1)",
        borderWidth: 1,
      },
    ]
  );

  createLineChart(
    chartsContainer,
    "Student Marks Trend (Course 2)",
    data.courseNames,
    data.studentMarks
  );

  createRadarChart(
    chartsContainer,
    "Overall Performance (Average Marks)",
    data.courseNames,
    [
      {
        label: "Student Marks",
        data: data.studentMarks,
        backgroundColor: "rgba(75, 192, 192, 0.5)",
        borderColor: "rgba(75, 192, 192, 1)",
        borderWidth: 1,
      },
      {
        label: "Average Marks",
        data: data.averageMarks,
        backgroundColor: "rgba(255, 99, 132, 0.5)",
        borderColor: "rgba(255, 99, 132, 1)",
        borderWidth: 1,
      },
    ]
  );

  // Add more charts as needed
}

function createBarChart(container, chartTitle, labels, datasets) {
  var chartCanvas = document.createElement("canvas");
  container.appendChild(chartCanvas);
  chartCanvas.width = 400; // Set your preferred width
  chartCanvas.height = 300; // Set your preferred height

  var ctx = chartCanvas.getContext("2d");
  new Chart(ctx, {
    type: "bar",
    data: {
      labels: labels,
      datasets: datasets,
    },
    options: {
      responsive: false, // Set to false to fix the canvas size
      scales: {
        x: { stacked: true },
        y: { stacked: true },
      },
      plugins: {
        title: {
          display: true,
          text: chartTitle,
        },
      },
    },
  });
}

function createDoubleColumnBarChart(container, chartTitle, labels, datasets) {
  var chartCanvas = document.createElement("canvas");
  container.appendChild(chartCanvas);
  chartCanvas.width = 400; // Set your preferred width
  chartCanvas.height = 300; // Set your preferred height

  var ctx = chartCanvas.getContext("2d");
  new Chart(ctx, {
    type: "bar",
    data: {
      labels: labels,
      datasets: datasets,
    },
    options: {
      responsive: false, // Set to false to fix the canvas size
      scales: {
        x: { stacked: true },
        y: { stacked: true },
      },
      plugins: {
        title: {
          display: true,
          text: chartTitle,
        },
      },
    },
  });
}

function createLineChart(container, chartTitle, labels, data) {
  var chartCanvas = document.createElement("canvas");
  container.appendChild(chartCanvas);
  chartCanvas.width = 400; // Set your preferred width
  chartCanvas.height = 300; // Set your preferred height

  var ctx = chartCanvas.getContext("2d");
  new Chart(ctx, {
    type: "line",
    data: {
      labels: labels,
      datasets: [
        {
          label: "Student Marks",
          data: data,
          borderColor: "rgba(75, 192, 192, 1)",
          borderWidth: 2,
          fill: false,
        },
      ],
    },
    options: {
      responsive: false, // Set to false to fix the canvas size
      plugins: {
        title: {
          display: true,
          text: chartTitle,
        },
      },
    },
  });
}

function createRadarChart(container, chartTitle, labels, datasets) {
  var chartCanvas = document.createElement("canvas");
  container.appendChild(chartCanvas);
  chartCanvas.width = 400; // Set your preferred width
  chartCanvas.height = 300; // Set your preferred height

  var ctx = chartCanvas.getContext("2d");
  new Chart(ctx, {
    type: "radar",
    data: {
      labels: labels,
      datasets: datasets,
    },
    options: {
      responsive: false, // Set to false to fix the canvas size
      plugins: {
        title: {
          display: true,
          text: chartTitle,
        },
      },
    },
  });
}
// ... (previous code)

function generateCharts(data) {
    var chartsContainer = document.getElementById('chartsContainer');
    chartsContainer.innerHTML = '';

    createDoubleColumnBarChart(chartsContainer, 'Comparison with Other Students (Marks)', data.courseNames, [
        {
            label: 'Student Marks',
            data: data.studentMarks,
            backgroundColor: 'rgba(75, 192, 192, 0.5)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        },
        {
            label: 'Average Marks',
            data: data.averageMarks,
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }
    ]);

    createBarChart(chartsContainer, 'Highest Achieved Marks', data.courseNames, [
        {
            label: 'Highest Marks',
            data: data.highestMarks,
            backgroundColor: 'rgba(255, 206, 86, 0.5)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
        }
    ]);

    createLineChart(chartsContainer, 'Student Marks Over Time', data.courseNames, data.studentMarks);

    createRadarChart(chartsContainer, 'Comparison with Other Students (Average Marks)', data.courseNames, [
        {
            label: 'Student Marks',
            data: data.studentMarks,
            backgroundColor: 'rgba(75, 192, 192, 0.5)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        },
        {
            label: 'Average Marks',
            data: data.averageMarks,
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }
    ]);

    createBarChart(chartsContainer, 'Student Marks Comparison (Course 1)', data.courseNames, [
        {
            label: 'Student Marks',
            data: data.studentMarks,
            backgroundColor: 'rgba(75, 192, 192, 0.5)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }
    ]);

    createLineChart(chartsContainer, 'Student Marks Trend (Course 2)', data.courseNames, data.studentMarks);

    createRadarChart(chartsContainer, 'Overall Performance (Average Marks)', data.courseNames, [
        {
            label: 'Student Marks',
            data: data.studentMarks,
            backgroundColor: 'rgba(75, 192, 192, 0.5)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        },
        {
            label: 'Average Marks',
            data: data.averageMarks,
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }
    ]);

    createPieChart(chartsContainer, 'Distribution of Student Marks', data.courseNames, data.studentMarks);

    createDoughnutChart(chartsContainer, 'Distribution of Highest Marks', data.courseNames, data.highestMarks);

    createPolarAreaChart(chartsContainer, 'Polar Area Chart of Student Marks', data.courseNames, data.studentMarks);

    createScatterChart(chartsContainer, 'Scatter Plot of Student Marks', data.courseNames, data.studentMarks);

    createBubbleChart(chartsContainer, 'Bubble Chart of Student Marks', data.courseNames, data.studentMarks);

    // Add more charts as needed
}

function createPieChart(container, chartTitle, labels, data) {
    var chartCanvas = document.createElement('canvas');
    container.appendChild(chartCanvas);
    chartCanvas.width = 400; // Set your preferred width
    chartCanvas.height = 300; // Set your preferred height

    var ctx = chartCanvas.getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [
                {
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        // Add more colors as needed
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        // Add more colors as needed
                    ],
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: false, // Set to false to fix the canvas size
            plugins: {
                title: {
                    display: true,
                    text: chartTitle
                }
            }
        }
    });
}

function createDoughnutChart(container, chartTitle, labels, data) {
    var chartCanvas = document.createElement('canvas');
    container.appendChild(chartCanvas);
    chartCanvas.width = 400; // Set your preferred width
    chartCanvas.height = 300; // Set your preferred height

    var ctx = chartCanvas.getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [
                {
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        // Add more colors as needed
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        // Add more colors as needed
                    ],
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: false, // Set to false to fix the canvas size
            plugins: {
                title: {
                    display: true,
                    text: chartTitle
                }
            }
        }
    });
}

function createPolarAreaChart(container, chartTitle, labels, data) {
    var chartCanvas = document.createElement('canvas');
    container.appendChild(chartCanvas);
    chartCanvas.width = 400; // Set your preferred width
    chartCanvas.height = 300; // Set your preferred height

    var ctx = chartCanvas.getContext('2d');
    new Chart(ctx, {
        type: 'polarArea',
        data: {
            labels: labels,
            datasets: [
                {
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        // Add more colors as needed
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        // Add more colors as needed
                    ],
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: false, // Set to false to fix the canvas size
            plugins: {
                title: {
                    display: true,
                    text: chartTitle
                }
            }
        }
    });
}

function createScatterChart(container, chartTitle, labels, data) {
    var chartCanvas = document.createElement('canvas');
    container.appendChild(chartCanvas);
    chartCanvas.width = 400; // Set your preferred width
    chartCanvas.height = 300; // Set your preferred height

    var ctx = chartCanvas.getContext('2d');
    new Chart(ctx, {
        type: 'scatter',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Scatter Plot',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: false, // Set to false to fix the canvas size
            plugins: {
                title: {
                    display: true,
                    text: chartTitle
                }
            }
        }
    });
}

function createBubbleChart(container, chartTitle, labels, data) {
    var chartCanvas = document.createElement('canvas');
    container.appendChild(chartCanvas);
    chartCanvas.width = 400; // Set your preferred width
    chartCanvas.height = 300; // Set your preferred height

    var ctx = chartCanvas.getContext('2d');
    new Chart(ctx, {
        type: 'bubble',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Bubble Chart',
                    data: data.map(value => ({ x: Math.random(), y: Math.random(), r: value })),
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: false, // Set to false to fix the canvas size
            plugins: {
                title: {
                    display: true,
                    text: chartTitle
                }
            }
        }
    });
}

// ... (more charts)
// ... (previous code)

function generateCharts(data) {
    var chartsContainer = document.getElementById('chartsContainer');
    chartsContainer.innerHTML = '';

    // ... (previous code)

    createRadarChart(chartsContainer, 'Comparison with Other Students (Average Marks)', data.courseNames, [
        {
            label: 'Student Marks',
            data: data.studentMarks,
            backgroundColor: 'rgba(75, 192, 192, 0.5)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        },
        {
            label: 'Average Marks',
            data: data.averageMarks,
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }
    ]);

    createBarChart(chartsContainer, 'Student Marks Comparison (Course 1)', data.courseNames, [
        {
            label: 'Student Marks',
            data: data.studentMarks,
            backgroundColor: 'rgba(75, 192, 192, 0.5)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }
    ]);

    createLineChart(chartsContainer, 'Student Marks Trend (Course 2)', data.courseNames, data.studentMarks);

    createRadarChart(chartsContainer, 'Overall Performance (Average Marks)', data.courseNames, [
        {
            label: 'Student Marks',
            data: data.studentMarks,
            backgroundColor: 'rgba(75, 192, 192, 0.5)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        },
        {
            label: 'Average Marks',
            data: data.averageMarks,
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }
    ]);

    createPieChart(chartsContainer, 'Distribution of Student Marks', data.courseNames, data.studentMarks);

    createDoughnutChart(chartsContainer, 'Distribution of Highest Marks', data.courseNames, data.highestMarks);

    createPolarAreaChart(chartsContainer, 'Polar Area Chart of Student Marks', data.courseNames, data.studentMarks);

    createScatterChart(chartsContainer, 'Scatter Plot of Student Marks', data.courseNames, data.studentMarks);

    createBubbleChart(chartsContainer, 'Bubble Chart of Student Marks', data.courseNames, data.studentMarks);

    createRadarChart(chartsContainer, 'Comparison with Other Students (Overall Performance)', data.courseNames, [
        {
            label: 'Student Marks',
            data: data.studentMarks,
            backgroundColor: 'rgba(75, 192, 192, 0.5)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        },
        {
            label: 'Average Marks',
            data: data.averageMarks,
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        },
        {
            label: 'Highest Marks',
            data: data.highestMarks,
            backgroundColor: 'rgba(255, 206, 86, 0.5)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
        }
    ]);

    createLineChart(chartsContainer, 'Student vs Highest Grade (Overall)', data.courseNames, data.studentMarks, data.highestMarks);

    // Add more charts as needed
}