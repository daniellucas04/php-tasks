<?php 

namespace Utils;

class Functions {
    /**
     * @param string $url = link para o qual o usuário será redirecionado
     * @param int $number = tempo que levará para o usuário ser redirecionado
     */
    public static function location($url, $timeout) {
        echo "<script>setTimeout(function(){window.location = 'http://website.localhost/$url'}, $timeout)</script>";
    }

    /**
     * @param string $date = 2024-01-31T02:42:59.000Z
     * @return string 31/01/2024 02:42:59
     */
    public static function brazilianDate(string $date) {
        return date('d/m/Y H:i:s', strtotime($date));
    }

    /**
     * @param string $date = 31/01/2024 02:42:59
     * @return string 31/01/2024
     */
    public static function removeTime(string $date) {
        $date = explode(' ', $date);
        return $date[0];
    }
}
?>