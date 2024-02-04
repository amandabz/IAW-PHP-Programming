<?php
session_start();
//aquí destruimos la sesión y  usamos la función header("Location: index.php"); para
//redirigir al usuario a la parte pública de la aplicación
session_destroy();

header("Location: index.php");