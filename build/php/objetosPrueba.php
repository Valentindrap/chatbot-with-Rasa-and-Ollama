<?php 
include ("persona.class.php");

$persona1 = new Persona(47930584, "Benjamin","Rojas", null);
var_dump($persona1);
print "<br></br>";

$persona1->presentacion();

$persona2 = new Persona(47695069, "Agustin","Casado", null);
var_dump($persona2);
print "<br></br>";

$persona2->presentacion();
?>