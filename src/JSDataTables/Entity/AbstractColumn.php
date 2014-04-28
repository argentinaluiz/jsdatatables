<?php

namespace JSDataTables\Entity;

abstract class AbstractColumn {

    /**
     * @var string
     */
    private $data;

    /**
     * @var string
     */
    private $name;

    /**
     * @var bool
     */
    private $searchable;

    /**
     * @var bool
     */
    private $orderable;

    /**
     * @return string
     */
    public function getData() {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isSearchable() {
        return $this->searchable;
    }

    /**
     * @return bool
     */
    public function isOrderable() {
        return $this->orderable;
    }

    /**
     * @param string $data
     * @return AbstractColumn
     */
    public function setData($data) {
        $this->data = $data;
        return $this;
    }

    /**
     * @param string $name
     * @return AbstractColumn
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @param bool $searchable
     * @return AbstractColumn
     */
    public function setSearchable($searchable) {
        $this->searchable = $searchable;
        return $this;
    }

    /**
     * @param bool $orderable
     * @return AbstractColumn
     */
    public function setOrderable($orderable) {
        $this->orderable = $orderable;
        return $this;
    }

    /**
     * @param array $data
     * @return AbstractColumn
     */
    public function hydrate(array $data) {
        return $this->setData($data['data'])
                        ->setName(isset($data['name']) ? $data['name'] : '')
                        ->setOrderable($data['orderable'])
                        ->setSearchable($data['searchable']);
    }

}
