<?php
session_start();
include "database.php";

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
           <h3 class="adh">Change Password</h3>
           <div class="center">
            <?php
                if(isset($_POST["submit"]))
                {
                    $sql="SELECT * from admin where APASS='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";
                    $res=$db->query($sql);
                    if($res->num_rows>0)
                    {
                         $s="UPDATE admin set APASS='{$_POST["npass"]}' where AID=".$_SESSION["AID"];//CONCATENATING PASSWORD
                         $db->query($s);
                         echo "<p class='success'> password changed</p>";
                    }
                    else
                    {
                         echo "<p class='error'>Invalid password</p>";
                    }
                }
            ?>
               <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
               <label>old password</label>
               <input type="password" name="opass" required>
               <label>New password</label>
               <input type="password" name="npass" required>
               <button type="submit" name="submit">Update password</button>
               </form>
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