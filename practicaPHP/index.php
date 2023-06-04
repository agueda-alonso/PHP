<!DOCTYPE html>

<html lang="ES-es">
<head>
    <meta charset="UTF-8"/>
    <title>Formulario PHP con validación</title>
	<link rel="stylesheet" type="text/css" href="form.css">
</head>

<body>
<header>Formulario PHP con validación</header>

<form method="post" action="index.php" id="form" class="topBefore" >
	<input id= "text" type="text" name="nombre" placeholder="NOMBRE" required>
	<input id= "email" type="email" name="email" placeholder="EMAIL" required>
    <input id="submit" type="submit" name="submit" value="¡Vamos!">

</form>
</body>
</html>



<?php
if($_POST){
$nombre = $_POST['nombre'];
$email = $_POST['email'];

// Conexión BBDD
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agueda";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
   
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// Consulta BBDD
  $sql = "INSERT INTO socios (nombre, email)
  VALUES ('$nombre', '$email')";
  
  if ($conn->query($sql) === TRUE) { 
      echo "Nueva entrada creada con éxito.";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }  

// Cerrar conexión BBDD 
$conn->close();

}
?>