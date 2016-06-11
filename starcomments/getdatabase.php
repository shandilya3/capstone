
<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dberror1="could not connect to database";
$dberror2="could not  found selected table";
$conn=mysqli_connect($dbhost,$dbuser,$dbpass) or die ($dberror1);
$select_db=mysqli_select_db($conn,'db2') or die ($dberror2);
$userId=$_GET['userId'];
$sql = "SELECT score,listid,comment FROM ratingtable WHERE userid='$userId'";
$result = $conn->query($sql);
$numbRows = $result->num_rows;
$scoreMap = array();
$commentMap= array();
$responseMap= array();
for ($j = 0; $j < $numbRows; ++$j) {
        $result->data_seek($j);
        $currentRow = $result->fetch_array(MYSQLI_NUM);
        $scoreMap[$currentRow[1]] = $currentRow[0];
        $commentMap[$currentRow[1]] = $currentRow[2];
}
$responseMap["score"] = $scoreMap;
$responseMap["comment"] = $commentMap;
echo json_encode($responseMap);




?>


