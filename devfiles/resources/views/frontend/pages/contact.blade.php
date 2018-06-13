@extends('frontend.layouts.layout')
@section('PageTitle', 'Contact Us')
@section('content')



            <div class="row">
                <!-- Contact -->
                <div class="">
                    <section id="agent-detail">
                        <header><h1>Contact Us</h1></header>
                        <section id="contact-information">
                            <div class="row">
                                <div class="col-md-4 col-sm-5">
                                    <section id="address">
                                        <header><legend>Address</legend></header>
                                        <address>
                                            <strong>Concorde Express</strong><br>
                                            66A Cannon Street<br>
                                            LE4 6NG, Leicester, UK<br>
                                            <a href="mailto:info@concorde.express">info@concorde.express</a><br>
                                            
                                        </address>
                                        
                                        <legend>Call us</legend>
                                        +44 7769481010<br>
                                        +44 7788859991<br>
                                        +44 116 266 2222<br>
                                        
                                        
                                        
                                    </section><!-- /#address -->
                                    <br>
                                    <section id="social">
                                        
                                        <div class="agent-social">
                                            <a href="http://bit.ly/concordetwitter" target="_blank" class="fa fa-twitter btn btn-grey-dark"></a>
                                            <a href="http://bit.ly/concordefacebook" target="_blank" class="fa fa-facebook btn btn-grey-dark"></a>
                                            <a href="http://bit.ly/concordegplus" target="_blank" class="fa fa-google-plus btn btn-grey-dark"></a>
                                        </div>
                                    </section><!-- /#social -->
                                </div><!-- /.col-md-4 -->
                                <div class="col-md-8 col-sm-7">
                                    <header><h3>Where We Are</h3></header>
                                    <div class="div"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13301.93362150058!2d-1.1162700253912567!3d52.653199329711626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x60c7a9a65ef070ba!2sConcorde+Express!5e0!3m2!1sen!2suk!4v1439753485320" width="100%" height="400"  frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div><!-- /.col-md-8 -->
                            </div><!-- /.row -->
                        </section><!-- /#agent-info -->
                        <hr class="thick">
                        <section id="form">
                            <header><h3>Send Us a Message</h3></header>
                            <form role="form" id="form-contact" method="post"  class="clearfix">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form-contact-name">Your Name<em>*</em></label>
                                            <input type="text" class="form-control" id="form-contact-name" name="form-contact-name" required>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form-contact-email">Your Email<em>*</em></label>
                                            <input type="email" class="form-control" id="form-contact-email" name="form-contact-email" required>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-6 -->
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form-contact-message">Your Message<em>*</em></label>
                                            <textarea class="form-control" id="form-contact-message" rows="8" name="form-contact-message" required></textarea>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-12 -->
                                </div><!-- /.row -->
                                <div class="form-group clearfix">
                                    <button type="submit" class="btn pull-right btn-default" id="form-contact-submit">Send a Message</button>
                                </div><!-- /.form-group -->
                                <div id="form-status"></div>
                            </form><!-- /#form-contact -->
                        </section>
                    </section><!-- /#agent-detail -->
                </div><!-- /.col-md-9 -->
                <!-- end Contact -->
                </div>



@stop