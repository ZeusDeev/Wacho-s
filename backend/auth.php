<?php
session_start();
require 'db.php';

/**
 * Autenticación usando solo ID de empleado y PIN.
 *
 * @param int $empleado_id
 * @param string $pin
 * @return bool
 */
function login($nombre, $pin) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT e.*, r.nombre AS rol FROM empleados e 
                           JOIN roles r ON e.rol_id = r.id 
                           WHERE e.nombre = :nombre AND e.pin = :pin");

    $stmt->execute(['nombre' => $nombre, 'pin' => $pin]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['user'] = $user;
        return true;
    }
    return false;
}


function isLoggedIn() {
    return isset($_SESSION['user']);
}

function checkRole($role) {
    return isLoggedIn() && $_SESSION['user']['rol'] === $role;
}

function logout() {
    session_destroy();
    header("Location: ../public/index.php");
    exit;
}
?>
