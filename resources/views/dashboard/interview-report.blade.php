@extends('layouts.dashboard')

@section('breadcrumb')
    <b><a href="{{ route('dashboard-jobs') }}">Lowongan</a></b>&nbsp;&nbsp;&nbsp;<i
        class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;<b><a
            href="{{ route('detail-job', $job->id) }}">{{ $job->title }}</a></b>&nbsp;&nbsp;&nbsp;<i
        class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;Kandidat: <b>{{ $candidate->user->name }}</b>&nbsp;&nbsp;&nbsp;<i
        class="fa fa-chevron-right"></i>&nbsp;&nbsp;&nbsp;<b>Hasil Interview</b>
@stop

<style>
    /* Rating Star Widgets Style */
    .rating-stars ul {
        list-style-type: none;
        padding: 0;

        -moz-user-select: none;
        -webkit-user-select: none;
    }

    .rating-stars ul>li.star {
        display: inline-block;

    }

    /* Idle State of the stars */
    .rating-stars ul>li.star>i.fa {
        font-size: 2.5em;
        /* Change the size of the stars */
        color: #ccc;
        /* Color on idle state */
    }

    /* Hover state of the stars */
    .rating-stars ul>li.star.hover>i.fa {
        color: #FFCC36;
    }

    /* Selected state of the stars */
    .rating-stars ul>li.star.selected>i.fa {
        color: #FF912C;
    }
</style>

