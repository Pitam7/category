<?php 
include('dbconn.php');
if(isset($_POST['submit']))
{
    
    
$name = $_POST['catname'];
$parent = $_POST['parentcat'];

$sql = "INSERT INTO `values`(`tech`, `parent_id`) VALUES ('$name','$parent')";
    
    
    $result = mysqli_query($conn,$sql);
    
    if($result)
    {
        echo '<script>alert("Inserted")</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert</title>
</head>
<body align="center" style="margin-top:100px;">
   <h1>Make Categories</h1>
    <form action="" method="post">
        
        <label for="">Parent Category</label>
        <select name="parentcat" id="">
            <option value="">Select Category</option>
            <option value="0">None</option>
            
            <?php 
            $sqldata="SELECT * FROM `values`";
            $result = mysqli_query($conn,$sqldata);
            while($cat=mysqli_fetch_array($result))
            {
            ?>
            <option value="<?php echo $cat['id'];?>"><?php echo $cat['tech'];?></option>
            <?php } ?>
        </select>
        
        <label for=""></label>
        <input type="text" name="catname">
        <input type="submit" name="submit">
    </form><br><br>
    
    <button><a href="output.php">To see the tree</a></button>
</body>
</html>