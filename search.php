<?php
include_once("includes/header.php");
?>
<div class="textboxContainer">
    <input type="text" class="searchInput" placeholder="Search for Movies,TV Shows and Much more!!">
</div>

<div class="results"></div>

<script>
    $(function(){
         var email = '<?php echo $userLoggedIn;?>';
         var timer;
         $(".searchInput").keyup(function(){
          clearTimeout(timer);
          timer = setTimeout(function(){
              var val = $(".searchInput").val();
              if(val != ""){
               $.post("ajax/getSearchResults.php",{term:val,email:email},function(data){
                $(".results").html(data);  
               })
              }
              else{
                  $(".results").html("");
              }
          },500);
         })
    })
</script>