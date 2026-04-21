<?php

class Session
{
    /**
     * Start session safely
     */
    public static function start(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Set session value
     */
    public static function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get session value
     */
    public static function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    /**
     * Check if session key exists
     */
    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * Remove session key
     */
    public static function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    /**
     * Destroy all session data
     */
    public static function destroy(): void
    {
        session_unset();
        session_destroy();
    }

    /**
     * Generate a CSRF token and store it in session under the provided name
     */
    public static function generateCsrfToken(string $name = '_token'): string
    {
        $token = bin2hex(random_bytes(32));
        $_SESSION[$name] = $token;
        return $token;
    }

    /**
     * Validate and consume a CSRF token stored in session
     */
    public static function validateCsrfToken(string $token, string $name = '_token'): bool
    {
        $stored = $_SESSION[$name] ?? null;
        if (!$stored) return false;
        $valid = hash_equals($stored, $token);
        // Consume token on successful validation
        if ($valid) {
            unset($_SESSION[$name]);
        }
        return $valid;
    }

    /**
     * Flash message (one-time)
     */
    public static function flash(string $key, $value = null)
    {
        // Set flash
        if ($value !== null) {
            $_SESSION['_flash'][$key] = $value;
            return;
        }

        // Get flash
        if (isset($_SESSION['_flash'][$key])) {
            $msg = $_SESSION['_flash'][$key];
            unset($_SESSION['_flash'][$key]);
            return $msg;
        }

        return null;
    }
}