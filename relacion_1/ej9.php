<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario de clase</title>
    <style>
        th, td {
            border: 1px solid;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
<?php
$horario = array(
    array("Hora", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes"),
    array("8:15 - 9:15", "SRI", "ASO", "HLC", "ASO", "ASGBD"),
    array("9:15 - 10:15", "SRI", "ASO", "HLC", "ASO", "ASGBD"),
    array("10:15 - 11:15", "ASO", "SAD", "HLC", "EINEM", "SAD"),
    array("11:45 - 12:45", "ASO", "SAD", "ASGBD", "EINEM", "SAD"),
    array("12:45 - 13:45", "EINEM", "SRI", "IAW", "IAW", "SRI"),
    array("12:45 - 14:45", "EINEM", "SRI", "IAW", "IAW", "SRI")
);
?>

<table>
    <?php
    foreach ($horario as $row): ?>
        <tr>
            <?php foreach ($row as $cell): ?>
                <?php if ($cell == "Hora"): ?>
                    <th><?php echo $cell; ?></th>
                <?php else: ?>
                    <td><?php echo $cell; ?></td>
                <?php endif; ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>

