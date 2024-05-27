<body style="background: #eee">
	<?php 
		$path_logo = public_path()."\img\mail-header.PNG";
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
			{{-- <img src="{{$message ?? ''->embed($path_logo)}}" style="height: auto; width: 100%"> --}}
		</div>


		<div class="content" style="padding: 20px 50px;">

			<h3>Dear Mr/Mrs. {{$candidate->user->name}},</h3>
			<div class="divider" style="height: 1px;
		background: #053050;
		width: 100%;"></div>
			<p style="line-height: 28px;">
			We have received your application for the position of <b>{{$job->title}}</b>. dated 
			{{date_format($job->jobCandidate($candidate->candidate_id)->pivot->created_at, 'l \t\h\e jS, Y')}}. Thank you for the 
			interest shown in our company. 
			</p>
			<p style="line-height: 28px;">
			Please be informed that we are in the midst of 
			processing the applications 
			and shall get in touch with you again if you are 
			shortlisted for an interview. 
			</p>
			<div class="divider" style="height: 1px;
		background: #053050;
		width: 100%;"></div>
			<p style="line-height: 28px;">
			Yours sincerely, <br>
			Talent Acquisition Team
			</p>
		</div>
	</div>
</body>
