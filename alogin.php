<?php 
session_start();
include "database.php" ?>
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
           <h3 class="adh">Admin Login here</h3>
           <div class="center">
            <?php
            if(isset($_POST["submit"]))
            {
                $sql="SELECT * FROM `admin` WHERE ANAME='{$_POST["aname"]}' and APASS='{$_POST["apass"]}'";
                $res=$db->query($sql);
                //it returns the sql queries from database and the res variable in array format
                if($res->num_rows>0)
                {
                    $row=$res->fetch_assoc();
                    $_SESSION["AID"]=$row["AID"];
                    $_SESSION["ANAME"]=$row["ANAME"];
                    header("location:ahome.php");
                }
                else{
                    echo "<p class='error'>Invalid details</p>";
                }
                
            }
            ?>
           <form action="alogin.php" method="post">
           <label>Name</label>
            <input type="text" name="aname" required>
            <label>Password</label>
            <input type="password" name="apass" required>
            <button type="submit" name="submit">Login </button>
           </form></div>
        </div>
        <div class="navi">
                <?php include ("sidebar.php");?>    
               
        </div>
        <div class="foot">
            <p>Copyright &COPY; CIT 2023</p>
        </div>
     </div>
    
</body>
</html>