<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use App\Repositories\PostsRepository;
use Symfony\Component\HttpFoundation\File;

//use App\Repositories\PostsRepository;
//use Illuminate\Contracts\Bus\SelfHandling;
//use Illuminate\Support\Facades\Auth;
//use Intervention\Image\Facades\Image;


class SavePost extends Job implements SelfHandling
{

    /**
     * @var PostsRepository
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
    public function __construct(PostsRepository $repository, $data = [], $id = null)
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
        // Image handling
        if (isset($this->data['image'])) {
            $this->data['image'] = $this->buildImage();
        }
        // Image handling
        if (isset($data['image'])) {
            $data['image'] = $this->buildImage($data);
        }

        // We create the post
        if ($this->id === null) {
            $this->data['author_id'] = Auth::id();
            $this->repository->create($this->data);
        } else {
            $this->repository->update($this->id, $this->data);
        }
    }


    /**
     * @return string
     */
    public function buildImage()
    {
        $filePath = '/uploads/'.$this->data['slug'].'.'.$this->data['image']->getClientOriginalExtension();
        Image::make($this->data['image'])->save(public_path($filePath));

        return $filePath;

    }
}


