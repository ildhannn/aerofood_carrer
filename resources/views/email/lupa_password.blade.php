<body style="background: #eee">
    <?php
    $path_logo = public_path() . '\img\mail-header.PNG';
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
            {{-- <img src="{{$message ?? ''->embed($path_logo)}}" style="height: auto; width: 100%"> --}}
        </div>


        <div class="content" style="padding: 20px 50px;">

            <h3>Permintaan Reset Password {{ $email }}</h3>
            <div class="divider" style="height: 1px;
		background: #053050;
		width: 100%;"></div>
            <p style="line-height: 28px;">
                Request ganti password rekrutmen aerofood
                klik link berikut :
            </p>
            <a href="{{ route('lupa_password-email', ['email' => $email, 'id' => $id]) }}">Klik disini</a>
        </div>
    </div>
</body>
