<?php

namespace JSDataTables\View\Helper;

use Zend\View\Helper\AbstractHelper;
use JSDataTables\Service\JSDataTablesManager;

class DtConfig extends AbstractHelper {

    private $dataTablesManager;

    public function __construct(JSDataTablesManager $dataTablesManager) {
        $this->dataTablesManager = $dataTablesManager;
    }

    public function __invoke($name) {
        $dtConfig = $this->dataTablesManager->getDtConfig($name);
        foreach ($dtConfig['columns'] as $key => $value) {
            unset($dtConfig['columns'][$key]['server']);
        }
        unset($dtConfig['type_query']);
        unset($dtConfig['primary_key']);
        unset($dtConfig['class_name']);
        unset($dtConfig['alias_default']);
        return $dtConfig;
    }

}
