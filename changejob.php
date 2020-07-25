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
    <a href="changejob.php" class="w3-bar-item w3-button active">&emsp;Change Job Description</a>
    <a href="create.php" class="w3-bar-item w3-button">&emsp;Create New Job</a>

</div>


<div class="w3-container w3-card-2" style="margin-left:20%">
    <div class="w3-container w3-card-2 w3-teal">
        <h1>Job Description </h1>
    </div>
<br>
    <?php
    if(isset($_POST['getjob'])) {
        require 'mysql_connect.php';

        $job_id = mysqli_real_escape_string($connection, $_POST['job_id']);
        $job_title = mysqli_real_escape_string($connection,$_POST['job_title']);
	    $min_salary = mysqli_real_escape_string($connection,$_POST['min_salary']);
        $max_salary = mysqli_real_escape_string($connection,$_POST['max_salary']);

		if (($job_id != "") && ($job_title != "") && ($min_salary != "") && ($max_salary != "")) {
            $sql = "UPDATE hr_jobs SET job_title = '$job_title', min_salary = '$min_salary',
                    max_salary = '$max_salary' WHERE job_id = '$job_id'";
            $return_value = mysqli_query($connection, $sql);
            if (!$return_value) {
                die('Could not update data: ' . mysqli_error($connection));
            }
            echo "Updated data successfully\n";
        } else{
            die('Please enter values for all fields.');
        }
        mysqli_close($connection);
    }
    ?>


 <?php
    try {
        require 'mysql_connect.php';
        $query = "SELECT * FROM hr_jobs";
        //first pass just gets the column names
        print "<table>&nbsp;";
        $result = $connection->query($query);
        //return only the first row (we only need field names)
        $row = $result->fetch_assoc();
        print "&nbsp;<tr>";
        foreach ($row as $field => $value){
            print " <th>&nbsp;$field</th>";
        } // end foreach
        print "</tr>";
        //second query gets the data
        $data = $connection->query($query);
        $data->fetch_assoc();
        foreach($data as $row){
            print " <tr>";
            foreach ($row as $name=>$value){
                print " <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$value&nbsp;</td>";
            } // end field loop
            print " </tr>";
        } // end record loop
        print "</table>&nbsp;";
        mysqli_close($connection);
    } catch(mysqli_sql_exception $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    ?>
<br>

    <form method="post" action="">
        <table width="700" align="left" border="0" cellspacing="1" cellpadding="2">
            <tr>
                <th width="220", align="right">Where job ID =</th>
                <td><input name="job_id" type="text" id="job_id"></td>
            </tr>
            <tr>
                <th align="right">job title =</th>
                <td><input name="job_title" type="text" id="job_title"></td>
            </tr>
            <tr>
                <th align="right">min salary =</th>
                <td><input name="min_salary" type="text" id="min_salary"></td>
            </tr>
            <tr>
                <th align="right">max salary =</th>
                <td><input name="max_salary" type="text" id="max_salary"></td>
            </tr>
            <tr>
                <td width="100"> </td>
                <td>
                    <input name="getjob" type="submit" id="getjob" value="change job">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
