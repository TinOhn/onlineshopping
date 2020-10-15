<?php 
	include "include/header.php";
 ?>


	<!-- Our Location Map -->
	<div class="container-fluid pt-4 mt-5">
		<div class="row">
			<div class="col-12">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30548.86751860919!2d96.10250264112277!3d16.84577023216548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c194e7ee58f64d%3A0x6e974e7cb775f1a9!2sHlaing%20Township%2C%20Yangon!5e0!3m2!1sen!2smm!4v1601475108088!5m2!1sen!2smm" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
		</div>	
	</div>
	<!-- Contact Us -->
	<div class="container my-1">
		<h2 class="py-1">Get In Touch</h2>
		<div class="row">
			<div class="col-md-8 col-lg-8 col-sm-12 py-2">
				<div class="row">
					<div class="col-md-6 col-lg-6 col-sm-12 py-3">
						<div class="form-group">
							<input type="text" class="form-control" id="text" placeholder="Enter Your Name">
						</div>
					</div>
					<div class="col-md-6 col-lg-6 col-sm-12 py-3">
						<div class="form-group">
							<input type="email" class="form-control" id="email" placeholder="Enter Email Address">
						</div>
					</div>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="text" placeholder="Enter Subject">
				</div>
				<div class="form-group py-3">
					<textarea class="form-control" id="textarea" rows="6" placeholder="Enter Message"></textarea>
				</div>
				<div class="text-center">
					<button class="btn btn-outline-secondary mb-5">Send Message</button>
				</div>
			</div>
			<div class="col-md-12 col-lg-4 col-sm-12 py-3 px-5">
				<i class="fas fa-house-user text-secondary fa-2x"></i>
				<span class="px-3">Yangon, Myanmar</span>
				<p class="contact1">Tanlan Street, Mayangone</p><br>
				<i class="fas fa-mobile text-secondary fa-2x"></i>
				<span class="px-4">+95 9788002582</span>
				<p class="contact1">Mon to Fri 9am to 6pm</p><br>
				<i class="fas fa-envelope-open-text text-secondary fa-2x"></i>
				<span class="px-4">support@Hotel.com</span>
				<p class="contact1">Send us your query anytime.</p>
			</div>
		</div>
	</div>

	
	<?php 
 		include "include/footer.php";
	 ?>

</body>
</html>