@section('content')
    <div class="header-sub" style="width: auto !important;">
        <div class="va-table width-100">
            <div class="va-middle width-50">Hasil Interview: <span
                    style="text-transform: uppercase;"><b>{{ $candidate->user->name }}</b></span></div>
            <div class="va-middle width-50 ta-right"><i class="fa fa-user-circle"></i></div>
        </div>
    </div>
    <div class="panel interview-report" style="border-top: none;">

        <ul class="nav nav-tabs text-center" role='tab-list'>
            <li role="presentation" class="active"><a href="#summary">Rangkuman</a></li>
            @foreach ($job->steps as $step)
                <?php $step_id = $step->pivot->step_id; ?>
                @if ($step_id >= 3 && $step_id < 7)
                    <?php
                    if ($step_id == 3) {
                        $name = 'Interview HC';
                    } elseif ($step_id == 4) {
                        $name = 'Interview HCHO';
                    } elseif ($step_id == 5) {
                        $name = 'Interview User 1';
                    } elseif ($step_id == 6) {
                        $name = 'Interview User 2';
                    }
                    ?>
                    <li role="presentation"><a href="#interview-{{ $loop->iteration }}">{{ $name }}</a></li>
                @endif
            @endforeach
        </ul>

        <div class="tab-content">
            <div class="list-item tab-pane active" role='tab-panel' id='summary'>
                <div class="container-fluid" style="border: 1px solid #ccc;margin-top: -1px;padding: 0px 30px;">
                    <div class="candidate-data">
                        <div class="row">
                            <div class="col-sm-2">Nama Kandidat</div>
                            <div class="col-sm-4">: <b>{{ $candidate->user->name }}</b></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">Target Posisi</div>
                            <div class="col-sm-4">: <b>{{ $job->title }}</b></div>
                        </div>
                    </div>
                    <div class="form-interview">
                        <div class="row">
                            <table class='table table-bordered' style="font-size: 14px;">
                                <thead style="background: #f2f2f2;">
                                    <tr>
                                        <th rowspan="2" style="text-align: center; vertical-align: middle;">KOMPETENSI
                                            INTI <i>(CORE COMPETENCY)</i></th>
                                        <th colspan="4" style="text-align: center; vertical-align: middle;">RATING</th>
                                    </tr>
                                    <tr>
                                        <td align="center">HC 1 <a href="#interview-3" class='btn btn-primary'>Evaluasi</a>
                                        </td>
                                        <td align="center">HC 2 <a href="#interview-4" class='btn btn-primary'>Evaluasi</a>
                                        </td>
                                        <td align="center">User 1 <a href="#interview-5"
                                                class='btn btn-primary'>Evaluasi</a></td>
                                        <td align="center">User 2 <a href="#interview-6"
                                                class='btn btn-primary'>Evaluasi</a></td>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $interviews = $job->interviews; ?>
                                    @foreach ($forms as $form)
                                        <tr style="background: #f2f2f2;">
                                            <td colspan="6"><b>{{ $form->competence }}</b></td>
                                        </tr>
                                        <?php $resultDetails = [$job->interviewResultDetail($interviews->get(0)->id, $job->id, $candidate->id, $form->id), $job->interviewResultDetail($interviews->get(1)->id, $job->id, $candidate->id, $form->id), $job->interviewResultDetail($interviews->get(2)->id, $job->id, $candidate->id, $form->id), $job->interviewResultDetail($interviews->get(3)->id, $job->id, $candidate->id, $form->id), $job->interviewResultDetail($interviews->get(4)->id, $job->id, $candidate->id, $form->id)]; ?>
                                        <tr>
                                            <td>{{ $form->definition }}</td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <div class="va-table width-100">
                                                    <div class="va-middle">HC 1</div>
                                                </div>
                                                <div class="va-table width-100">
                                                    <div class="va-middle">
                                                        @if ($resultDetails[0] != null)
                                                            <div>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[0]['rating'] >= 1 ? '#FF912C' : '#666666' }};"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[0]['rating'] >= 2 ? '#FF912C' : '#666666' }};"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[0]['rating'] >= 3 ? '#FF912C' : '#666666' }};"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[0]['rating'] >= 4 ? '#FF912C' : '#666666' }};"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[0]['rating'] >= 5 ? '#FF912C' : '#666666' }};"></i></span>
                                                            </div>
                                                        @else
                                                            <div>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <div class="va-table width-100">
                                                    <div class="va-middle">HC 2</div>
                                                </div>
                                                <div class="va-table width-100">
                                                    <div class="va-middle">
                                                        @if ($resultDetails[1] != null)
                                                            <div>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[1]['rating'] >= 1 ? '#FF912C' : '#666666' }};"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[1]['rating'] >= 2 ? '#FF912C' : '#666666' }};"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[1]['rating'] >= 3 ? '#FF912C' : '#666666' }};"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[1]['rating'] >= 4 ? '#FF912C' : '#666666' }};"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[1]['rating'] >= 5 ? '#FF912C' : '#666666' }};"></i></span>
                                                            </div>
                                                        @else
                                                            <div>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <div class="va-table width-100">
                                                    <div class="va-middle">User 1</div>
                                                </div>
                                                <div class="va-table width-100">
                                                    <div class="va-middle">
                                                        @if ($resultDetails[2] != null)
                                                            <div>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[2]['rating'] >= 1 ? '#FF912C' : '#666666' }};"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[2]['rating'] >= 2 ? '#FF912C' : '#666666' }};"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[2]['rating'] >= 3 ? '#FF912C' : '#666666' }};"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[2]['rating'] >= 4 ? '#FF912C' : '#666666' }};"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[2]['rating'] >= 5 ? '#FF912C' : '#666666' }};"></i></span>
                                                            </div>
                                                        @else
                                                            <div>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <div class="va-table width-100">
                                                    <div class="va-middle">User 2</div>
                                                </div>
                                                <div class="va-table width-100">
                                                    <div class="va-middle">
                                                        @if ($resultDetails[3] != null)
                                                            <div>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[3]['rating'] >= 1 ? '#FF912C' : '#666666' }};"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[3]['rating'] >= 2 ? '#FF912C' : '#666666' }};"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[3]['rating'] >= 3 ? '#FF912C' : '#666666' }};"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[3]['rating'] >= 4 ? '#FF912C' : '#666666' }};"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: {{ $resultDetails[3]['rating'] >= 5 ? '#FF912C' : '#666666' }};"></i></span>
                                                            </div>
                                                        @else
                                                            <div>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                                <span><i class="fa fa-star"
                                                                        style="color: #666666;"></i></span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="6">
                                                <div class="width-100"
                                                    style="padding: 5px 10px;margin: -5px -5px 10px -5px ;border-bottom: 1px solid #f2f2f2;">
                                                    <b>Deskripsi hasil interview:</b>
                                                </div>
                                                @for ($i = 0; $i < 4; $i++)
                                                    <p>
                                                        <b>{{ $interviews->get($i)->step->name }}</b> -
                                                        {{ $interviews->get($i)->interviewer }}: <br>
                                                        {{ $resultDetails[$i] != null ? $resultDetails[$i]['description'] : '-' }}
                                                    </p>
                                                @endfor

                                            </td>
                                        </tr>
                                    @endforeach
                                    <?php $result = ['Not Recommended', 'Recommended', 'To Be Considered', 'Belum menilai']; ?>
                                    <?php $class = ['danger text-danger', 'success text-success', 'active text-active', 'warning text-warning']; ?>
                                    <?php $interviewResults = [$job->interviewResults($interviews->get(0)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(0)->id, $job->id, $candidate->id)['result'] : 3, $job->interviewResults($interviews->get(1)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(1)->id, $job->id, $candidate->id)['result'] : 3, $job->interviewResults($interviews->get(2)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(2)->id, $job->id, $candidate->id)['result'] : 3, $job->interviewResults($interviews->get(3)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(3)->id, $job->id, $candidate->id)['result'] : 3, $job->interviewResults($interviews->get(4)->id, $job->id, $candidate->id) !== null ? $job->interviewResults($interviews->get(4)->id, $job->id, $candidate->id)['result'] : 3]; ?>
                                    <tr>
                                        <td style="background: #f2f2f2;vertical-align: middle;">
                                            <b>Hasil / Kesimpulan</b>
                                        </td>
                                        <td style="vertical-align: middle;"
                                            class="text-center {{ $class[$interviewResults[0]] }}">
                                            {{ $result[$interviewResults[0]] }}</td>
                                        <td style="vertical-align: middle;"
                                            class="text-center {{ $class[$interviewResults[1]] }}">
                                            {{ $result[$interviewResults[1]] }}</td>
                                        <td style="vertical-align: middle;"
                                            class="text-center {{ $class[$interviewResults[2]] }}">
                                            {{ $result[$interviewResults[2]] }}</td>
                                        <td style="vertical-align: middle;"
                                            class="text-center {{ $class[$interviewResults[3]] }}">
                                            {{ $result[$interviewResults[3]] }}</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($job->interviews as $interview)
                <div class="list-item tab-pane" role='tab-panel' id='interview-{{ $interview->step->id }}'
                    style="border: 1px solid #ccc;margin-top: -1px;padding: 0px 30px;">
                    <h3>{{ $interview->step->name }}<br><small>Interviewer: {{ $interview->interviewer_name != NULL ? $interview->interviewer_name." / ".$interview->interviewer_backup : $interview->interviewer }}</small></h3>
                    <form method="POST" action='{{ route('evaluate', [$job->job_id, $candidate->candidate_id]) }}'
                        class='form-horizontal' style="padding-right: 0px;padding-left: 0px;">
                        {{ csrf_field() }}
                        <input type="hidden" name="job_interview_id"
                            value='{{ $job->interviews->get($loop->iteration - 1)->id }}'>
                        <div class="container-fluid" style="padding: 0px;">
                            <div style="display: block;">
                                @foreach ($forms as $form)
                                    <div style="float: left; width:50%; min-height: 250px;">
                                        <?php $detail = $job->interviewResultDetail($interview->id, $job->id, $candidate->id, $form->id); ?>
                                        <div class="va-table" style="border: 1px solid #ccc; padding: 10px; margin: 5px;">
                                            <div class="va-top">
                                                <div
                                                    style="background: #f2f2f2; padding: 5px 20px; margin: -10px -10px 10px -10px; position:relative;">
                                                    <div class="va-table" style="height: 50px;">
                                                        <div class="va-middle">
                                                            <b>{{ $form->competence }}</b>
                                                        </div>
                                                    </div>
                                                    <div style="position:absolute;top: 0px;right:0px;">
                                                        <div
                                                            style="background: #333; color:#fff; padding: 3px; width:20px;text-align: center;">
                                                            {{ $loop->iteration }}</div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <section class='rating-widget' style="cursor: pointer;">
                                                        @if ($detail != null)
                                                            <div class='rating-stars text-center'>
                                                                <ul id='stars'>
                                                                    <li onclick='star("rate{{ '-' . $interview->id . '-' . $form->id }}", 1)'
                                                                        class='star {{ $detail['rating'] >= 1 ? 'selected' : '' }}'
                                                                        title='Poor' data-value='1'>
                                                                        <i class='fa fa-star'></i>
                                                                    </li>
                                                                    <li onclick='star("rate{{ '-' . $interview->id . '-' . $form->id }}", 2)'
                                                                        class='star {{ $detail['rating'] >= 2 ? 'selected' : '' }}'
                                                                        title='Fair' data-value='2'>
                                                                        <i class='fa fa-star'></i>
                                                                    </li>
                                                                    <li onclick='star("rate{{ '-' . $interview->id . '-' . $form->id }}", 3)'
                                                                        class='star {{ $detail['rating'] >= 3 ? 'selected' : '' }}'
                                                                        title='Good' data-value='3'>
                                                                        <i class='fa fa-star'></i>
                                                                    </li>
                                                                    <li onclick='star("rate{{ '-' . $interview->id . '-' . $form->id }}", 4)'
                                                                        class='star {{ $detail['rating'] >= 4 ? 'selected' : '' }}'
                                                                        title='Excellent' data-value='4'>
                                                                        <i class='fa fa-star'></i>
                                                                    </li>
                                                                    <li onclick='star("rate{{ '-' . $interview->id . '-' . $form->id }}", 5)'
                                                                        class='star {{ $detail['rating'] >= 5 ? 'selected' : '' }}'
                                                                        title='WOW!!!' data-value='5'>
                                                                        <i class='fa fa-star'></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endif

                                                        <!-- Rating Stars Box -->


                                                    </section>
                                                    <input type="hidden" name="interview_form_id[]"
                                                        value='{{ $form->id }}' id="{{ $form->id }}">
                                                    <input class="form-control" type='hidden' step='0.1'
                                                        placeholder='Rating'
                                                        id="rate{{ '-' . $interview->id . '-' . $form->id }}"
                                                        name='rating[]' value='{{ $detail }}' />
                                                </div>
                                                <div>Deskripsi</div>
                                                <div>
                                                    <!--<textarea cols="70" rows="3" name='description[]' class="width-100" required="required">{{ $detail != null ? $detail['description'] : '-' }}</textarea>-->
                                                    <textarea cols="70" rows="3" name='description[]' class="width-100" required="required">{{ $detail->description != '' ? $detail['description'] : '-' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="result" style="border-top: none;margin: 0px;">
                                <div class="row">
                                    <div class="form-group">
                                        <label class='col-sm-12'>Hasil / Kesimpulan</label>
                                        <div class="col-sm-offset-1 pull-left">&nbsp;</div>
                                        <div class="radio pull-left">
                                            <?php $result = $job->interviewResults($interview->id, $job->id, $candidate->id) != null ? $job->interviewResults($interview->id, $job->id, $candidate->id)['result'] : '-'; ?>
                                            <label>
                                                <input type="radio" name="result" value='1'
                                                    {{ $result == 1 ? 'checked' : '' }}> Recommended
                                            </label>
                                        </div>
                                        <div class="radio pull-left">
                                            <label>
                                                <input type="radio" name="result" value='2'
                                                    {{ $result == 2 ? 'checked' : '' }}> To be considered
                                            </label>
                                        </div>
                                        <div class="radio pull-left">
                                            <label>
                                                <input type="radio" name="result" value='0'
                                                    {{ $result == 0 && $result != null ? 'checked' : '' }}> Not recommended
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class='col-sm-12'>Catatan</label>
                                        <div class="col-sm-7 col-sm-offset-1">
                                            <textarea cols="70" rows="3" name='remark' required="required"> {{ $job->interviewResults($interview->id, $job->id, $candidate->id) != null ? $job->interviewResults($interview->id, $job->id, $candidate->id)['remark'] : '-' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-offset-1">
                                        <button class="btn blue" style="width: 200px">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>

    @stop

    @push('scripts')
        <script type="text/javascript">
            $('.nav-tabs li a').click(function(e) {
                e.preventDefault()
                $(this).tab('show')
            })
            $('td a').click(function(e) {
                e.preventDefault()
                $(this).tab('show')
                $('.nav-tabs li').removeClass('active')
                $($('.nav-tabs li')[$(this).parent().index() + 1]).addClass('active')
            })

            $(document).ready(function() {

                /* 1. Visualizing things on Hover - See next part for action on click */
                $('#stars li').on('mouseover', function() {
                    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                    // Now highlight all the stars that's not after the current hovered star
                    $(this).parent().children('li.star').each(function(e) {
                        if (e < onStar) {
                            $(this).addClass('hover');
                        } else {
                            $(this).removeClass('hover');
                        }
                    });

                }).on('mouseout', function() {
                    $(this).parent().children('li.star').each(function(e) {
                        $(this).removeClass('hover');
                    });
                });


                /* 2. Action to perform on click */
                $('#stars li').on('click', function() {
                    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                    var stars = $(this).parent().children('li.star');

                    for (i = 0; i < stars.length; i++) {
                        $(stars[i]).removeClass('selected');
                    }

                    for (i = 0; i < onStar; i++) {
                        $(stars[i]).addClass('selected');
                    }

                    // JUST RESPONSE (Not needed)
                    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                    var msg = "";
                    if (ratingValue > 1) {
                        msg = "Thanks! You rated this " + ratingValue + " stars.";
                    } else {
                        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
                    }
                    responseMessage(msg);

                });


            });

            function star(id, val) {
                $("#" + id).val(val);
            }
        </script>
    @endpush
