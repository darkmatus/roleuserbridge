<?php

namespace RoleUserBridge\Mapper;
use Zend\Stdlib\Hydrator\HydratorInterface;

use ZfcBase\Mapper\AbstractDbMapper;

/**
 * @category    Test
 * @package     Test_Model
 * @subpackage  Adapter
 * @copyright   Copyright (c) 18.10.2012 Unister GmbH
 * @author      Michael Müller <michael.mueller@unister.de>
 * @version     $Id:$
 */

/**
 * Kurze Beschreibung der Klasse
 *
 * Lange Beschreibung der Klasse (wenn vorhanden)...
 *
 * @category    Test
 * @package     Test_Model
 * @subpackage  Adapter
 * @copyright   Copyright (c) 18.10.2012 Unister GmbH
 */
class RoleMapper extends AbstractDbMapper
{
    protected $tableName  = 'user_role_linker';

    public function findById($user_id)
    {
        $select = $this->getSelect()
        ->from($this->tableName)
        ->where(array('user_id' => $user_id));

        $entity = $this->select($select)->current();
        $this->getEventManager()->trigger('find', $this, array('entity' => $entity));
        return $entity;
    }

    public function findByRole($role_id)
    {
        $select = $this->getSelect()
        ->from($this->tableName)
        ->where(array('role_id' => $role_id));

        $entity = $this->select($select)->current();
        $this->getEventManager()->trigger('find', $this, array('entity' => $entity));
        return $entity;
    }

    public function insert($entity, $tableName = null, HydratorInterface $hydrator = null)
    {
        $tableName = $this->tableName;
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