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
           <h3 class="adh">View students details</h3>
           <?php
             $sql="select * from student";
             $res=$db->query($sql);
             if($res->num_rows>0)
             {
                  echo"<table>
                  <tr>
                  <th>SNO</th>
                  <th>NAME</th>
                  <th>EMAIL</th>
                  <th>DEPARTMENT</th>
                  </tr>";
                  $i=0;
                  while($row=$res->fetch_assoc())
                  {
                    $i++;
                    echo"<tr>";
                    echo"<td>{$i}</td>";
                    echo"<td>{$row["NAME"]}</td>";
                    echo"<td>{$row["MAIL"]}</td>";
                    echo"<td>{$row["DEP"]}</td>";
                    echo"</tr>";
                    
                  }
                  echo"</table>";
                 
             }
             else{
                echo "<p class='error'>No student record is found</p>";
             }
           ?>
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