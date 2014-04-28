<?php

namespace JSDataTables\Entity;

class SearchParams {

    /**
     * @var string
     */
    private $value;

    /**
     * @var bool
     */
    private $regex;

    /**
     * @return string
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function isRegex() {
        return $this->regex;
    }

    /**
     * @param string $value
     * @return SearchParams
     */
    public function setValue($value) {
        $this->value = $value;
        return $this;
    }

    /**
     * @param bool $regex
     * @return SearchParams
     */
    public function setRegex($regex) {
        $this->regex = $regex;
        return $this;
    }

    /**
     * @param array $data
     * @return SearchParams
     */
    public function hydrate(array $data) {
        return $this->setRegex($data['regex'])
                        ->setValue($data['value']);
    }

}
