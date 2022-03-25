<?php
$connect = mysqli_connect("localhost", "root", "", "viteee");
if(!$connect){
    die("connection failed");
}
$name = $_GET['name'];
$reg = $_GET['regno'];
$course = $_GET['course'];
$marks = $_GET['marks'];
$campus = $_GET['campus'].'Seats';
if(mysqli_fetch_array(mysqli_query($connect, "select CutoffMarks from vit_course where CourseName = '$course'"))[0]>$marks){
die("Sorry, your marks are not up to the cutoff marks");
}
try{
$records = mysqli_query($connect, "select $campus from vit_course where CourseName = '$course'");
$newRecord = mysqli_fetch_array($records)[0] - 1;
if($newRecord <= -1){
    $campus = substr($campus, 0,7);
    die("Sorry no seats avaiable for $course in $campus");
}
mysqli_query($connect, "insert into vitreg
values('$name', '$reg', '$campus', $marks, '$course')");
$query = mysqli_query($connect, "update vit_course set $campus = $newRecord where CourseName = '$course'");
} catch (Exception $e){
$app_course = mysqli_fetch_array(mysqli_query($connect, "select ApprovedCourse from vitreg where RegNo = $reg"))[0];
die("Your registration number has already been alloted to $app_course course");
}
echo "<h2 style = \"padding: 2rem 0; color: #2B2118\">You've been
successfully registered</h2>";
include("display.php");
?>