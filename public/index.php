<?php
require '../backend/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = $_POST['nombre']; // CAMBIO: usar "nombre"
  $pin = $_POST['pin'];

  if (login($nombre, $pin)) {
      $rol = $_SESSION['user']['rol'];
      header("Location: $rol.php");
      exit;
  } else {
      $error = "PIN incorrecto";
  }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Punto de Venta</title>
  <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
  <main class="main-container">
    <section class="section-empleados">
      <div class="contenido-empleados">
        <h1>Empleados</h1>
        <ul class="lista-empleados">
          <li>
            <strong>Alan Dominguez</strong>
            <p>Floor Manager</p>
          </li>
          <li>
            <strong>Fabian Urich</strong>
            <p>Cocinero</p>
          </li>
          <li>
            <strong>Hanna</strong>
            <p>Mesero</p>
          </li>
        </ul>
      </div>
    </section>

    

    <section class="login-container">
      <h1>Wacho's <br><span>Feliz Turno</span></h1>
      <form method="POST">
      <input name="nombre" placeholder="Ingresa tu nombre" type="text" required>
      <input name="pin" placeholder="Ingresa tu PIN" type="password" required>
      <button type="submit">Entrar</button>

      
</form>

      
    </section>
  </main>

  <script src="js/login.js"></script>
</body>
</html>
