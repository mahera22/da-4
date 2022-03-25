<?php
    $connect = mysqli_connect("localhost", "root", "", "viteee");
    $query = mysqli_query($connect, "select * from vit_course");
    echo "<table><tr><th>Course Name</th><th>VelloreSeats</th><th>Chennai Seats</th></tr>";
    while(($row = mysqli_fetch_array($query)))
    echo "<tr><td>" . $row[0] . "</td><td style=\"text-align:center;\">" . $row[1] . "</td><td style=\"text-align: center;\">" .
    $row[2] . "</td></tr>";
    echo "</table>";
?>