@extends("frontend.layouts.main")
@section('body')
    <!-- Page Header -->
    @include("frontend.inc.page_header_index")
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>Want to get in touch? Fill out the form below to send us a message and We will get back to you as soon as possible!</p>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                <form action="{{ route('sendMail') }}" method="POST">
                    @csrf
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" id="name">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address" id="email">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label for="phone">Phone Number</label>
                            <input type="number" name="phone" class="form-control" placeholder="Phone Number" id="phone">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="message">Message</label>
                            <textarea rows="5" name="message" class="form-control" placeholder="Message" id="message"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
