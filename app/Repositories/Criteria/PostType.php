<?php
/**
 * Created by PhpStorm.
 * User: zlatko
 * Date: 2.2.16.
 * Time: 00.34
 */

namespace App\Repositories\Criteria;

use SebastianBerc\Repositories\Repository;
use Illuminate\Database\Eloquent\Builder;

//use SebastianBerc\Repositories\Criteria;
use SebastianBerc\Repositories\Contracts\CriteriaInterface;



class PostType  extends Repository implements CriteriaInterface
{
    /**
     * @var \Illuminate\Contracts\Container\Container
     */
    private $type;


    /**
     * PostType constructor.
     * @param \Illuminate\Contracts\Container\Container $type
     */
    public function __construct($type = 'blog')
    {
        $this->type = $type;
    }

    /**
     * Execute criteria on given query builder
     *
     * @param Builder $query
     * @return $this
     */
    public function execute (Builder $query)
    {
        return $query->where(['type' => $this->type]);
    }

    public function takeModel()
    {

    }

}