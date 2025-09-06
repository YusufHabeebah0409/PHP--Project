<?php
echo "Hello World".'<br>';

$name = 'Habeebah'.'<br>';

$num = 70;

echo $name, $num;

echo"<b style='color:red'> I am bold</b>";

$check = true;
if ($check) {
    echo "Check is true";
} else {
    echo "Check is not true";
}

// Array 
$students =['Tolu','Bola','Tunde',$num, 8900];
print_r($students[0].'<br>');

// for loop 
for ($i=0; $i < count($students); $i++) { 
    echo $students[$i].'<br>';
}

foreach ($students as $student) {
    echo $student.'<br>';
}

// Associative array 
$studentInfo = ['name'=> 'Habeebah', 'School'=>'SQI', 'Dept'=>'Software', 'age'=> 56];
print_r($studentInfo);

// Function 
function getName(){
    global $name;
    echo $name;
}
getName();

// String functions 
$greetings = " Welcome to August Cohort";

echo strlen($greetings).'<br>';
echo strpos($greetings, "August").'<br>';

if (strrev($greetings) === $greetings) {
    echo "it's a palindrome".'<br>';
} else {
    echo "Not a palindrome".'<br>';
}

echo strtoupper($greetings).'<br>';

echo strtr($greetings, "August", "September").'<br>';




?>