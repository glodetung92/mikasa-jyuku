<?php
define('WP_USE_THEMES', true);
register_shutdown_function(function() {
    echo "SHUTDOWN_CALLED\n";
});
require __DIR__ . '/wp-blog-header.php';
echo "BLOG_HEADER_FINISHED\n";
