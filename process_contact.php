
<?php
    include('config.php');
    extract($_POST);
   $qry=mysqli_query($con,"insert into contact values(NULL,'$name','$email',$mobile','$subject')");
?>