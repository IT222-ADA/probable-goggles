<?php
class Flash
{
    /**
     * Set a flash message
     * @param string $key
     * @param string $message
     */
    public static function set(string $key, string $message)
    {
        $_SESSION['flash'][$key] = $message;
    }

    /**
     * Get and remove flash message
     * @param string $key
     * @return string|null
     */
    public static function get(string $key): ?string
    {
        if (!empty($_SESSION['flash'][$key])) {
            $message = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $message;
        }
        return null;
    }

    /**
     * Display flash with SweetAlert
     */
    public static function display()
    {
        if ($msg = self::get('success')) {
            $redirect = self::get('redirect');
            if ($redirect) {
                echo "<script>AlertService.success(" . json_encode($msg) . ").then(()=>{ window.location = " . json_encode($redirect) . "; });</script>";
            } else {
                echo "<script>AlertService.success(" . json_encode($msg) . ");</script>";
            }
        }
        if ($msg = self::get('error')) {
            echo "<script>AlertService.error(" . json_encode($msg) . ");</script>";
        }
    }
}
