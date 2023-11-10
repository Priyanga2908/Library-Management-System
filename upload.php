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
           <h3 class="adh">Uplaod books</h3>
           <div class="center">
            <?php
                if(isset($_POST["submit"]))
                {
                    $target_dir="upload/";
                    $target_file=$target_dir.basename($_FILES["efile"] ["name"]);
                    if(move_uploaded_file($_FILES["efile"] ["tmp_name"],$target_file))
                    {
                        $sql="insert into book(BTITLE,KEYWORDS,FILE) VALUES('{$_POST["bname"]}','{$_POST["key"]}','{$target_file}')";
                        $db->query($sql);
                        echo "<p class='success'>book uploaded</p>";

                    }
                    else{
                        echo "<p class='error'>error in uploading book</p>";
                    }
                }
            ?>
               <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
               <label>Book title</label>
               <input type="text" name="bname" required>
               <label >keyword</label>
               <textarea name="key" required></textarea>
               <label>upload file</label>
               <input type="file" name="efile" required>
               
               <button type="submit" name="submit">Upload book</button>
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