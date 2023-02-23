
<html>
    <head>
        
    </head>
    <body>
        <form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label>ID</label><input type="text" name= "id"/><br>
        <label>Name</label><input type ="text" name ="name"/><br>
        <label>TagNumber</label><input type ="number" name="tnumber"/><br>
        <label>Department</label><input type="text" name="department"/><br>
        <input type="submit" value="submit">

        </form>
    </body>
</html>



<?php

$id = $_POST["id"];
$name =$_POST["name"];
$tnumber=$_POST["tnumber"];
$department=$_POST["department"];

echo "ID=".$id.  "Name=".$name. "TagNumber=".$tnumber. "Department=".$department;

$servername ="localhost";
$username = "root";
$password="";
$dbname="db6";

//connect to db
$conn = new mysqli($servername,$username,$password,$dbname);

//check connection
if(!$conn){
    die ("connection error:" . mysqli_connect_error());
}else{
    //echo "connection succesfull";
}

//prepare and bind
$stmt = $conn->prepare("INSERT INTO table7(name, tnumber, department)VALUES(?,?,?)");
$stmt->bind_param("sss",$name,$tnumber,$department);
$stmt->execute();

$sql_select="SELECT * FROM table6";
$result=$conn->query($sql_select);

if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        echo "name:" . $row['name'] ."<br/>";
    }
}else{
    echo "0 results";
}

echo "records created succesfully";

$stmt->close();
$conn->close();



?>