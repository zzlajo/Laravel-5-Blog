@extends('layouts.backend')

@section('page-title')
    User "{{ $userC->name }}"
@stop

@section('breadcrumb-title')
    User Details
@stop

@section('content')
    <section class="mt40 mb40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blog-post mb40">
                        <div class="blog-post-holder">
                            <h1>{{ $userC->name }}</h1>
                            <h3>{{ $userC->email }}</h3>
                            <h3><img src="{{ $userC->avatar }}?s=90" class="img-circle" alt="User Image"></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
