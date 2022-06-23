<?php

if (isset($url['path']) && $url['path'] !== '/xhprof/xhprof_html/index.php' && $active === 1) {
    $xhprof_data = xhprof_disable();

    $XHPROF_ROOT = "xhprof";
    require $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_lib.php";
    require $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_runs.php";

    $xhprof_runs = new XHProfRuns_Default();
    $run_id = $xhprof_runs->save_run($xhprof_data, "xhprof_testing");

    echo "<a href=\"http://localhost:8081/xhprof/xhprof_html/index.php?run={$run_id}&source=xhprof_testing\">Analisar Testes</a>";
}