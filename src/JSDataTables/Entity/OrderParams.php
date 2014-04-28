<?php

namespace JSDataTables\Entity;

class OrderParams {

    /**
     * @var int
     */
    private $column;

    /**
     * @var string
     */
    private $dir;

    /**
     * @return int
     */
    public function getColumn() {
        return $this->column;
    }

    /**
     * @return string
     */
    public function getDir() {
        return $this->dir;
    }

    /**
     * @param int $column
     * @return OrderParams
     */
    public function setColumn($column) {
        $this->column = $column;
        return $this;
    }

    /**
     * @param string $dir
     * @return OrderParams
     */
    public function setDir($dir) {
        $this->dir = $dir;
        return $this;
    }

    /**
     * @param array $data
     * @return OrderParams
     */
    public function hydrate(array $data) {
        return $this->setColumn($data['column'])
                        ->setDir($data['dir']);
    }

}
