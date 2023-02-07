<?php

namespace WeDesignIt\Dropshiphub\Endpoints;

use WeDesignIt\Dropshiphub\Client;

abstract class Endpoint
{

    protected Client $client;

    /**
     * @var int
     */
    protected int $page = 1;

    /**
     * @var int
     */
    protected int $per_page = 100;

    /**
     * @var array
     */
    protected array $sorts = [];

    /**
     * @var array
     */
    protected array $filters = [];


    /**
     * Resource constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return int
     */
    public function getPage() : int
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return $this
     */
    public function setPage(int $page) : self
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->per_page;
    }

    /**
     * @param int $per_page
     * @return $this
     */
    public function setPerPage(int $per_page) : self
    {
        $this->per_page = $per_page;
        return $this;
    }

    /**
     * @param string $column
     * @param $operation
     * @param null $value
     * @return $this
     */
    public function filter(string $column, $operation, $value = null)
    {
        if (is_null($value)) {
            $value = $operation;
            $operation = 'eq';
        }

        $this->filters[$column][$operation] = $value;
        return $this;
    }

    /**
     * @param string $column
     * @param string $direction
     * @return $this
     */
    public function sort(string $column, string $direction = 'asc')
    {
        $this->sorts[$column] = $direction == 'asc' ? "$column" : "-$column";
        return $this;
    }

    /**
     * @return array
     */
    protected function getQuery()
    {
        $query = $this->filters;
        $query['sort'] = array_values($this->sorts);
        $query['page'] = $this->getPage();
        $query['per_page'] = $this->getPerPage();
        return $query;
    }

}
