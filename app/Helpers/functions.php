<?php

if (!function_exists('formatQtd')) {
    function formatQtd($value, $count = 2)
    {
        return number_format($value, $count, ',', '.');
    }
}
