 

<?php $__env->startSection('title'); ?>
    Contact Us
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pages'); ?>

    <!--* Contact*-->
    <section id="mt_contact" class="contact-main section-inner body-color">        
        <div class="container">
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
            <!-- section title -->
            <div class="inner-heading">
                <h3>Contact Us</h3>
            </div>
            
            <!-- Contact Us Map -->   
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1826.0441961578954!2d90.41574923697172!3d23.74422713412946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8615ae7dd79%3A0xf8374e6e133cb715!2sShantibagh%20Water%20Pump%2C%20Shantibagh%20Water%20Pump%20Ln%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1582712116133!5m2!1sen!2sbd" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            
            <div class="map">
                
            </div>
            
            <!-- section -->
        
            <div class="contact-inner">
                <div class="col-md-6">
                    <div class="contact-info">
                        <h3>Contact Info</h3>
                        <ul>
                            <li><i class="fa fa-map-marker"></i> 195/1-H, Shantibagh Water Pump, Dhaka-1217</li>
                            <li><i class="fa fa-phone"></i> +88 01711 - 23 48 31 (Call or Whatsapp)</li>
                            <li><i class="fa fa-envelope"></i> iqs.learning@gmail.com</li>
                            <li><i class="fa fa-envelope"></i>info@iqsbd.com</li>
                            <li><i class="fa fa-globe"></i> www.iqsbd.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact_form">
                        <form  action="<?php echo e(route('admin.contact.store')); ?>" method="post">
                            <?php echo csrf_field(); ?> 
                            <input type="text" name="name" id="name" placeholder="Your name" required>
                            <input type="number" name="mobile_no" id="mobile_no" placeholder="Your Contact" required>
                            <textarea cols="30" rows="5" name="message" id="message" placeholder="Your message" required></textarea>
                            <button class="mt_btn_yellow" type="submit">SEND MESSAGE</button>
                           
                        </form>
                    </div>
                </div>
            </div>    
        </div>
    </section>
    <!--* End Contact*-->

<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/iqsbdcom/public_html/resources/views/frontend/pages/contact_us.blade.php ENDPATH**/ ?>