<?php

if (!function_exists('formatQtd')) {
    function formatQtd($value, $count = 2)
    {
        return number_format($value, $count, ',', '.');
    }
}
if (!function_exists('formatPrie')) {
    function formatPrice(string $price): float
    {
        return (float) str_replace(['.', ','], ['', '.'], $price);
    }
}
