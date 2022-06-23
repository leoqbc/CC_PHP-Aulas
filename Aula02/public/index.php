<?php
$numbers = [];

for ($i = 0; $i <= 10000; $i++) {
    $numbers[] = number_format($i * $i, ',', '.');
}