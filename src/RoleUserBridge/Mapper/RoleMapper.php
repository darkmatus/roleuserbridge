<?php

namespace RoleUserBridge\Mapper;
use Zend\Stdlib\Hydrator\HydratorInterface;

use ZfcBase\Mapper\AbstractDbMapper;


class RoleMapper extends AbstractDbMapper
{
    private $options;

    public function getOptions()
    {
        return $this->options;
    }
    
    public function setOptions()
    {
        if (null === $this->options) {
            $config = $this->getServiceLocator()->get('config');
            $this->options = $config['linker_config'];
        }
        return $this->options;
    }

    public function findById($user_id)
    {
        $options = $this->getOptions();
        $select = $this->getSelect()
        ->from($options['user_role_linker'])
        ->where(array('user_id' => $user_id));

        $entity = $this->select($select)->current();
        $this->getEventManager()->trigger('find', $this, array('entity' => $entity));
        return $entity;
    }

    public function findByRole($role_id)
    {
        $options = $this->getOptions();
        $select = $this->getSelect()
        ->from($options['user_role_linker'])
        ->where(array('role_id' => $role_id));

        $entity = $this->select($select)->current();
        $this->getEventManager()->trigger('find', $this, array('entity' => $entity));
        return $entity;
    }

    public function insert($entity, $tableName = null, HydratorInterface $hydrator = null)
    {
        $options = $this->getOptions();
        $tableName = $options['user_role_linker'];
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
