<?php

include "database.php";
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
           <h3 class="adh">New user registeration</h3>
           <div class="center">
            <?php
                if(isset($_POST["submit"]))
                {
                    
                        $sql="insert into student(NAME,PASS,MAIL,DEP) VALUES('{$_POST["uname"]}','{$_POST["upass"]}','{$_POST["mail"]}','{$_POST["dep"]}')";
                        $db->query($sql);
                        echo "<p class='success'>Registration successfull</p>";

                 }
               
                
            ?>
               <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" >
               <label>Name</label>
               <input type="text" name="uname" required>
               <label >Password</label>
               <input type="password" name="upass" required>
               <label >Email ID</label>
               <input type="email" name="mail" required>
               <label >Department</label>
               <select name="dep">
                   <option value="">select</option>
                   <option value="MBA">MBA</option>
                   <option value="BE CSE">BE CSE</option>
                   <option value="BE CHEM">BE CHEM</option>
                   <option value="BE MECH">BE MECH</option>
                   <option value="IT">IT</option>
                   <option value="BE EEE">BE EEE</option>
                   <option value="BE ECE">BE ECE</option>
                   <option value="others">others</option>
               </select>
               <button type="submit" name="submit">Register</button>
               </form>
           </div>
        
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