<?php

return [
    'service_manager' => [
        'factories' => [
            'DataTablesManager' => 'JSDataTables\Service\JSDataTablesManagerFactory',
            'FieldFilterManager' => 'JSDataTables\Service\FieldFilterManagerFactory',
            'ListClause' => 'JSDataTables\Service\ListClauseFactory'
        ]
    ],
    'view_helpers' => [
        'factories' => [
            'jsDtConfig' => 'JSDataTables\View\Helper\DtConfigFactory',
        ]
    ],
];
