<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    /**
     *  Filter user by params
     *
     * @param array $params
     */
    public function filter(array $params);

    /**
     * Get User By Email with User's relationships
     *
     * @param string $email
     */
    public function getByEmail(string $email);

    /**
     * Change user's password
     *
     * @param string $email
     * @param string $password
     */
    public function changePassword(string $email, string $password);
}
