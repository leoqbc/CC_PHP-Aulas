<?php
ini_set('display_errors', 1);

$url = parse_url($_SERVER['REQUEST_URI']);
$active = isset($_GET['profiling']) ? (int)$_GET['profiling'] : null;

if (isset($url['path']) && $url['path'] !== '/xhprof/xhprof_html/index.php' && $active === 1) {
    xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
}

