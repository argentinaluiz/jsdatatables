<?php

namespace JSDataTables\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class JSDataTablesManager implements ServiceLocatorAwareInterface {

    private $serviceLocator;

    public function getServiceLocator() {
        return $this->serviceLocator;
    }

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }

    public function getDt($name) {
        $dataTablesConfig = $this->getConfig()['js_datatables'];
        if (array_key_exists($name, $dataTablesConfig)) {
            if (isset($dataTablesConfig[$name]['is_service'])) {
                return $this->getServiceLocator()->get($dataTablesConfig[$name]['service_name']);
            } elseif (isset($dataTablesConfig[$name]['class_dt'])) {
                $instance = new $dataTablesConfig[$name]['class_dt'];
                return $this->injectDependencies($instance, $this->getDtConfig($name));
            } else {
                return $this->injectDependencies(new JSDataTables(), $this->getDtConfig($name));
            }
        } else {
            throw new \InvalidArgumentException(sprintf('Invalid DataTables %s', $name));
        }
    }

    public function injectDependencies(JSDataTables $dataTable, $dtConfig) {
        return $dataTable->setDtArrayConfig($dtConfig)
                        ->setEntityManager($this->getServiceLocator()->get('Doctrine\ORM\EntityManager'))
                        ->setListClause($this->getServiceLocator()->get('ListClause'))
                        ->setParams($this->getServiceLocator()->get('Request')->getQuery()->toArray());
    }

    public function getConfig() {
        return $this->getServiceLocator()->get('Config');
    }

    public function getDtConfig($name) {
        return $this->getConfig()['js_datatables'][$name]['dt_config'];
    }

}
