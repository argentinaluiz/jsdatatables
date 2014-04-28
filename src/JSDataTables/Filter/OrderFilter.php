<?php

namespace JSDataTables\Filter;

use Zend\InputFilter\InputFilter;

class OrderFilter extends InputFilter {

    public function __construct() {
        $this->add(array(
            'name' => 'column',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            'isEmpty' => 'Column não encontrado'
                        )
                    )
                ),
                array(
                    'name' => 'JS\Validator\JSInt',
                    'options' => array(
                        'messages' => array(
                            'notInt' => 'Column não é um inteiro válido'
                        )
                    )
                ),
            )
        ));

        $this->add(array(
            'name' => 'dir',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            'isEmpty' => 'Dir não encontrado'
                        )
                    )
                ),
                array(
                    'name' => 'InArray',
                    'options' => array(
                        'haystack' => ['asc', 'desc'],
                        'messages' => array(
                            'notInArray' => 'Dir passado não é válido'
                        )
                    )
                ),
            )
        ));
    }

}
