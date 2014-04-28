<?php

namespace JSDataTables\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DtConfigFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $viewHelperManager) {
        return new DtConfig($viewHelperManager->getServiceLocator()->get('DataTablesManager'));
    }

}
