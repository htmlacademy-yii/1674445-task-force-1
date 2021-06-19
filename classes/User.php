<?php

class User
{
    public const ROLE_CUSTOMER = 'customer';
    public const ROLE_DEVELOPER = 'developer';

    public string $role;

    public function __construct($isDeveloper)
    {
        $this->role = $isDeveloper ? self::ROLE_DEVELOPER : self::ROLE_CUSTOMER;
    }

    public function getRoles()
    {
        return array(
            self::ROLE_CUSTOMER => 'Заказчик',
            self::ROLE_DEVELOPER => 'Разработчик',
        );
    }
}
