document.addEventListener("DOMContentLoaded", function () {
  // Call the function to load courses when the page is loaded
  loadCourses();
});

function loadCourses() {
  fetch("manage_courses.php")
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("courseTableBody").innerHTML = data;
    });
}

function addCourse() {
  var courseName = document.getElementById("courseName").value;
  if (courseName.trim() !== "") {
    var formData = new FormData();
    formData.append("action", "addCourse");
    formData.append("courseName", courseName);

    fetch("manage_courses.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        document.getElementById("courseTableBody").innerHTML = data;
        document.getElementById("courseForm").reset();
      });
  }
}

function editCourse(courseId, courseName) {
  document.getElementById("courseName").value = courseName;
  var updateButton = document.createElement("button");
  updateButton.innerHTML = "Update Course";
  updateButton.onclick = function () {
    updateCourse(courseId);
  };
  document.getElementById("courseForm").appendChild(updateButton);
}

function updateCourse(courseId) {
  var courseName = document.getElementById("courseName").value;
  if (courseName.trim() !== "") {
    var formData = new FormData();
    formData.append("action", "updateCourse");
    formData.append("courseId", courseId);
    formData.append("courseName", courseName);

    fetch("manage_courses.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        document.getElementById("courseTableBody").innerHTML = data;
        document.getElementById("courseForm").reset();
      });
  }
}

function removeCourse(courseId) {
  var formData = new FormData();
  formData.append("action", "removeCourse");
  formData.append("courseId", courseId);

  fetch("manage_courses.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("courseTableBody").innerHTML = data;
      document.getElementById("courseForm").reset();
    });
}
