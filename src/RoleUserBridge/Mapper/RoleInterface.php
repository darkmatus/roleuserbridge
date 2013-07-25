<?php

namespace RoleUserBridge\Mapper;

interface RoleInterface
{
    public function findById($userId);

    public function findByRole($roleId);

    public function update();
}
