<?php
/**
 * Created by PhpStorm.
 * User: Happy Shandilya
 * Date: 5/28/2016
 * Time: 9:23 PM
 */
session_start();

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
        //echo"connected to db2";

//to put comment back in sql database

$listId=$_POST['listId'];
$userId=1;  // hard coded since we are already logged and login code is not in scope
$userId=$_SESSION["userId"];
error_log($userId);
error_log($listId);
$comment=$_POST['comment'];
$str = "$comment";
$comment = filter_var($str, FILTER_SANITIZE_STRING); // Removes tags, special characters from a string
function test_input($comment) {
        $comment = trim($comment);
        $comment = stripslashes($comment);
        $comment = htmlspecialchars($comment);
        return $comment;
}
function badWordFilter($comment){
        $originals = array("douche","fuck","damn","fucking","darn","hate");
        $replacements = array("***","***","***");
        $comment = str_ireplace($originals,$replacements,$comment);
        return $comment;
}
$comment = badWordFilter($comment);
error_log('comment'.$comment);
$check= "INSERT INTO ratingtable( listid ,userid,comment) VALUES ('$listId' ,'$userId','$comment')
ON DUPLICATE KEY UPDATE comment='$comment', datetime=now()";
$conn->query($check);
?>
<script> alert("Successfully posted ! Enjoy your day")</script>