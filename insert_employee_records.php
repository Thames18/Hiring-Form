<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "admin", "hr_schema");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 // Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$phone_number = mysqli_real_escape_string($link, $_REQUEST['phone_number']);
$hire_date = mysqli_real_escape_string($link, $_REQUEST['hire_date']);
$salary = mysqli_real_escape_string($link, $_REQUEST['salary']);
$job_id = mysqli_real_escape_string($link, $_REQUEST['job_id']);
$manager_id = mysqli_real_escape_string($link, $_REQUEST['manager_id']);
$department_id = mysqli_real_escape_string($link, $_REQUEST['department_id']);
// Salary Verification Check
$query = "SELECT min_salary, max_salary from hr_jobs where job_id=$job_id";
$answer = mysqli_query($link, $query);
$result = mysqli_fetch_assoc($answer);
$min_salary = $result['min_salary'];
$max_salary = $result['max_salary'];
//echo $min_salary;
//echo $max_salary;
// Attempt insert query execution
if (!($salary < $min_salary or $max_salary < $salary)) {
    $sql = "INSERT INTO hr_employees (first_name, last_name, email, phone_number, hire_date, salary, job_id, manager_id, department_id)
     VALUES ('$first_name', '$last_name', '$email', '$phone_number' , '$hire_date' , '$salary',  '$job_id',  '$manager_id',  '$department_id')";
    if (mysqli_query($link, $sql)) {
        echo "Records added successfully.";
        mysqli_commit($link);
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
} else{
    echo "ERROR: Salary is out of range. ";
}
mysqli_commit($link);
// Close connection
mysqli_close($link);
?>