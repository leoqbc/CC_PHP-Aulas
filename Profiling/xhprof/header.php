<?php

function startXHProf() {
    xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
}

function endXHProf() {
    $xhprof_data = xhprof_disable();

    $XHPROF_ROOT = "xhprof";
    require $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_lib.php";
    require $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_runs.php";

    $xhprof_runs = new XHProfRuns_Default();
    return $xhprof_runs->save_run($xhprof_data, "xhprof_testing");
}

if (php_sapi_name() !== 'cli') {
    $url = parse_url($_SERVER['REQUEST_URI']);
    $active = isset($_GET['profiling']) ? (int)$_GET['profiling'] : null;

    if (isset($url['path']) && $url['path'] !== '/xhprof/xhprof_html/index.php' && $active === 1) {
        startXHProf();
    }
}

