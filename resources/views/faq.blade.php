@extends('layouts.main')

@section('content')
<div class="container" id="faq" style="min-height:625px;">
    <h1>FAQ</h1>
    <div class="row">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            @foreach($faqs as $faq)
                <div class="panel">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#q{{ $loop->iteration }}" aria-expanded="false" aria-controls="q{{ $loop->iteration }}">
                            <span class="question-number">{{ $loop->iteration }}</span> 
                            {!! $faq->question !!}
                        </h4>
                    </div>
                    <div id="q{{ $loop->iteration }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <p>{!! $faq->answer !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection