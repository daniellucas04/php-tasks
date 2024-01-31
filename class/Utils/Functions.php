<?php 

namespace Utils;

class Functions {
    public static function location($url, $timeout) {
        echo "<script>setTimeout(function(){window.location = 'http://website.localhost/$url'}, $timeout)</script>";
    }
}
?>