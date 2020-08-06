<?php
require_once("../includes/config.php");
if(isset($_POST["videoId"])&& isset($_POST["email"])){
$query = $con->prepare("SELECT * FROM videoProgress
                                WHERE email =:email AND videoId=:videoId");
$query->bindValue(":email",$_POST["email"]);
$query->bindValue(":videoId",$_POST["videoId"]);
$query->execute();
if($query->rowCount()==0){
    
    $query=$con->prepare("INSERT INTO videoProgress(email,videoId)
                          VALUES(:email,:videoId)");
    $query->bindValue(":email",$_POST["email"]);
    $query->bindValue(":videoId",$_POST["videoId"]);
    $query->execute();
}
}
else{
    echo"No videoID or email passed into file";
}
?>