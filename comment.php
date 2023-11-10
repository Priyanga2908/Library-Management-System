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
           <h3 class="adh">Send Comments</h3>
           <?php

if(isset($_POST["submit"]))
{
    
        $sql="insert into comment(BID,SID,COMM,LOGS) VALUES({$_GET["id"]},'{$_SESSION["ID"]}','{$_POST["msg"]}',now())";
        $db->query($sql);
       

 }
                  $sql="SELECT * from BOOK where BID=".$_GET["id"];
                  $res=$db->query($sql);
                  if($res->num_rows>0)
                  {
                    echo"<table>";
                    $row=$res->fetch_assoc();
                    echo "
                        <tr>
                        <th>Book name</th>
                        <td>{$row["BTITLE"]}</td>
                        </tr>
                        <tr>
                        <th>Keywords</th>
                        <td>{$row["KEYWORDS"]}</td>
                        </tr>";
                        
                        echo"</table>";
                  }
                  else{
                    echo "<p class='error'>No Book found</p>";
                  }
              ?>
              <div class="center">
              <form action="<?php echo $_SERVER["REQUEST_URI"];?>" method="post">
               
               <label>Comments below</label>
               <textarea name="msg" required></textarea>
               
               <button type="submit" name="submit">post</button>
               </form>
           </div>
           <?php
             $sql="SELECT student.NAME ,comment.COMM,comment.LOGS from comment inner join student on comment.SID=student.ID where comment.BID={$_GET["id"]} order by comment.CID desc";
             $res=$db->query($sql);
             if($res->num_rows>0)
             {

                while($row=$res->fetch_assoc())
                {
                    
                    echo "<p><strong>{$row["NAME"]} : </strong>{$row["COMM"]}
                    <i>{$row["LOGS"]}</i></p>";
                    
                    
                }
             }
           else{
            echo "<p class='error'>No comments yet...</p>";
           }
           
           ?>
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