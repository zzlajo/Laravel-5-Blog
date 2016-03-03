<?php
/**
 * Created by PhpStorm.
 * User: zlatko
 * Date: 7.2.16.
 * Time: 22.11
 */

namespace App\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;
use SebastianBerc\Repositories\Criteria;
use Illuminate\Support\Facades\DB;


class BlogRecommend extends Criteria
{

    /**
     * @var
     */
    private $number;

    /**
     * BlogRecommend constructor.
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
        return $query->where('recommend', '1')->orderBy(DB::raw('RAND()'))->take($this->number);
    }

}