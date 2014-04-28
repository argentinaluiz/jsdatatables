<?php

namespace JSDataTables\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ListClauseFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $listClause = new ListClause($serviceLocator->get('FieldFilterManager'));
        return $listClause;
    }

}
