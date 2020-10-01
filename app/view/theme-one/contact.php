<?php require view('static/header')?>

<section class="jumbotron text-center">
    <div class="container">
        <h1>CONTACT</h1>
        <div class="breadcrumb-custom">
            <a href="#">Home</a> /
            <a href="#" class="active">Contact</a>
        </div>
    </div>
</section>

<div class="container">
    <form action="" id="contact-form" onsubmit="return false;">
        <div class="alert alert-danger" style="display: none;" id="contact-error-msg" role="alert"></div>
        <div class="alert alert-success" style="display: none;" id="contact-success-msg" role="alert"></div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" name="full_name" id="full_name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" id="subject">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
                </div>

            </div>

            <div class="col-md-12">
                <div class="form-group btn-center">
                    <button type="submit" onclick="contact('#contact-form')" class="btn btn-primary">Send Message</button>
                </div>
            </div>

        </div>
    </form>
</div>

<style>
    .btn-center{
        text-align: center;
        display: flex;
        justify-content: center;
        font-size: 25px;
    }
</style>

<?php require view('static/footer')?>
