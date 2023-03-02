<?php 
include('dbconn.php');
function showcategory($parentid)
{
    $sql = "SELECT * FROM `values` WHERE `parent_id`='".$parentid."'";
    $result = mysqli_query($GLOBALS['conn'],$sql); 
    $output="<ul>\n";
    while($data=mysqli_fetch_array($result))
    {
        $output.="<li>\n".$data['tech'];
        $output.=showcategory($data['id']);
        $output.="</li>";
    }
    $output.="</ul>";
    return $output;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Output</title>
</head>
<body >
  <h1>The Tree</h1>
   <?php
        echo showcategory(0);
    ?>
    <br>
    <button><a href="index.php">To input a new node</a></button>
</body>
</html>