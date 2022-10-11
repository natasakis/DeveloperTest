<!--Section: Contact v.2-->
<main>
<br><br>
    <div class="container">
<section class="mb-4">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="./contact-page.php" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo htmlspecialchars($name); ?>">
                        <?php if (!empty($systemErrors['name'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['name']); ?></small>
                        <?php } ?>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                        <?php if (!empty($systemErrors['email'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['email']); ?></small>
                        <?php } ?>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="subject" class="">Subject</label>
                            <input type="text" class="form-control" id="subject" placeholder="Enter subject" name="subject" value="<?php echo htmlspecialchars($subject); ?>">
                        <?php if (!empty($systemErrors['subject'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['subject']); ?></small>
                        <?php } ?>
                            
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                        <label for="message">Your message</label>
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" value="<?php echo htmlspecialchars($subject); ?>"></textarea>
                            <?php if (!empty($systemErrors['message'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['message']); ?></small>
                        <?php } ?>
                            
                        </div>

                    </div>
                </div>
                <!--Grid row-->

           

            <div class="text-center text-md-left">
                <br>
                <button type="submit" class="btn btn-dark" name="send" value="yes">Send</button>
            </div>
            </form>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>Address 1234, City</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+ 01 234 567 89</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>contact@nkshop.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>
</div>
<!--Section: Contact v.2-->
</main>