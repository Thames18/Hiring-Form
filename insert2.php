<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "test");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
 // Escape user inputs for security
$job_id = mysqli_real_escape_string($link, $_REQUEST['job_id']);
$job_title = mysqli_real_escape_string($link, $_REQUEST['job_title']);
$min_salary = mysqli_real_escape_string($link, $_REQUEST['min_salary']);
$max_salary = mysqli_real_escape_string($link, $_REQUEST['max_salary']);




// Attempt insert query execution
$sql = "INSERT INTO hr_jobs (job_id, job_title, min_salary, max_salary)
 VALUES ('$job_id', '$job_title', '$min_salary', '$max_salary' )";
if(mysqli_query($link, $sql)){
    echo "A  new job has been created.";
    mysqli_commit($link);
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>