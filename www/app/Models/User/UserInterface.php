<?php
declare(strict_types=1);

namespace App\Models\User;

interface UserInterface
{
    public const TABLE_NAME = 'users';

    public const ATTR_ID = 'id';
    public const ATTR_NAME = 'name';
    public const ATTR_EMAIL = 'email';
    public const ATTR_PASSWORD = 'password';
    public const ATTR_REMEMBER_TOKEN = 'remember_token';
}
