<?php
session_start();
include "database.php";

if(!isset($_SESSION["ID"]))
{
    header("location:ulogin.php");//if the session variables match in ulogin then it will moves to user home page else in the same page
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
           <h3 class="adh">Welcome <?php echo $_SESSION["NAME"];?> </h3>
           <div class="center">
          
              <p>"A reader lives a thousand lives before he dies, said Jojen. The man who never reads lives only one." </p>
              <p style="padding: 2px 0px 0px 550px;">- George R.R. Martin</p>
              <div class="c">
             <div>
              <img src="lib.jpeg" alt="">
            </div>
                <div style="padding:2px 0px 0px 50px;;">
                      <p>Search for your books and give your comments</p>
                      <p>Need of any books ? kindly mention your books you need in detail</p>
                      <p>For any queries or help contact us !  <a href="mailto:71762105048@cit.edu.in">click here</a></p>
                      
                </div>
              </div>
           </div>
        </div>
        <div class="navi">
                <?php include ("usersidebar.php");?>    
               
        </div>
        <div class="foot">
            <p>Copyright &COPY; CIT 2023</p>
        </div>
     </div>
    
</body>
</html>