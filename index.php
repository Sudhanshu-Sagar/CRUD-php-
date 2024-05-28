<?php include("conn.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="#" method="post">
      <div class="title">
        Registration Form
      </div>

<div class="form">
   <div class="input_field">
    <label> First Name</label>
    <input type="text" name="fname"class="input" required>
   </div>
   <div class="input_field">
    <label> Last Name</label>
    <input type="text" name="lname" class="input" required>
   </div>
   <div class="input_field">
    <label> Password</label>
    <input type="password" name="pass"class="input" required>
   </div>
   <div class="input_field">
    <label> Confirm Password</label>
    <input type="password" name="conpass" class="input" required>
   </div>
   <div class="input_field">
    <label>Gender</label>
    <div class="selectbox">
    <select name="gender" required>
    <option value="" disabled selected>Select</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
</select>
</div>
   </div>
   <div class="input_field">
    <label> Email Address</label>
    <input type="email" name="email" class="input" required >
   </div>
   <div class="input_field">
    <label>Phone Number</label>
    <input type="number" name="phone" class="input" required>
   </div>

   <div class="input_field terms">
    <label class="check">
    <input type="checkbox" required>
    <span class="checkmark"></span>
         </label>
  <p>Agree to terms and conditions.</p>
    </div>
    <div class="input_field">
        <input type="submit" value="Register" name="register" class="btn"> 
       
    </div>
</div>
</form>
</div> 
</body>
</html>

<?php
if (isset($_POST['register']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $pwd=$_POST['pass'];
    $cpwd=$_POST['conpass'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];


    if ($fname != "" && $lname != "" && $pwd != "" && $cpwd != "" && $gender != "" && $email != "" && $phone != "") {
        $query = "INSERT INTO record (FirstName, LastName, Password, ConfirmPassword, Gender, Email, Phone) VALUES ('$fname', '$lname', '$pwd', '$cpwd', '$gender', '$email', '$phone')";
        $data = mysqli_query($conn, $query);

        if ($data) {
            echo "<script>
                    alert('Data inserted successfully');
                    window.location.href = 'display.php';
                  </script>";
        } else {
            echo "<script>alert('Failed to insert data');</script>";
        }
    } else {
        echo "<script>alert('Please enter all required fields');</script>";
    }
}
?>