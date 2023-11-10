<?php
session_start();
include "database.php";

if(!isset($_SESSION["ID"]))
{
    header("location:ulogin.php");//if the session variables match in ulogin then it will moves to user home page else in the same page and noone can access directly the user home page by simply writing in serach bar
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
           <h3 class="adh">Book request</h3>
           <div class="center">
            <?php
                if(isset($_POST["submit"]))
                {
                    $sql= $sql="insert into request(ID,MES,LOGS) VALUES({$_SESSION["ID"]},'{$_POST["msg"]}',now())";
                    $db->query($sql);
                    
                         echo "<p class='success'>request sent!</p>";
                    
                }
            ?>
               <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
               
               <label>Message </label>
               <textarea name="msg" required></textarea>
               
               <button type="submit" name="submit">submit</button>
               </form>
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