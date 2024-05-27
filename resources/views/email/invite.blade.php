<body style="background: #eee">
    <?php
    $path_logo = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'mail-header.PNG';
    ?>
    <div class="email-content" style="width: 600px;
			margin: 0 auto;
			background: #fff;">
        <div class="image"
            style="
		text-align: center;
		background-size: contain;
		height: 140px;
		background-repeat: no-repeat;
		">
            <img src="{{ $message->embed($path_logo) }}" style="height: auto; width: 100%">
        </div>
        <div class="content" style="padding: 20px 50px;">

            <h3>Dear Mr/Mrs. {{ $user->name }},</h3>
            <div class="divider" style="height: 1px;
		background: #053050;
		width: 100%;"></div>
            <p style="line-height: 28px;">
                Follow up your application for the position of <b>{{ $job->title }}</b>, herewith we sent to you our
                application form. Please fill it completely and bring it in our interview session as this schedule:
            </p>
            <table>
                <tr>
                    <td>Day/Date</td>
                    {{-- <td> : {{ date_format($info['date_interview'], 'l \t\h\e jS, Y') }}</td> --}}
                    <td> : <b>{{ $info['date_interview'] }}</b></td>
                    <td><b><span class='date'></span></b></td>
                </tr>
                <tr>
                    <td>Time</td>
                    <td> : <b>{{ $info['time_interview'] }}</b></td>
                    <td><b><span class='time'></span></b></td>
                </tr>
                <tr>
                    <td>Place</td>
                    <td> : <b>{{ $info['place_interview'] }}</b></td>
                    <td><b><span class="place"></span></b></td>
                </tr>
                <tr>
                    <td>Interviewer</td>
                    <td> : <b>{{ $info['interviewer'] }}</b></td>
                    <td><b><span class="interviewer"></span></b></td>
                </tr>
                {{-- <tr>
                    <td>Position offered</td>
                    <td> : </td>
                    <td><b><span class="job-applied"></span></b></td>
                </tr> --}}
            </table>
            <p style="line-height: 28px;">
                Kindly confirm if you are available with this schedule as soon as possible. Then bring along your full
                resume with your latest educational certification, latest payslip, NPWP, KTP, reference letter from the
                previous company and the completed application form.
            </p>
            {{-- <p style="line-height: 28px;">
                Please be informed that we are in the midst of
                processing the applications
                and shall get in touch with you again if you are
                shortlisted for an interview.
            </p> --}}
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
