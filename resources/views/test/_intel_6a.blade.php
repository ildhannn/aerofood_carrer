
			<!-- <div class="row test-desc" id='test-1' style="display: none;"> -->
			<div class="row test-desc mar-t-0-m" id='intro-test' >
				<div class="col-sm-8 col-sm-offset-2">
					<div class="col-sm-6">
						<img src="{{asset('img/test.png')}}" width="300" class='pull-right'>
					</div>
					<div class="col-sm-6">
						<h3 class="ta-center-m mar-t-0-m">Tes 6: Daya Bayang Ruang</h3>						
						<div class="ta-center-m">Anda akan mendapatkan soal berikut<br><br>Untuk memulai silahkan klik tombol <b>Mulai</b>.</div><br><br>
						<button class='btn btn-primary pull-right btn-primary' onclick="start_test()">Mulai&nbsp;&nbsp;<i class="fa fa-thumbs-up"></i></button>
					</div>	
				</div>
			</div>
				
		<!-- <div class="row test-container" id='test' style='display: none'> -->
		<div class="row test-container" id='test' style='display: none'>
		    <div class="va-table">
		        <div class="va-middle">
		            
		        </div>
		        <div class="va-middle">
		            
		        </div>
		    </div>
			<div class="col-sm-4 summary-test">
				
				
				<div class="time text-center">
					<h2><small>Waktu Tersisa</small><br><span class='time' data-time="20"></span></h2>
					<span class="warning">Penambahan waktu akan mempengaruhi penilaian</span>
				</div>

				<div class="question-nav">
					
					<div class="info row">
					    <div class="col-md-6"><div class="item">&nbsp;</div> : Belum terjawab</div>
					    <div class="col-md-6"><div class="item answered">&nbsp;</div> : Terjawab</div>
					</div>
					<br>
					<div class="info">
					</div>
					
					<?php $i = 1 ?>
					<?php $q = 1 ?>
						<h3 class="mar-t-0">Intel 1</h3>
						<span data-time='20'></span>
						
						<span class='label label-info'>Jawaban Sudah Tersubmit</span>
						
				</div>
			</div>
			<div class="col-sm-8 questions">
					
					<div class="tool" id='tool-1'>
						<form method="POST" action="{{route('submit-test-answer', 1)}}">
						{{csrf_field()}}
						<input type="hidden" name="test_id" value="">
						</form>
                            <div class="va-table mar-0-auto">
                                <div class="va-middle">
							        <h3 class="ta-center-m">Pilih yang paling menggambarkan diri Anda</h3>
                                </div>
                            </div>
							<div class="step question pad-0-m mar-t-3em-m" id='qt-1' style='display: block; width:100%;'>
								<div class="va-table mar-0-auto">
								    <div class="va-middle" style="background:#000;color:#fff;width:auto;padding:5px 10px;display:block;font-size:18px;">Soal 1</div>
								</div>
								<?php $label = 'a';?>
								<div class="va-table width-100">
								
								<div class="va-middle width-50 display-block-m width-100-m height-100 height-auto-m">
                                    <div class="radio foscheck mar-t-0 mar-b-0 display-block-m">								    
                                        <input type="radio" id="rad_1" name='question_1' value="A" class="foscheck sr-only">
                                        <label for="rad_1" class="foscheck control-label width-100-m"><div class="va-middle">A. 1</div></label>
                                    </div>
								</div>
								
                                </div>
								<div class="navigation">

									<div class="va-table mar-0-auto">
										<div><button class='btn btn-success' onclick="start(7)" ><span class="pull-left">SUBMIT</span></button></div>
									</div>
								</div>
							</div>

					</div>
					
			</div>
		</div>