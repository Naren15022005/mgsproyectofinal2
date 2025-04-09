<?php

if (!function_exists('format_number')) {
    function format_number($number) {
        if ($number >= 1000000000) {
            return number_format($number / 1000000000, 2, ',', '.') . 'B';
        } elseif ($number >= 1000000) {
            return number_format($number / 1000000, 2, ',', '.') . 'M';
        } elseif ($number >= 1000) {
            return number_format($number / 1000, 2, ',', '.') . 'K';
        } else {
            return number_format($number, 0, ',', '.');
        }
    }
}


if (!function_exists('hex2rgba')) {
    function hex2rgba($color, $opacity = 1) {
        $color = str_replace('#', '', $color);
        
        if (strlen($color) === 3) {
            $color = $color[0].$color[0].$color[1].$color[1].$color[2].$color[2];
        }
        
        $rgb = [
            'r' => hexdec(substr($color, 0, 2)),
            'g' => hexdec(substr($color, 2, 2)),
            'b' => hexdec(substr($color, 4, 2))
        ];
        
        return "rgba({$rgb['r']}, {$rgb['g']}, {$rgb['b']}, {$opacity})";
    }
}
