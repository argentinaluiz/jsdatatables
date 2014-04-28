<?php

namespace JSDataTables\Filter;

use Zend\InputFilter\InputFilter;

class SearchFilter extends InputFilter {

    public function __construct() {
        $this->add([
            'name' => 'value',
            'required' => true,
            'allow_empty' => true,
            'validators' => [
                [
                    'name' => 'NotEmpty',
                    'options' => [
                        'messages' => [
                            'isEmpty' => 'Value Não Encontrado'
                        ]
                    ]
                ]
            ]
        ]);

        $this->add([
            'name' => 'regex',
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
                            'isEmpty' => 'Regex Não Encontrado'
                        ]
                    ]
                ]
            ]
        ]);
    }

}
