<?php

class AdminGuard
{
   public static function require(array $roles = ['admin']): void
    {
        if (!Auth::check()) {
            header("Location: /");
            exit;
        }

        $user = Auth::user();

        if (!$user || !in_array($user['role'], $roles)) {
            http_response_code(403);
            require __DIR__ . '/../Views/errors/403.php';
            exit;
        }
    }
}