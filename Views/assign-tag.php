<?php if (!isset($_GET['tag'])) {
    echo "No tag found";
    exit(1);
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Assign Tag</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Assign Tag</h1>

        <div class="row g-3">
            <div class="col-md-4">
                <label for="semester" class="form-label">Semester</label>
                <select class="form-select" id="semester" onchange="fetchStudents()" onfocus="this.selectedIndex = -1;">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="2">3</option>
                    <option value="2">4</option>
                    <option value="2">5</option>
                    <option value="2">6</option>
                    <option value="2">7</option>
                    <option value="2">8</option>
                    <!-- Add more semesters as needed -->
                </select>
            </div>
            <div class="col-md-4">
                <label for="branch" class="form-label">Branch</label>
                <select class="form-select" id="branch" onchange="fetchStudents()" onfocus="this.selectedIndex = -1;">
                    <!-- Branches will be dynamically populated using JavaScript -->
                </select>
            </div>
            <div class="col-md-4">
                <label for="student" class="form-label">Student</label>
                <select class="form-select" id="student" onfocus="this.selectedIndex = -1;">
                    <!-- Students will be dynamically populated using JavaScript -->
                </select>
            </div>
        </div>

        <button class="btn btn-primary mt-3" onclick="assignTag()">Assign Tag</button>
    </div>

    <script src="../js/bootstrap.min.js"></script>
    <script>
        function fetchBranches() {
            var branchDropdown = document.getElementById("branch");

            // AJAX Request to fetch branches
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var branches = JSON.parse(this.responseText);

                    // Clear previous options
                    branchDropdown.innerHTML = '<option value="">Select Branch</option>';

                    // Populate the branch dropdown
                    branches.forEach(function(branch) {
                        var option = document.createElement("option");
                        option.value = branch.id;
                        option.text = branch.name;
                        branchDropdown.appendChild(option);
                    });
                }
            };
            xhttp.open("GET", "/Controllers/get-branches.php", true);
            xhttp.send();
        }

        function fetchStudents() {
            var semester = document.getElementById("semester").value;
            var branch = document.getElementById("branch").value;

            // AJAX Request to fetch students based on semester and branch
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var students = JSON.parse(this.responseText);
                    var studentDropdown = document.getElementById("student");

                    // Clear previous options
                    studentDropdown.innerHTML = '<option value="">Select Student</option>';

                    // Populate the student dropdown
                    students.forEach(function(student) {
                        var option = document.createElement("option");
                        option.value = student.id;
                        option.text = student.enrollment + "-" + student.studentname;
                        studentDropdown.appendChild(option);
                    });
                }
            };
            xhttp.open("GET", "/Controllers/get-students.php?semester=" + semester + "&branch=" + branch, true);
            xhttp.send();
        }

        function assignTag() {
            var student = document.getElementById("student").value;
            var tag = "<?php echo $_GET['tag'] ?>"; // You should get the actual tag from your RFID reader
            console.log(tag+" " + student);

            // Send the student ID and tag to update-tag.php
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    if (response.success) {
                        window.location = "/Views/IOT.php"
                        alert('Tag assigned successfully!');
                    } else {
                        alert('Error assigning tag: ' + response.error);
                    }
                }
            };
            xhttp.open("POST", "/Controllers/update-tag.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("user=" + student + "&tag=" + tag);
        }
        // Fetch branches when the page loads
        window.onload = fetchBranches;
    </script>
</body>

</html>