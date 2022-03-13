<?php
require_once "db.php";
$conn = OpenCon();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    global $safe;
    if ($safe == 1) {
        $sql = "SELECT * FROM safe";
    } else {
        $sql = "SELECT * FROM notSafe";
    }
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            print("<tr class='text-white text-center'>");
            print("<td scope='row'>" . $row['id'] . "</td>" . "<td scope='row'>" . $row['username'] . "</td>" . "<td scope='row'>" . $row['password'] . "</td>" . "<td scope='row'>" . $row['message'] . "</td>");
            print("</tr>");
        }
    }
    CloseCon($conn);
}