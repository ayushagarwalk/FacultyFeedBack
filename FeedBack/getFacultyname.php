<?php
require("PHP/Connection.php");
session_start();
 if($_SESSION['sid']==session_id())
   {      
     
     if($_SESSION["UserType"]=="Admin")
     {

        $dept=$_GET['dept'];
        $namesquery="SELECT Fid,FacultyName FROM `faculty` WHERE Dept='$dept';";
        $namesres=mysqli_query($con,$namesquery);
        $n=mysqli_num_rows($namesres);
        while ($n >0) { 	
        $names=mysqli_fetch_assoc($namesres);
        echo $names["Fid"].".".$names["FacultyName"]."^";
        $n--;
        
     }
   
   }
     else
        {
        header("Location:adminlogin.php");
      }  
   }
     
   else
   {
      header("Location:adminlogin.php");
   }   



?>