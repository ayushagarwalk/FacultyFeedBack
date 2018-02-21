<?php
require("PHP/Connection.php");
session_start();
 if($_SESSION['sid']==session_id())
   { 
      if($_SESSION["UserType"]=="Student")
      {
           
  $feed=array('Atr1' =>$_POST['attr1'] ,'Atr2'=>$_POST["attr2"],'Atr3'=>$_POST["attr3"],'Atr4'=>$_POST["attr4"],'Atr5'=>$_POST["attr5"],'Remarks'=>$_POST["remarks"],'Fid'=>$_POST["Fid"]);
  
   
  $query="INSERT INTO `feedback`.`feeds`(`Atr1`,`Atr2`,`Atr3`,`Atr4`,`Atr5`,`Remarks`,`Fid`)VALUES('".$feed['Atr1']."','".$feed['Atr2']."','".$feed['Atr3']."','".$feed['Atr4']."','".$feed['Atr5']."','".$feed['Remarks']."','".$feed['Fid']."');";

     $r=mysqli_query($con,$query);
    if($r) {
       
       $query1="UPDATE `feedback`.`students` SET `ResetFlag`='1' WHERE Rollno='".$_SESSION['Rollno']."';";
       $res=mysqli_query($con,$query1);
       if($res){	
           echo "inserted Successful";
          exit;
   }
   }
}
}
?>
