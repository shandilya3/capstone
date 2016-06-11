<?php
session_start();
$userId=1;
$_SESSION["userId"]=$userId;
?>
<!DOCTYPE html>
<html>
<head>
        <title>House Listing</title>
        <link rel="stylesheet" href="styles.css">

                <h1 id="h1"><strong>Clientopoly </strong>
                        <img src="to-top.png" alt="Mountain View" style="width:50px;height:50px;"></h1>


                <h2 id="h2">Share us
                        <button class="button blue" onclick="window.location.href='https://www.facebook.com/'">Facebook</button>
                        <button class="button blue" onclick="window.location.href='https://twitter.com/'">Twitter</button>
                </h2>


</head>
<link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<script src="jquery-ui-1.11.1"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <link rel= "stylesheet" type="text/css" href="raty/lib/jquery.raty.css"> </link>
<script src="raty/vendor/jquery.js"></script>
<script src="raty/lib/jquery.raty.js"></script>

<body style="background-color: LightSteelBlue">
<div id="listIds">
        <div class="starClass" id="1"><img  src="images/listhouse.jpg"><br>
                <strong> Your Review About the House</strong>
                <form action="success_review.php" method="post">
                        <input type="hidden" value="1" name="listId">
                        <textarea  rows="10" cols="100" name="comment"></textarea><br>
                        <button>Submit</button>
                </form>
        </div>
        <div class="starClass" id="2"><img  src="images/listing2.png"><br>
                <strong> Your Review About the House</strong>
                <form action="success_review.php" method="post">
                        <input type="hidden" value="2" name="listId">
                        <textarea  rows="10" cols="100" name="comment"></textarea><br>
                        <button>Submit</button>
                </form>

        </div>

        <div class="starClass" id="3"><img  src="images/listing3.jpg"></br>
                <strong> Your Review About the House</strong>
                <form action="success_review.php" method="post">
                        <input type="hidden" value="3" name="listId">
                        <textarea  rows="10" cols="100" name="comment"></textarea><br>
                        <button>Submit</button>
                </form>
        </div>

</div>
<script type = "text/javascript">
        $(document).ready(function(){
                var userId = "<?=$userId?>";
                var scoreMap= new Object();
                var commentMap= new Object();
                $.ajax({
                        async:false,
                        type:'GET',
                        url: 'getdatabase.php',
                        dataType: 'text json',
                        data: {userId:userId},
                        contentType: 'application/json; charset=utf-8',
                        success: function(data){
                                scoreMap=data["score"];
                                commentMap=data["comment"];

                        },
                        error:function(){
                                console.log("we are in error case");
                        }
                });

                $('.starClass').raty({
                        'half': false,
                        'starType': 'i',
                        'score':function() {
                                console.log($(this).attr('id'));
                                console.log(scoreMap[2]);
                                return scoreMap[$(this).attr('id')];
                        },

                        'click': function (score, evt) {
                                var listId = $(this).attr('id');
                                alert("score : " + score + " evt : " + evt +"listId" +listId +"userID"+userId );
                                $.ajax({
                                        method:'POST',
                                        url: 'dbconnection.php',
                                        data: {score: score ,listId:listId,userId:userId},
                                        success: function(data){
                                                //alert("Data Save: " + data );
                                        }
                                });
                        }
                });
                $('.starClass'). each(function(){
                        console.log("comments"+commentMap[$(this).attr('id')]);
                        $(this).find("[name='comment']").text(commentMap[$(this).attr('id')]);
                });
        });


</script>

</body>
</html>