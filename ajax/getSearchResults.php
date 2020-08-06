<?php
require_once("../includes/config.php");
require_once("../includes/classes/SearchResultsProvider.php");
require_once("../includes/classes/EntityProvider.php");
require_once("../includes/classes/Entity.php");
require_once("../includes/classes/PreviewProvider.php");
if(isset($_POST["term"])&& isset($_POST["email"])) {
   $srp = new SearchResultsProvider($con,$_POST["email"]);
   echo $srp->getResults($_POST["term"]);
}
else{
    echo"No term or email passed into file";
}
?>