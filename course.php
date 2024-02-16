<?php

$course = 'Bachelor of Science in Industrial Technology Major in Electrical Technology';

$acronym = substr($course,strpos($course, 'Indsutrial') + 11, 8);

// Add "BS" and "Industrial Technology"
$acronym = "BS " . $acronym;

echo $acronym;  