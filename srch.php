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
           <h3 class="adh">Search for books</h3>
           <div class="center">
                
               <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
               
               <label>Enter book Name or Keywords</label>
               <input type="text" name="msg" required>
               
               <button type="submit" name="submit">Search now</button>
               </form>
           </div>
           <?php
                if(isset($_POST["submit"]))
                {
          
             $sql="select * from book where BTITLE like'%{$_POST["msg"]}%' OR keywords like'%{$_POST["msg"]}%'";
             $res=$db->query($sql);
             if($res->num_rows>0)
             {
                  echo"<table>
                  <tr>
                  <th>SNO</th>
                  <th>BOOKNAME</th>
                  <th>KEYWORDS</th>
                  <th>VIEW</th>
                  <th>COMMENT</th>
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
                    echo "<td><a href='comment.php?id={$row["BID"]}'>Go</a></td>";
                    echo"</tr>";
                    
                  }
                  echo"</table>";
                 
             }
             else{
                echo "<p class='error'>No Book record is found</p>";
             }}
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