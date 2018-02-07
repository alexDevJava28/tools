<?

/**
 * Some useful functions
 */

function log ($filename, $msg) {
    $fd = fopen($filename, "a");
    $str = "[" . date("Y/m/d h:i:s", mktime()) . "] " . $msg;
    fwrite($fd, $str . "\n");
    fclose($fd);
}