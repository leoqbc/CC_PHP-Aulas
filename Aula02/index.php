<?php
ini_set('display_errors', 1);

xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);

for ($i = 0; $i <= 1000; $i++) {
    $a = $i * $i;
}

$xhprof_data = xhprof_disable();

$XHPROF_ROOT = "xhprof";
require $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_lib.php";
require $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_runs.php";

$xhprof_runs = new XHProfRuns_Default();
$run_id = $xhprof_runs->save_run($xhprof_data, "teste1");

echo "http://localhost:8081/xhprof/xhprof_html/index.php?run={$run_id}&source=xhprof_testing\n";