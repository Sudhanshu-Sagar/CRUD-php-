<html>
    <head>
        <title> Display></title>
        <style>
          body{
                 background-color:#D071f9;
          }
          table{
            background-color:white;
          }

          h2{
            text-align:center;
          }

          table{
             border:2px solid black;
             cellpadding:10px;
             width:80%;
             margin:0 auto;
          }
          th,td{
            border:2px solid black;
            text-align:center;
          }
          .update{
            background-color:green;
            outline:none;
            border-radius:5px;
            color:white;
            border:0;
            height:22px;
            width:80px;
            cursor: pointer;
            font-weight:bold;
         }
  
          #del{
             background-color:red;
          }
    
          </style>
          </head>
<?php
include("conn.php");
$query="select * from record";
$data=mysqli_query($conn,$query);

$total=mysqli_num_rows($data);



if($total != 0)
{
    ?>
    <h2 ><mark> Displaying All Records </mark></h2>
    <table>
        <tr>
            <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Operation</th>
</tr>
    <?php
    while($result=mysqli_fetch_assoc($data))
    {
         echo "
    <tr>
         <td>".$result['id']."</td>
         <td>".$result['FirstName']."</td>
         <td>".$result['LastName']."</td>
         <td>".$result['Gender']."</td>
         <td>".$result['Email']."</td>
         <td>".$result['Phone']."</td>
         <td><a href='update.php?id=$result[id]'><input type='submit' value='Update' class='update'></a>
         <a href='delete.php?id=$result[id]'><input type='submit' id='del' value='Delete' class='update' onclick='return checkDelete()'></a>
         </td>
    </tr>
         ";
    }
    
}
else
{
    echo "Table has no records";
}
?>

</table>

</html>

<script>
    function checkDelete()
    {
        return confirm('Are you sure you want to delete?');
    }
</script>