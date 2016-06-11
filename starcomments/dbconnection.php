
<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dberror1="could not connect to database";
$dberror2="could not  found selected table";

$conn=mysqli_connect($dbhost,$dbuser,$dbpass) or die ($dberror1);

if($conn==true)	echo "we are in, good job !";
else echo "try again ,don't give up !";

$select_db=mysqli_select_db($conn,'db2') or die ($dberror2);
if($select_db==true)
        echo"connected to db2";
//to put data back in sql database
$score= $_POST['score'];
$listId=$_POST['listId'];
$userId=$_POST['userId'];
$location=$_POST['location'];
$check= "INSERT INTO ratingtable(score, listId ,userId, location) VALUES ('$score','$listId' ,'$userId','$location')
ON DUPLICATE KEY UPDATE score=$score, datetime=now()";
$conn->query($check);
?>