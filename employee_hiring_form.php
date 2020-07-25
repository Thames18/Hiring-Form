<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<div class="w3-sidebar w3-light-grey w3-bar-block w3-card-2" style="width:20%">
    <style>

/* Style the active class, and buttons on mouse-over */
.active, .btn:hover {
  background-color: #D89327;
  color: white;
}
</style>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );

        function myFunction() {
            document.getElementById("myForm").reset();
        }
    </script>

    <h3 class="w3-bar-item w3-black">
        <a href="index.php" class="w3-bar-item w3-black">CCPS 610 Assignment</a>
    </h3>

    <!-- Task 1 Related Activities-->
    <div class="w3-blue w3-card-2 w3-container">
        <p>Employee Main Menu</p>
    </div>
    <a href="employee_hiring_form.php" class="w3-bar-item w3-button active">&emsp;Employee Hiring Form</a>
    <a href="update_employee_records.php" class="w3-bar-item w3-button">&emsp;Update Employee Records</a>

    <!-- Task 2 Related Activities-->
    <!--TODO: link buttons to appropriate files-->
    <div class="w3-container w3-green w3-card-2">
        <p>Jobs Main Menu</p>
    </div>
    <a href="identify_job_description.php" class="w3-bar-item w3-button">&emsp;Identify Job Description</a>
    <a href="changejob.php" class="w3-bar-item w3-button">&emsp;Change Job Description</a>
    <a href="create.php" class="w3-bar-item w3-button">&emsp;Create New Job</a>

</div>

<div class="w3-container w3-card-2" style="margin-left:20%">
    <div class="w3-container w3-card-2 w3-teal">
        <h1>Employee Hiring Form</h1>
    </div>

    <form action="insert_employee_records.php" id="add_employee" method="post">
            <br>
            <label>First Name</label>
            <label>
                <input class="w3-input w3-border w3-round" type="text" name="first_name" id="first_name">
            </label>
            <label>Last Name</label>
            <label>
                <input class="w3-input w3-border w3-round" type="text" name="last_name" id="last_name">
            </label>
            <label>Email</label>
            <label>
                <input class="w3-input w3-border w3-round" type="text" name="email" id="email">
            </label>
            <br>
            <label>Phone</label>
            <label>
                <input class="w3-input w3-border w3-round" type="text" name="phone_number" id="phone_number">
            </label>
            <label>Hire Date</label>
            <label>
                <input class="w3-input w3-border w3-round" type="text" name="hire_date" id="hire_date">
            </label>
            <label>Salary</label>
            <label>
                <input class="w3-input w3-border w3-round" type="text" name="salary" id="salary">
            </label>
            <br>

        <!-- Dropdown/table display for Job Table -->
            <label for='job_id'>Select Job Title:</label>
            <select name='job_id'>
                <?php
                require "mysql_connect.php";
                $sql = "select job_id, job_title from hr_jobs";
                $result = $connection->query($sql);
                echo "<option>Select Job Title...</option>";
                while ($row = $result->fetch_assoc()){
                    $rowVal = "{$row['job_id']}  {$row['job_title']}";
                    echo "<option value=$row[job_id]>$rowVal</option>";
                }
                mysqli_close($connection);
                ?>
            </select>

        <br><br>

        <!-- Dropdown/table display for Manager Table -->
        <label for='manager_id'>Select Manager Title:</label>
        <select name='manager_id'>
            <?php
            require "mysql_connect.php";
            $sql = "select employee_id, first_name, last_name from hr_employees";
            $result = $connection->query($sql);
            echo "<option>Select Manager ID...</option>";
            while ($row = $result->fetch_assoc()){
                $rowVal = "{$row['employee_id']}  {$row['first_name']}  {$row['last_name']}";
                echo "<option value=$row[employee_id]>$rowVal</option>";
            }
            mysqli_close($connection);
            ?>
        </select>

        <br><br>

        <!-- Dropdown/table display for Department Table -->
        <label for='department_id'>Select Department Title:</label>
        <select name='department_id'>
            <?php
            require "mysql_connect.php";
            $sql = "select department_id, department_name from hr_departments";
            $result = $connection->query($sql);
            echo "<option>Select Department ID...</option>";
            while ($row = $result->fetch_assoc()){
                $rowVal = "{$row['department_id']}  {$row['department_name']}";
                echo "<option value=$row[department_id]>$rowVal</option>";
            }
            mysqli_close($connection);
            ?>
        </select>

        <br><br>

        <input type="submit" name="submit" value="Hire">
        <input type="reset" onclick="myFunction" value="Cancel">

        <br><br>

    </form>

</div>
</body>
</html>
