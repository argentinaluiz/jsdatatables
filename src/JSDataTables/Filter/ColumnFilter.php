<?php

namespace JSDataTables\Filter;

use Zend\InputFilter\InputFilter;

class ColumnFilter extends InputFilter {

    public function __construct() {
        $this->add([
            'name' => 'data',
            'required' => true,
            'allow_empty' => true,
            'validators' => [
                [
                    'name' => 'NotEmpty',
                    'options' => [
                        'messages' => ['isEmpty' => 'Data não encontrada']
                    ]
                ]
            ]
        ]);

        $this->add([
            'name' => 'name',
            'required' => true,
            'allow_empty' => true,
            'validators' => [
                [
                    'name' => 'NotEmpty',
                    'options' => [
                        'messages' => [
                            'isEmpty' => 'Data não encontrada'
                        ]
                    ]
                ]
            ]
        ]);

        $this->add([
            'name' => 'searchable',
            'required' => true,
            'filters' => [
                [
                    'name' => 'Callback',
                    'options' => [
                        'callback' => function ($value, $option = []) {
                    return filter_var($value, FILTER_VALIDATE_BOOLEAN);
                },
                    ]
                ],
            ],
            'validators' => [
                [
                    'name' => 'NotEmpty',
                    'options' => [
                        'type' => ['null', 'string'],
                        'messages' => [
                            'isEmpty' => 'Searchable Não Encontrado'
                        ]
                    ]
                ]
            ]
        ]);

        $this->add([
            'name' => 'orderable',
            'required' => true,
            'filters' => [
                [
                    'name' => 'Callback',
                    'options' => [
                        'callback' => function ($value, $option = []) {
                    return filter_var($value, FILTER_VALIDATE_BOOLEAN);
                },
                    ]
                ],
            ],
            'validators' => [
                [
                    'name' => 'NotEmpty',
                    'options' => [
                        'type' => ['null', 'string'],
                        'messages' => [
                            'isEmpty' => 'Orderable Não Encontrado'
                        ]
                    ]
                ]
            ]
        ]);
        $this->add(new SearchFilter(), 'search');
    }

}
