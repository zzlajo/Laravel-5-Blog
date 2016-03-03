<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Repositories\PermissionsRepository;
use Illuminate\Contracts\Bus\SelfHandling;


class SavePermission extends Job implements SelfHandling
{
    /**
     * @var PermissionsRepository
     */
    private $repository;

    /**
     * @var array
     */
    private $data;

    /**
     * @var null
     */
    private $id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(PermissionsRepository $repository, $data =[], $id = null)
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
        if ($this->id === null) {
            $this->repository->create($this->data);
        } else {
            $this->repository->update($this->id, $this->data);
        }

    }
}
