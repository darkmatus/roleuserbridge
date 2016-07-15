<?php 
namespace RoleUserBridge\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use RoleUserBridge\Service\User;

class User implements FactoryInterface{ 
    
    public function createService(ServiceLocatorInterface $serviceLocator){
        $service = new User();
        $service->setServiceManager($serviceLocator);
        return $service;
    }
}
?>