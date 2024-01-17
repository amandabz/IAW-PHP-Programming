<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>Get and Post Methods</title>
</head>
<body>
<form action="calculator.php" method="get">
    <label for="cars">Elige una operación:</label>
    <label>
        <select name="opers">
            <option value="sum">Suma</option>
            <option value="rest">Resta</option>
            <option value="mult">Multiplicación</option>
            <option value="div">División</option>
        </select>
    </label><br>
    Introduce dos números para realizar la operación:
    <label><br>
        Número 1:
        <input type="number" name="num1">
    </label><br>
    <label>
        Número 2:
        <input type="number" name="num2">
    </label><br>
    <input type="submit" value="Send">
</form>
</body>
</html>
