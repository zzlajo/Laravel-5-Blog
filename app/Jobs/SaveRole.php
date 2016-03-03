<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Repositories\RolesRepository;

class SaveRole extends Job implements SelfHandling
{
    /**
     * @var RolesRepository
     */
    protected $repository;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var null
     */
    protected $id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(RolesRepository $repository, $data = [], $id = null)
    {
        $this->repository = $repository;
        $this->data = $data;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->id === null){
            $this->repository->create($this->data);
        } else {
            $this->repository->update($this->id, $this->data);
        }
    }
}
