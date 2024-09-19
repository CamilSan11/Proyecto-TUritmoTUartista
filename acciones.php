<<?php
include 'include/conecta.php'; // Asegúrate de que este archivo contiene la conexión correcta a la base de datos.

if (isset($_POST['btn_ingresa'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Verificación de campos vacíos usando empty()
    if (empty($usuario)) {
        echo "El campo usuario está vacío";
    } else if (empty($password)) {
        echo "El campo password está vacío";
    } else {
        // Consulta SQL para verificar el usuario y la contraseña
        $login = "SELECT usuario, password FROM usuarios WHERE usuario='$usuario' AND password='$password'";
        
        $resultado = mysqli_query($con, $login); // Ejecutar la consulta

        if (!$resultado) {
            // Si hay un error en la consulta
            echo "Error en la consulta: " . mysqli_error($con);
        } else if (mysqli_num_rows($resultado) > 0) {
            // Si se encuentra un usuario con la contraseña
            echo "Usuario autenticado exitosamente";
            header("Location: app.php"); // Redirigir a la página de app
            exit;
        } else {
            // Si no se encuentra el usuario
            echo "Usuario o contraseña incorrectos";
        }
    }
}
?>

