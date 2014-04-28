<?php

namespace JSDataTables\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class JSDataTablesManagerFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $dataTablesManager = new JSDataTablesManager();
        return $dataTablesManager->setServiceLocator($serviceLocator);
    }

}
