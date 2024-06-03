<!-- <div class="row test-desc" id='test-1' style="display: none;"> -->
<div class="row test-desc mar-t-0-m" id='intro-test' style="margin-top:45px;">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="col-sm-3">
            <img src="{{ asset('img/test.png') }}" width="300" class='pull-right'>
        </div>
        <div class="col-sm-9">
            <h3 class="ta-center-m mar-t-0-m">Subtes 4: Kemampuan Berhitung</h3>
            <div class="ta-center-m">
                <h4><strong>Petunjuk Pengerjaan</strong></h4>
                <p class="text-justify mar-b-0" style="padding-bottom: 10px;">Buku ini berisi kumpulan soal berupa
                    permasalahan matematis. Silakan kerjakan dan pilih satu jawaban benar dari lima (5) pilihan jawaban
                    yang tersedia.</p>
                <br>
                Untuk memulai silahkan klik tombol <b>Mulai</b>.
            </div><br><br>
            <button class='btn btn-primary pull-right btn-primary' onclick="start_test()">Mulai&nbsp;&nbsp;<i
                    class="fa fa-thumbs-up"></i></button>
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
    <div class="col-sm-3 summary-test">


        <div class="time text-center">
            <h2><small>Waktu Tersisa</small><br><span class='time' data-time="07">07:00</span></h2>
            <span class="warning">Penambahan waktu akan mempengaruhi penilaian</span>
        </div>

        <div class="question-nav">

            <div class="info row">
                <div class="col-md-6">
                    <div class="item">&nbsp;</div> : Belum terjawab
                </div>
                <div class="col-md-6">
                    <div class="item answered">&nbsp;</div> : Terjawab
                </div>
            </div>
            <br>
            <div class="info">
            </div>

            <h3 class="mar-t-0">Subtest 4</h3>
            <span data-time='07'></span>
            @foreach ($questions as $key => $question)
                <div class="item item-disc" data-question='1' id="navq-{{ $question->id }}">{{ $key + 1 }}</div>
            @endforeach

        </div>
    </div>
    <div class="col-sm-9 questions">

        <div class="tool" id='tool-1'>

            <div class="va-table mar-0-auto">
                <div class="va-middle">
                    <div class="va-middle"
                        style="background:#000;color:#fff;width:auto;padding:5px 10px;display:block;font-size:18px;">
                        Subtes 4: Kemampuan Berhitung</div>
                    <br />
                </div>
            </div>
            <div class="va-table mar-0-auto">
                <div class="va-middle ta-center">
                    <button type="button" class="btn btn-secondary" id="btn-petunjuk-pengerjaan">Petunjuk
                        Pengerjaan&nbsp;&nbsp;<i class="fa fa-chevron-down"></i></button>
                    <div class="ta-center" id="petunjuk-pengerjaan"
                        style="margin:0 auto; width:70%; border: 1px solid #ccc; padding:1em;">
                        <p class="text-justify mar-b-0" style="padding-bottom: 10px;">Buku ini berisi kumpulan soal
                            berupa permasalahan matematis. Silakan kerjakan dan pilih satu jawaban benar dari lima (5)
                            pilihan jawaban yang tersedia.</p>
                    </div>
                </div>
            </div>
            <div class="step question pad-0-m mar-t-3em-m pad-l-0 pad-r-0 intel-4-test" id='qt-1'
                style='display: block; width:100%;'>
                <form method="GET" id="form_intel" action="{{ route('submit-intel-test') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="job_id" value="{{ $job_id }}">
                    <input type="hidden" name="subtest" value="4">
                    <input type="hidden" name="jumsoal" value="{{ count($questions) }}">
                    <input type="hidden" name="finished_time">
                    @foreach ($questions as $key => $question)
                        <input type="hidden" name="soal[{{ $key }}]" value="{{ $question->id }}">
                        <input type="hidden" name="kunci[{{ $key }}]" value="{{ $question->answer }}">
                        <div class="pad-b-1em">
                            <div class="va-table width-100">
                                <div class="va-middle width-50 display-block-m width-100-m pad-b-1em fs-18">
                                    {{ $key + 1 . '. ' . $question->question }}

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="va-table width-100">
                                        <div class="va-middle width-50 display-block-m width-100-m"
                                            style="padding-bottom: 10px;">
                                            <div class="radio foscheck mar-t-0 mar-b-0 display-block-m">
                                                <input type="radio" id="rad_{{ $question->id }}_a"
                                                    for="{{ $question->id }}" name='answer[{{ $key }}]'
                                                    value="A" class="foscheck sr-only">
                                                <label for="rad_{{ $question->id }}_a"
                                                    class="foscheck control-label width-100-m" style="height:auto;">
                                                    <div class="va-middle">A. {{ $question->option_a }}</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="va-table width-100">
                                        <div class="va-middle width-50 display-block-m width-100-m"
                                            style="padding-bottom: 10px;">
                                            <div class="radio foscheck mar-t-0 mar-b-0 display-block-m">
                                                <input type="radio" id="rad_{{ $question->id }}_b"
                                                    for="{{ $question->id }}" name='answer[{{ $key }}]'
                                                    value="B" class="foscheck sr-only">
                                                <label for="rad_{{ $question->id }}_b"
                                                    class="foscheck control-label width-100-m" style="height:auto;">
                                                    <div class="va-middle">B. {{ $question->option_b }}</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="va-table width-100">
                                        <div class="va-middle width-50 display-block-m width-100-m"
                                            style="padding-bottom: 10px;">
                                            <div class="radio foscheck mar-t-0 mar-b-0 display-block-m">
                                                <input type="radio" id="rad_{{ $question->id }}_c"
                                                    for="{{ $question->id }}" name='answer[{{ $key }}]'
                                                    value="C" class="foscheck sr-only">
                                                <label for="rad_{{ $question->id }}_c"
                                                    class="foscheck control-label width-100-m" style="height:auto;">
                                                    <div class="va-middle">C. {{ $question->option_c }}</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="va-table width-100">
                                        <div class="va-middle width-50 display-block-m width-100-m"
                                            style="padding-bottom: 10px;">
                                            <div class="radio foscheck mar-t-0 mar-b-0 display-block-m">
                                                <input type="radio" id="rad_{{ $question->id }}_d"
                                                    for="{{ $question->id }}" name='answer[{{ $key }}]'
                                                    value="D" class="foscheck sr-only">
                                                <label for="rad_{{ $question->id }}_d"
                                                    class="foscheck control-label width-100-m" style="height:auto;">
                                                    <div class="va-middle">D. {{ $question->option_d }}</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="va-table width-100">
                                        <div class="va-middle width-50 display-block-m width-100-m"
                                            style="padding-bottom: 10px;">
                                            <div class="radio foscheck mar-t-0 mar-b-0 display-block-m">
                                                <input type="radio" id="rad_{{ $question->id }}_e"
                                                    for="{{ $question->id }}" name='answer[{{ $key }}]'
                                                    value="E" class="foscheck sr-only">
                                                <label for="rad_{{ $question->id }}_e"
                                                    class="foscheck control-label width-100-m" style="height:auto;">
                                                    <div class="va-middle">E. {{ $question->option_e }}</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </form>

                <div class="navigation">

                    <div class="va-table mar-0-auto">
                        <div><button class='btn btn-success' onclick="start(5, {{ $job_id }}, 1)"><span
                                    class="pull-left">SOAL SELANJUTNYA</span></button></div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        $("#petunjuk-pengerjaan").hide();
        $("#btn-petunjuk-pengerjaan").hover(function() {
            $("#petunjuk-pengerjaan").show(300);
        });
        $("#btn-petunjuk-pengerjaan").mouseleave(function() {
            $("#petunjuk-pengerjaan").hide(300);
        });

        $("input[type='radio']").click(function() {
            var q = $(this).attr('for');
            if (!$('#navq-' + q).hasClass('answered')) {
                $('#navq-' + q).addClass('answered');
            }
        });

        $("label").dblclick(function() {
            var fo = $(this).attr('for');
            var q = $("#" + fo).attr('name');
            $("input[name='" + q + "']").prop('checked', false);
            $('#navq-' + q).removeClass('answered');
        });
    });
</script>
