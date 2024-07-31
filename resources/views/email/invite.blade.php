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
                Follow up your application for PT. Aerofood Indonesia as <b>{{ $job->title }}</b>, here with we sent
                to you our application form. Please fill it completely and bring the hardcopy to our scheduled interview session with the details
                below :
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
                @if ($jenis_interview == 'offline')
                    <tr>
                        <td>Place</td>
                        <td> : <b>{{ $info['place_interview'] }}</b></td>
                        <td><b><span class="place"></span></b></td>
                    </tr>
                @else
                    <tr>
                        <td>Platform</td>
                        <td> : <b>{{ $platform }}</b></td>
                        <td><b><span class="platform"></span></b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> : <b>{{ $info['place_interview'] }}</b></td>
                        <td><b><span class="place"></span></b></td>
                    </tr>
                @endif
                {{-- <tr>
                    <td>Interviewer</td>
                    <td> : <b>{{ $info['interviewer'] }}</b></td>
                    <td><b><span class="interviewer"></span></b></td>
                </tr> --}}
                <tr>
                    <td>Interviewer</td>
                    {{-- <td> : <b>{{ $info['interviewer'] }}</b></td> --}}
                    <td> : <b>{{ $interviewer }}</b></td>
                    <td><b><span class="interviewer"></span></b></td>
                </tr>
                <tr>
                    <td></td>
                    {{-- <td> : <b>{{ $info['interviewer'] }}</b></td> --}}
                    <td> : <b>{{ $backupinterviewer }}</b></td>
                    <td><b><span class="backupinterviewer"></span></b></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>Document :</td>
                </tr>
                <tr>
                    <td>1. Resume</td>
                </tr>
                <tr>
                    <td>2. Educational certification</td>
                </tr>
                <tr>
                    <td>3. latest payslip</td>
                </tr>
                <tr>
                    <td>4. NPWP</td>
                </tr>
                <tr>
                    <td>5. KTP</td>
                </tr>
                <tr>
                    <td>6. Reference letter from the previous company</td>
                </tr>
                <tr>
                    <td>7. Employee Application Form</td>
                </tr>
            </table>
            <p style="line-height: 28px;">
                <b>Kindly confirm if you are available with this schedule as soon as possible</b>.Dont forget to bring
                along the documents you
                required to bring to the offline interview
            </p>
            {{-- <p style="line-height: 28px;">
                Please be informed that we are in the midst of
                processing the applications
                and shall get in touch with you again if you are
                shortlisted for an interview.
            </p> --}}
            <div class="divider" style="height: 1px; background: #053050; width: 100%;"></div>
            <p style="line-height: 28px;">
                Thank you in advance.
                <br>
                <b>Talent Acquisition Team</b>
            </p>
        </div>
    </div>
</body>
