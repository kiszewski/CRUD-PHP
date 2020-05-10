<?php

function parseDateToString($date) {
    $newDate = new DateTime($date);
    return $newDate->format('d/m/Y');
}

function formatSalary($salario) {
    return $newSalario = 'R$ ' . str_replace('.', ',', $salario);
}

//REFATORAR     
function formatPhone($number) {
    str_split($number);
    return "({$number[0]}{$number[1]})
    {$number[2]} {$number[3]}{$number[4]}{$number[5]}{$number[6]}-{$number[7]}{$number[8]}{$number[9]}{$number[10]}";
} 