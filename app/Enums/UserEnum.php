<?php

namespace App\Enums;

enum UserEnum
{
    public const DB_TABLE = "users";
    public const ID = 'id';
    public const USERNAME = 'username';
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const PHONE = 'phone';
    public const PASSWORD = 'password';
    public const ROLE = 'role';
    public const ROLE_ID = 'role_id';
    public const STATUS = 'status';
    public const ADDRESS = 'address';
    public const IMAGE = 'image';
    public const EMAIL_VERIFIED_AT = 'email_verified_at';

    public const ALL_FIELDS = [
        self::ID,
        self::USERNAME,
        self::NAME,
        self::EMAIL,
        self::PHONE,
        self::PASSWORD,
        self::ROLE,
        self::ROLE_ID,
        self::STATUS,
        self::ADDRESS,
        self::IMAGE,
    ];

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;
    public const STATUS_BLOCK = 2;

    public const STATUS_LABELS = [
        'Active' => self::STATUS_ACTIVE,
        'Inactive' => self::STATUS_INACTIVE,
        'Block' => self::STATUS_BLOCK,
    ];

    public const ROLE_ADMIN = 'admin';
    public const ROLE_USER = 'user';
    public const ROLE_LABELS = [
        'Admin' => self::ROLE_ADMIN,
        'User' => self::ROLE_USER,
    ];

}
