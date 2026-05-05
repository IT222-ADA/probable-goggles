<?php

class Auth
{
    /**
     * Login user
     * @param array $user User data from DB (id, name, role, etc)
     */
    public static function login(array $user)
    {
        Session::set('user', [
            'id'   => $user['id'],
            'name' => $user['name'],
            'role' => $user['role']
        ]);
    }

    /**
     * Logout user
     */
    public static function logout()
    {
        Session::destroy();
    }

    /**
     * Check if user is logged in
     */
    public static function check(): bool
    {
        return Session::has('user');
    }

    /**
     * Get logged-in user data
     */
    public static function user(): ?array
    {
         return Session::get('user');
    }

    /**
     * Check if user is admin
     */
    public static function isAdmin(): bool
{
    $user = self::user();

    return $user && in_array($user['role'], ['admin', 'super_admin']);
}

    /**
     * Check if user has one of roles
     */
    public static function hasRole(array $roles): bool
    {
        $user = self::user();

        return $user && in_array($user['role'], $roles);
    }

    public static function role()
    {
        return self::user()['role'] ?? null;
    }

    /**
     * Require login
     */
    public static function requireLogin()
    {
        if (!self::check()) {
            Flash::set('error', 'Please login first');
            header('Location: /login');
            exit;
        }
    }

    /**
     * Require admin role
     */
    public static function requireAdmin()
    {
        if (!self::isAdmin()) {
            Flash::set('error', 'Admin access only');
            header('Location: /admin/dashboard');
            exit;
        }
    }
}
