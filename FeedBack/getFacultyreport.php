<?php

require("PHP/Connection.php");
session_start();
 if($_SESSION['sid']==session_id())
   {      
     
     if($_SESSION["UserType"]=="Admin")
     {

        $Fid=$_GET['Fid'];
       
        $namesquery="SELECT `feeds`.`Atr1`,`feeds`.`Atr2`,`feeds`.`Atr3`,`feeds`.`Atr4`,`feeds`.`Atr5`,`feeds`.`Remarks` FROM `feedback`.`feeds`,`feedback`.`faculty` WHERE feeds.Fid=faculty.Fid AND faculty.Fid='$Fid' AND feeds.FeedFlag='0';";
        $reportres=mysqli_query($con,$namesquery);
        $n=mysqli_num_rows($reportres);
        $Atr1=$Atr2=$Atr3=$Atr4=$Atr5="";
        $Remarks=array();
        $i=0;
        while ($n>0) {
          $row=mysqli_fetch_assoc($reportres);
          $Atr1+=$row["Atr1"];
          $Atr2+=$row["Atr2"];
          $Atr3+=$row["Atr3"];
          $Atr4+=$row["Atr4"];
          $Atr5+=$row["Atr5"];
          $Remarks[$i]=$row["Remarks"];  
         $n--;
         $i++;
        }
       $AAtr1=$AAtr2=$AAtr3=$AAtr4=$AAtr5="";
       $AAtr1=$Atr1/$i; 
       $AAtr2=$Atr2/$i; 
       $AAtr3=$Atr3/$i; 
       $AAtr4=$Atr4/$i; 
       $AAtr5=$Atr5/$i; 
       $Remarks=array_unique($Remarks);
       echo $AAtr1."#".$AAtr2."#".$AAtr3."#".$AAtr4."#".$AAtr5."#";
       foreach ($Remarks as $value) {
           echo $value."^";
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