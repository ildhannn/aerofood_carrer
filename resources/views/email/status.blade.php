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
			Your experience and qualifications have been reviewed and it is suited to our organization's current needs. Therefore, we will <b>proceeding further</b> with your application to the next stage.
			</p>
			<p style="line-height: 28px;">
			The next stage will be <b>{{$job->jobCandidate($candidate->candidate_id)->progress()}}</b>. To accomplished that, you can go to <a href="http://career.aerofood.co.id/">career.aerofood.co.id</a> and check your 'Home / Beranda'. This stage will due on <b>{{date_format(new DateTime($job->jobStep($job->jobCandidate($candidate->candidate_id)->pivot->progress)->pivot->due_date), 'l \t\h\e jS, Y')}}</b>.
			</p>
			<p style="line-height: 28px;">
			So, we hope we can see the result to proceed it further.
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
