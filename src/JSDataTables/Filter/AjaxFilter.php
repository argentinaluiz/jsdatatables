<?php

namespace JSDataTables\Filter;

use Zend\InputFilter\InputFilter;

class AjaxFilter extends InputFilter {

    public function __construct() {
        $this->add([
            'name' => 'draw',
            'required' => true,
            'validators' => [
                [
                    'name' => 'NotEmpty',
                    'options' => [
                        'messages' => [
                            'isEmpty' => 'Draw não encontrado'
                        ]
                    ]
                ],
                [
                    'name' => 'JS\Validator\JSInt',
                    'options' => [
                        'messages' => [
                            'notInt' => 'Draw não é um inteiro válido'
                        ]
                    ]
                ],
            ]
        ]);

        $this->add([
            'name' => 'start',
            'required' => true,
            'validators' => [
                [
                    'name' => 'NotEmpty',
                    'options' => [
                        'messages' => [
                            'isEmpty' => 'Start não encontrado'
                        ]
                    ]
                ],
                [
                    'name' => 'JS\Validator\JSInt',
                    'options' => [
                        'messages' => [
                            'notInt' => 'Start não é um inteiro válido'
                        ]
                    ]
                ],
            ]
        ]);

        $this->add([
            'name' => 'length',
            'required' => true,
            'validators' => [
                [
                    'name' => 'NotEmpty',
                    'options' => [
                        'messages' => [
                            'isEmpty' => 'Length não encontrado'
                        ]
                    ]
                ],
                [
                    'name' => 'JS\Validator\JSInt',
                    'options' => [
                        'messages' => [
                            'notInt' => 'Length não é um inteiro válido'
                        ]
                    ]
                ],
            ]
        ]);

        $this->add(new SearchFilter(), 'search');
        $this->add([
            'type' => 'Collection',
            'required' => true,
            'input_filter' => ['type' => 'JSDataTables\Filter\ColumnFilter']
                ], 'columns');
        $this->add([
            'type' => 'Collection',
            'input_filter' => ['type' => 'JSDataTables\Filter\OrderFilter']
                ], 'order');
    }

}
