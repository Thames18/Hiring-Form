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
    <a href="update_employee_records.php" class="w3-bar-item w3-button active">&emsp;Update Employee Records</a>

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
        <h1>Update an Employee Record </h1>
    </div>

    <?php
    if(isset($_POST['update2'])) {
        require 'mysql_connect.php';

        $employee_id = mysqli_real_escape_string($connection, $_POST['employee_id']);
        $salary = mysqli_real_escape_string($connection,$_POST['salary']);
        $phone_number = mysqli_real_escape_string($connection,$_POST['phone_number']);
        $email = mysqli_real_escape_string($connection,$_POST['email']);

        // Salary check
        $query = "SELECT min_salary, max_salary from hr_jobs where job_id = (select job_id from hr_employees where employee_id=$employee_id)";
        $answer = mysqli_query($connection, $query);
        $result = mysqli_fetch_assoc($answer);
        $min_salary = $result['min_salary'];
        $max_salary = $result['max_salary'];
//        echo $min_salary;
//        echo $max_salary;

        if (($employee_id != "") && ($salary != "") && ($phone_number != "") && ($email != "")) {
            if (!($salary < $min_salary or $max_salary < $salary)) {
                $sql = "UPDATE hr_employees SET salary = '$salary', phone_number = '$phone_number',
                        email = '$email' WHERE employee_id = '$employee_id'";
                $return_value = mysqli_query($connection, $sql);
                if (!$return_value) {
                    die('Could not update data: ' . mysqli_error($connection));
                }
                echo "Updated data successfully\n";
            } else{
                die("ERROR: Salary is out of range. ");
            }
        } else{
            die('Please enter values for all fields.');
        }
        mysqli_commit($connection);
        mysqli_close($connection);
    }
    ?>

      <?php
    try {
        require 'mysql_connect.php';
        $query = "SELECT * FROM hr_employees";
        //first pass just gets the column names
        print "<table>&nbsp;";
        $result = $connection->query($query);
        //return only the first row (we only need field names)
        $row = $result->fetch_assoc();
        print "&nbsp;<tr>";
        foreach ($row as $field => $value){
            print " <th>&nbsp;&nbsp;$field</th>";
        } // end foreach
        print "</tr>";
        //second query gets the data
        $data = $connection->query($query);
        $data->fetch_assoc();
        foreach($data as $row){
            print " <tr>";
            foreach ($row as $name=>$value){
                print " <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$value&nbsp;</td>";
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
                <th width="220", align="right">Where Employee ID =</th>
                <td><input name="employee_id" type="text" id="employee_id"></td>
            </tr>
            <tr>
                <th align="right">Update</th>
            </tr>
            <tr>
                <th align="right">Salary =</th>
                <td><input name="salary" type="text" id="salary"></td>
            </tr>
            <tr>
                <th align="right">Phone Number =</th>
                <td><input name="phone_number" type="text" id="phone_number"></td>
            </tr>
            <tr>
                <th align="right">Email =</th>
                <td><input name="email" type="text" id="email"></td>
            </tr>
            <tr>
                <td width="100"> </td>
                <td>
                    <input name="update2" type="submit" id="update2" value="Update">
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
