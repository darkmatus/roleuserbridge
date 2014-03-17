<?php

namespace RoleUserBridge\Service;

use RoleUserBridge\Mapper\RoleInterface;

use RoleUserBridge\Mapper\RoleMapper;

use ZfcUser\Service\User as ZfcUser;

class User extends ZfcUser
{

    protected $roleMapper;

    public function setRoleMapper(RoleInterface $roleMapper)
    {
        $this->roleMapper = $roleMapper;
        return $this;
    }

    public function getRoleMapper()
    {
        if (null === $this->roleMapper) {
            $this->roleMapper = $this->getServiceManager()->get('user_role_mapper');
        }
        return $this->roleMapper;

    }

    public function register(array $data)
    {
        $registerresult = parent::register($data);

        if($registerresult !== false) {
            $userRole = array(
                    'user_id' => $registerresult->getId(),
                    'role_id' => 'user'
                    );
            $this->getRoleMapper()->insert($userRole);
        }
        return $registerresult;
    }

}
