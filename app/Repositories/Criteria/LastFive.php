<?php
/**
 * Created by PhpStorm.
 * User: zlatko
 * Date: 2.2.16.
 * Time: 00.28
 */

namespace App\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;
use SebastianBerc\Repositories\Criteria;



class LastFive extends Criteria
{


    /**
     * Execute  criteria on given query builder
     *
     * @param Builder $query
     * @return mixed
     */
    public function execute (Builder $query) {
        return $query->latest()->take(5);
    }



}