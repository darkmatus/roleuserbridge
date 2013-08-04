<?php

namespace RoleUserBridge\Mapper;

use ZfcBase\Mapper\AbstractDbMapper;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\ServiceManager\ServiceManager;

class RoleMapper extends AbstractDbMapper
{
    private $options;

    public function __construct($config) {
        $this->options = $config['linker_config'];
    }

    public function getOptions()
    {
        return $this->options;
    }
    
    public function setOptions()
    {
        if (null === $this->options) {
            $config = $this->getServiceManager()->get('config');
            $this->options = $config['linker_config'];
        }
        return $this->options;
    }

    public function findById($userId)
    {
        $options = $this->getOptions();
        $select = $this->getSelect()
        ->from($options['user_role_linker'])
        ->where(array('user_id' => $userId));

        $entity = $this->select($select)->current();
        $this->getEventManager()->trigger('find', $this, array('entity' => $entity));
        return $entity;
    }

    public function findByRole($roleId)
    {
        $options = $this->getOptions();
        $select = $this->getSelect()
        ->from($options['user_role_linker'])
        ->where(array('role_id' => $roleId));

        $entity = $this->select($select)->current();
        $this->getEventManager()->trigger('find', $this, array('entity' => $entity));
        return $entity;
    }

    public function insert($entity, $tableName = null, HydratorInterface $hydrator = null)
    {
        $options = $this->getOptions();
        $tableName = $options['user_role_linker'];
        $entity['role_id'] = $options['user_role_id'];
        $result = parent::insert($entity, $tableName, $hydrator);

        return $result;
    }

    // spätere Verwendung im Admin Interface (zB)
    public function update($entity, $where = null, $tableName = null, HydratorInterface $hydrator = null)
    {
        if (!$where) {
            $where = 'user_id = ' . $entity->getId();
        }

        return parent::update($entity, $where, $tableName, $hydrator);
    }
}
