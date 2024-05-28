<?php include("conn.php"); 

$id=$_GET['id'];
$query="select * from record where id='$id'";
$data=mysqli_query($conn,$query);

$total=mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="#" method="post">
      <div class="title">
        Upadte Details
      </div>

<div class="form">
   <div class="input_field">
    <label> First Name</label>
    <input type="text" name="fname"class="input" value="<?php echo $result['FirstName']; ?>" required>
   </div>
   <div class="input_field">
    <label> Last Name</label>
    <input type="text" name="lname" class="input" value="<?php echo $result['LastName']; ?>" required>
   </div>
   <div class="input_field">
    <label> Password</label>
    <input type="password" name="pass" class="input" value="<?php echo $result['Password']; ?>" required>
   </div>
   <div class="input_field">
    <label> Confirm Password</label>
    <input type="password" name="conpass" class="input" value="<?php echo $result['ConfirmPassword']; ?>" required>
   </div>
   <div class="input_field">
    <label>Gender</label>
    <div class="selectbox">
    <select name="gender" required>
    <option value="" disabled selected>Select</option>
        <option value="male"
        <?php 
        if ($result['Gender'] == 'male')
        {
            echo "selected";
        }
       ?>
        >Male</option>
        <option value="female"
        <?php 
        if ($result['Gender'] == 'female')
        {
            echo "selected";
        }
       ?>
        >Female</option>
</select>
</div>
   </div>
   <div class="input_field">
    <label> Email Address</label>
    <input type="email" name="email" class="input" value="<?php echo $result['Email']; ?>" required >
   </div>
   <div class="input_field">
    <label>Phone Number</label>
    <input type="number" name="phone" class="input" value="<?php echo $result['Phone']; ?>" required>
   </div>

   <div class="input_field terms">
    <label class="check">
    <input type="checkbox" required>
    <span class="checkmark"></span>
         </label>
  <p>Agree to terms and conditions.</p>
    </div>
    <div class="input_field">
        <input type="submit" value="Update" name="update" class="btn"> 
    </div>
</div>
</form>
</div> 
</body>
</html>

<?php
if (isset($_POST['update']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $pwd=$_POST['pass'];
    $cpwd=$_POST['conpass'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];


if($fname!="" && $lname!="" && $pwd!="" && $cpwd!="" && $gender!="" && $email!="" && $phone!="")
{

 $query="UPDATE record SET FirstName='$fname',LastName='$lname',Password='$pwd',ConfirmPassword='$cpwd',Gender='$gender',Email='$email',Phone='$phone' WHERE id='$id'";
 $data=mysqli_query($conn,$query);
if($data)
{
    echo "<script>
                    alert('Data Updated successfully');
                    window.location.href = 'display.php';
                  </script>";
}
else
{
    echo "failed";
}
}

else{
    echo "failed";
}
}
?>