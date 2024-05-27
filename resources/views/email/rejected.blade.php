<body style="background: #eee">
	<?php 
		$path_logo = public_path().DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."mail-header.PNG";
	 ?>
	<div class="email-content" 
		style="width: 600px;
			margin: 0 auto;
			background: #fff;">
		<div class="image" style="
		text-align: center;
		background-size: contain;
		height: 140px;
		background-repeat: no-repeat;
		">
			<img src="{{$message->embed($path_logo)}}" style="height: auto; width: 100%">
		</div>


		<div class="content" style="padding: 20px 50px;">

			<h3>Dear Mr/Mrs. {{$candidate->user->name}},</h3>
			<div class="divider" style="height: 1px;
		background: #053050;
		width: 100%;"></div>
			<p style="line-height: 28px;">
			Thank you for your interest in seeking employment with our company and for giving us the opportunity to review your resume details.  
			</p>
			<p style="line-height: 28px;">
			Although your experience and qualifications are impressive, we have identified a candidate who is more closely suited to our organization's current needs. Therefore, we will not be proceeding further with your application at this stage. . 
			</p>
			<p style="line-height: 28px;">
			However, we are keeping your details in our file and will refer to your application again should a suitable job opportunity arise. 
			</p>
			<p style="line-height: 28px;">
			Once again, we thank you for your time and effort and we wish you every success in your future career endeavors.
			</p>
			<div class="divider" style="height: 1px;
		background: #053050;
		width: 100%;"></div>
			<p style="line-height: 28px;">
			Respectfully Yours, <br>
			HC Career Team <br>
			PT. Aerofood Indonesia (Garuda Indonesia Group) <br>
			E: career@aerowisatafood.com | www.aerowisatafood.com <br>
			</p>
		</div>
	</div>
</body>
