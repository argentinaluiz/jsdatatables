<?php

namespace JSDataTables\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Filter\FilterChain;

class FieldFilterManagerFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $filterChain = new FilterChain();
        $filterManager = new FieldFilterManager($filterChain->setPluginManager($serviceLocator->get('FilterManager')));
        return $filterManager;
    }

}
