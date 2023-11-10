<?php
session_start();
include "database.php";
function countRecord($sql,$db)
{
    $res=$db->query($sql);
    return $res->num_rows;
}
if(!isset($_SESSION["AID"]))
{
    header("location:alogin.php");//if the session variables match in alogin then it will moves to admin home page else in the same page
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="pro.css" rel="stylesheet"/>
    <title>E-library</title>
</head>
<body>
    <div class="contai">
        <div class="heading">
          <h1>E-Library Management System</h1>
        </div>
        <div class="wrap">
           <h3 class="adh">Welcome admin</h3>
           <div class="center">
            <ul>
                <li>Total students : <?php echo countRecord("select * from student",$db); ?></li>
                <li>Total books : <?php echo countRecord("select * from book",$db); ?></li>
                <li>Total request : <?php echo countRecord("select * from request",$db); ?></li>
                <li>Total comments : <?php echo countRecord("select * from comment",$db); ?></li>
                
            </ul>
           </div>
        </div>
        <div class="navi">
                <?php include ("adminsidebar.php");?>    
               
        </div>
        <div class="foot">
            <p>Copyright &COPY; CIT 2023</p>
        </div>
     </div>
    
</body>
</html>