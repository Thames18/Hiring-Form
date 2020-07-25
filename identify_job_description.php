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
            <a href="employee_hiring_form.php" class="w3-bar-item w3-button">&emsp;Employee Hiring Form</a>
            <a href="update_employee_records.php" class="w3-bar-item w3-button">&emsp;Update Employee Records</a>

            <!-- Task 2 Related Activities-->
            <!--TODO: link buttons to appropriate files-->
            <div class="w3-container w3-green w3-card-2">
                <p>Jobs Main Menu</p>
            </div>
            <a href="identify_job_description.php" class="w3-bar-item w3-button active">&emsp;Identify Job Description</a>
            <a href="changejob.php" class="w3-bar-item w3-button">&emsp;Change Job Description</a>
            <a href="create.php" class="w3-bar-item w3-button">&emsp;Create New Job</a>

        </div>

<form action="identify_job_description_action.php" id="add_employee" method="post">
    <div class="w3-container w3-card-2" style="margin-left:20%">
        <div class="w3-container w3-card-2 w3-teal">
            <h1>Identify Job Description</h1>
        </div>

        <br><br>

        <label for='job_id'>Select Job ID:</label>
        <select name='job_id'>
            <?php
            require "mysql_connect.php";
            $sql = "select job_id from hr_jobs";
            $result = $connection->query($sql);
            echo "<option>Select Job ID...</option>";
            while ($row = $result->fetch_assoc()){
                $rowVal = "{$row['job_id']}";
                echo "<option value=$row[job_id]>$rowVal</option>";
            }
            mysqli_close($connection);
            ?>
        </select>
        <input type="submit" name="submit" value="Submit">

    <br><br><br><br>
    </div>



</body>
</html>
