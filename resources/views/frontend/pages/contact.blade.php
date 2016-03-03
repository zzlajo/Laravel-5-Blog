@extends('layouts.frontend')

@section('content')
@include('frontend.partials.common.header._headerPage', ['pageName' => 'Contact'])

    <!-- Map -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 no-padding googleMap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d89849.16500547924!2d19.779229153248256!3d45.272328299798765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475b10613de93455%3A0xb6f7d683724fe28!2sNovi+Sad!5e0!3m2!1sen!2srs!4v1456824547570" width="100%" height="350" frameborder="0"></iframe>
            </div>
        </div>
    </div>
    <!-- /Map -->

    <!-- Contact -->
    <section class="mt40 mb40">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="heading mb20">
                        <h4>Let's get in touch!</h4>
                    </div>
                    <p class="mb20">
                        Feel free to fill that form to enter in contact with me. I'll try to answer you as quick as possible!
                    </p>

                    @include('errors.formErrors')

                    @if (isset($success))
                        <div class="alert alert-success">
                            {!! $success !!}
                        </div>
                    @endif
                    <form role="form" method="POST" action="{{ URL::route('contact') }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" name="contactName" value="{{ old('contactName') }}" placeholder="Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="email" name="contactEmail" value="{{ old('contactEmail') }}" placeholder="Email Address" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="contactMessage" placeholder="Message" rows="7">{{ old('contactMessage') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-rw btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-sm-4 mt30-xs">
                    <div class="panel panel-primary no-margin">
                        <div class="panel-heading">
                            <h3 class="panel-title">Information</h3>
                        </div>
                        <div class="panel-body">
                            <address class="no-margin">
                                <strong>Zlatko Zuber</strong><br>
                                <i class="fa fa-home"></i> Novi Sad (Srbija)<br>
                                <i class="fa fa-phone"></i> Phone: (+381) ?????????<br>
                                <i class="fa fa-envelope-o "></i> Mail: <a href="mailto:zuber.zlajo@gmail.com">zuber.zlajo@gmail.com</a><br>
                                <a href="https://github.com/zzlajo" class="btn btn-social-icon btn-github btn-sm"><i class="fa fa-github-alt"></i></a>
                                <a href="https://www.linkedin.com/#" class="btn btn-social-icon btn-linkedin btn-sm"><i class="fa fa-linkedin"></i></a>
                                <a href="https://twitter.com/#" class="btn btn-social-icon btn-twitter btn-sm"><i class="fa fa-twitter"></i></a>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Contact -->
@stop
