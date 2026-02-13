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
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $description=$_POST['description'];
    $sql="INSERT INTO trip (name,age,gender,email,phone,description) VALUES ('$name','$age','$gender','$email','$phone','$description')";
    $res=mysqli_query($conn,$sql);  
    if($res){
        echo "data inserted successfully";
    }
    else{
        echo "data insertion failed";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to travel form</h1>
        <p>enter your details and submit this form to confirm your participation in the trip</p>
        <form action="createForum.php" method="post">

            <label  for="name">Name:</label>
            <input type="text" name="name" id="name" placeholder="enter your name">

             <label  for="age">Age:</label>
            <input type="text" name="age" id="age" placeholder="enter your age">

         <label  for="gender">Gender:</label>
            <input type="text" name="gender" id="gender" placeholder="enter your gender">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="enter your email">

            <label for="phone">Phone:</label>
            <input type="tel" name="phone" id="phone" placeholder="enter your phone details">

             <label for="desc">Description:</label>
            <textarea name="description" id="other" cols="30" rows="10" placeholder="enter other information"></textarea>

<button type="submit" name="submit" class="btn">submit</button>
<button class="reset">reset</button>
        </form>
    </div>
</body>
</html>