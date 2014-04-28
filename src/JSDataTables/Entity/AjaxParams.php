<?php

namespace JSDataTables\Entity;

class AjaxParams {

    /**
     * @var int
     */
    private $draw;

    /**
     * @var int
     */
    private $start;

    /**
     * @var int
     */
    private $length;

    /**
     * @var SearchParams
     */
    private $search;

    /**
     * @var \ArrayObject
     */
    private $columns;

    /**
     * @var \ArrayObject
     */
    private $order;

    /**
     * @return int
     */
    public function getDraw() {
        return $this->draw;
    }

    /**
     * @return int
     */
    public function getStart() {
        return $this->start;
    }

    /**
     * @return int
     */
    public function getLength() {
        return $this->length;
    }

    /**
     * @return SearchParams
     */
    public function getSearch() {
        return $this->search;
    }

    /**
     * @return \ArrayObject
     */
    public function getColumns() {
        return $this->columns;
    }

    /**
     * @return \ArrayObject
     */
    public function getOrder() {
        return $this->order;
    }

    /**
     * @param int $draw
     * @return AjaxParams
     */
    public function setDraw($draw) {
        $this->draw = $draw;
        return $this;
    }

    /**
     * @param int $start
     * @return AjaxParams
     */
    public function setStart($start) {
        $this->start = $start;
        return $this;
    }

    /**
     * @param int $length
     * @return AjaxParams
     */
    public function setLength($length) {
        $this->length = $length;
        return $this;
    }

    /**
     * @param SearchParams $search
     * @return AjaxParams
     */
    public function setSearch(SearchParams $search) {
        $this->search = $search;
        return $this;
    }

    /**
     * @param \ArrayObject $columns
     * @return AjaxParams
     */
    public function setColumns(\ArrayObject $columns) {
        $this->columns = $columns;
        return $this;
    }

    /**
     * @param \ArrayObject $order
     * @return AjaxParams
     */
    public function setOrder(\ArrayObject $order = null) {
        $this->order = $order;
        return $this;
    }

    /**
     * @param array $data
     * @return AjaxParams
     */
    public function hydrate(array $data) {
        $columns = new \ArrayObject();
        foreach ($data['columns'] as $column) {
            $columns->append((new ColumnParams())->hydrate($column));
        }

        $order = new \ArrayObject();
        foreach ($data['order'] as $dtOrder) {
            $order->append((new OrderParams())->hydrate($dtOrder));
        }

        return $this->setDraw($data['draw'])
                        ->setStart($data['start'])
                        ->setLength($data['length'])
                        ->setSearch((new SearchParams())->hydrate($data['search']))
                        ->setColumns($columns)
                        ->setOrder($order);
    }

}
