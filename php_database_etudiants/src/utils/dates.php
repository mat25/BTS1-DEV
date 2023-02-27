<?php

function formatDate(string $date): string {
    $timestamp = strtotime($date);
    $dateFormate = date("d/m/Y", $timestamp);
    return $dateFormate;
}

function caclulAge(string $date_naissance): string {
    $age = date("Y") - date("Y",strtotime($date_naissance));

    if (date("md") < date("md",strtotime($date_naissance))) {
        $age -= 1;
    }
    return $age;
}