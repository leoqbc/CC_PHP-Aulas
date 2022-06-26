<?php
if (php_sapi_name() !== 'cli') {
    if (isset($url['path']) && $url['path'] !== '/xhprof/xhprof_html/index.php' && $active === 1) {
        endXHProf();
        // echo "<a href=\"http://localhost:8081/xhprof/xhprof_html/index.php?run={$run_id}&source=xhprof_testing\">Analisar Testes</a>";
    }
}