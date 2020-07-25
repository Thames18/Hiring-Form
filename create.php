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
    <a href="identify_job_description.php" class="w3-bar-item w3-button">&emsp;Identify Job Description</a>
    <a href="changejob.php" class="w3-bar-item w3-button">&emsp;Change Job Description</a>
    <a href="create.php" class="w3-bar-item w3-button active">&emsp;Create New Job</a>

</div>

<div class="w3-container w3-card-2" style="margin-left:20%">
    <div class="w3-container w3-card-2 w3-teal">
        <h1>Employee Hiring Form</h1>
    </div>

    <form action="insert2.php" id="create" method="post">
            <br>
            <label>Job ID</label>
            <label>
                <input class="w3-input w3-border w3-round" type="text" name="job_id" id="job_id">
            </label>
            <label>Job Title</label>
            <label>
                <input class="w3-input w3-border w3-round" type="text" name="job_title" id="job_title">
            </label>
            <label>Minimum Salary</label>
            <label>
                <input class="w3-input w3-border w3-round" type="text" name="min_salary" id="min_salary">
            </label>
            <br>
            <label>Max Salary</label>
            <label>
                <input class="w3-input w3-border w3-round" type="text" name="max_salary" id="max_salary">
            </label>
            
            <br>

        <br><br>
	  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="submit" name="submit" value="Create Job"> 	

        <br><br>
    </form>


</div>
</body>
</html>
