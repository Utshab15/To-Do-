<?php
$hostname="localhost";
$username="root";
$password="";
$db_name="khaiiii";
$conn=mysqli_connect($hostname,$username,$password,$db_name);

if($conn){
    echo "connection successful";
}
else{
    echo "connection failed";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Trip Participants</title>
<style>
    body { font-family: Arial; background-color: #f0f4f8; padding: 20px; }
    h1 { text-align: center; color: #333; }
    .add-button {
        display: block;
        width: 180px;
        margin: 20px auto;
        padding: 10px;
        text-align: center;
        background-color: lightpink;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
    }
    .add-button:hover { background-color: #ff77aa; }
    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 1000px;
        margin: 20px auto;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border-radius: 5px;
        overflow: hidden;
    }
    th, td { border: 1px solid #ddd; padding: 12px; text-align: center; }
    th { background-color: lightpink; color: white; }
    tr:nth-child(even) { background-color: #f9f9f9; }
    tr:hover { background-color: #e1f0ff; }
</style>
</head>
<body>

<h1>Trip Participants</h1>
<a href="createForum.php" class="add-button">Add New Participant</a>

<table>
    <thead>
        <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>other</th>
        </tr>
    </thead>
    <tbody>
  <?php
  $sql = "SELECT * FROM trip";
  $res=mysqli_query($conn,$sql);
$counter=0;
if($res && mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_assoc($res)){

?>

<tr>
    <td><?php echo ++$counter; ?></td>
    <td> <?php echo $row['name'] ?> </td>
    <td> <?php echo $row['age'] ?> </td>
    <td> <?php echo $row['gender'] ?> </td>
    <td> <?php echo $row['email'] ?> </td>
    <td> <?php echo $row['phone'] ?> </td>
    <td> <?php echo $row['other'] ?> </td>
    </tr>
    <?php
    }
}
    ?>
    </tbody>
</table>

</body>
</html>
