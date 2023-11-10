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
           <h3 class="adh">View Books details</h3>
           <?php
             $sql="select * from book";
             $res=$db->query($sql);
             if($res->num_rows>0)
             {
                  echo"<table>
                  <tr>
                  <th>SNO</th>
                  <th>BOOKNAME</th>
                  <th>KEYWORDS</th>
                  <th>VIEW</th>
                  </tr>";
                  $i=0;
                  while($row=$res->fetch_assoc())
                  {
                    $i++;
                    echo"<tr>";
                    echo"<td>{$i}</td>";
                    echo"<td>{$row["BTITLE"]}</td>";
                    echo"<td>{$row["KEYWORDS"]}</td>";
                    echo"<td><a href='{$row["FILE"]}' target= '_blank' >view</a></td>";//which helps in viewing in new tab
                    echo"</tr>";
                    
                  }
                  echo"</table>";
                 
             }
             else{
                echo "<p class='error'>No Book record is found</p>";
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