<?php
$nodeJsPath = '/var/www/html/staticweb/public/nodejswithphp'
exec("cd ". dirname($nodeJsPath). " && node multiple.js 2>&1", $out, $err);
echo "hi";
?>