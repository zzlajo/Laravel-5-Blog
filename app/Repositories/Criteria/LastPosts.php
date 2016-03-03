<?php
/**
 * Created by PhpStorm.
 * User: zlatko
 * Date: 8.2.16.
 * Time: 13.15
 */

namespace App\Repositories\Criteria;

use SebastianBerc\Repositories\Criteria;
use Illuminate\Database\Eloquent\Builder;

class LastPosts extends Criteria
{
    /**
     * @var
     */
    private $number;

    /**
     * LastPosts constructor.
     * @param $number
     */
    public function __construct($number)
    {
        $this->number = $number;
    }


    /**
     * Execute criteria on given query builder
     *
     * @param Builder $query
     * @return mixed
     */
    public function execute(Builder $query)
    {
        return $query->latest()->take($this->number);
    }

}