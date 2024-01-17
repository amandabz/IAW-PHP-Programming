<?php
// this is a comment in a single line
/* this is a comment
in several lines */

// variables
// there are two ways:
$value = 5;
echo 'The value is: ' . $value . "\n"; // with "", not '' -> "\n"
print "The values is: $value\n";

// constants
const MY_CONSTANT = "Hello";
print MY_CONSTANT;

// readline
/* $number = readline("Enter a number: ");
echo 'The number is: '.$number."\n"; */

// arrrays
$persona = array (
    array("nombre" => "Rosa", "estatura" => 168, "sexo" => "F"),
    array("nombre" => "Juan", "estatura" => 188, "sexo" => "M")
);

