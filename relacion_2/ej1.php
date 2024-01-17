<?php
// Ej 1 Relación 2
// Muestra los números múltiplos de 5 de 0 a 100 utilizando un bucle for, while y do-while.
// while
$i = 0;

while ($i <= 100) {
    echo "$i "."\n";
    $i += 5;
}

// do while
do {
    echo "$i "."\n";
    $i += 5;
} while ($i <= 100);

// foreach
for ($i = 0; $i <= 100; $i += 5) {
    echo "$i "."\n";
}
