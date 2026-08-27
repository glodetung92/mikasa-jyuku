<?php
define('WP_USE_THEMES', true);
register_shutdown_function(function() {
    echo "SHUTDOWN_CALLED\n";
});
require __DIR__ . '/wp-load.php';
echo "WP_LOAD_FINISHED\n";
