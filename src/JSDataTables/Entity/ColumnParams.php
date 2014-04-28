<?php

namespace JSDataTables\Entity;

class ColumnParams extends AbstractColumn {

    /**
     * @var SearchParams
     */
    private $search;

    /**
     * @return SearchParams
     */
    public function getSearch() {
        return $this->search;
    }

    /**
     * @param SearchParams $search
     * @return ColumnParams
     */
    public function setSearch(SearchParams $search) {
        $this->search = $search;
        return $this;
    }

    /**
     * @param array $data
     * @return ColumnParams
     */
    public function hydrate(array $data) {
        parent::hydrate($data);
        return $this->setSearch((new SearchParams())->hydrate($data['search']));
    }

}
