@extends('layouts.candidate')

@section('profile-content')
    <div class="profile-section pad-0 minHeight">
        <div class="va-table width-100" style="padding:20px 20px 20px 20px;background:#dcdcdc;">
            <div class="va-middle pad-b-1em-m ta-center-m"><h4 style=" margin:0px;"><i class="fa fa-star"></i>&nbsp;KEAHLIAN</h4></div>
            <div class="va-middle dis-tab-row-m ta-right ta-center-m">
                <a href="{{ route('create-candidate-skill') }}"
                    class='btn btn-success'><i class="fa fa-plus"
                        style="width:auto !important;"></i>&nbsp;&nbsp;{{ $candidate->skills->count() > 0 ? 'Ubah' : 'Tambah' }}
                    KEAHLIAN</a>
            </div>

        </div>
        <div class="section-content" style="padding:20px 30px;margin:0px;">

            {{-- <div class="profile-section">
         <h4><i class="fa fa-star"></i>Keahlian <a href="{{ route('create-candidate-skill') }}" class='pull-right'><i class="fa fa-plus-circle"></i> {{ $candidate->skills->count() > 0 ? 'Ubah' : 'Tambah' }} keahlian baru</a></h4>
         <div class="section-content"> --}}
            @if ($candidate->skills->count() > 0)
                <div class="info">
                    <label for="skill" class="form-label">Keahlian :</label>
                    <br>
                    @foreach ($candidate->skills as $skill)
                        <span class="badge text-bg-secondary">{{ $skill->name }}</span>
                    @endforeach
                </div>
                {{-- <div class="info">
                    <p>
                        lainnnya :
                        @foreach ($candidate->skills as $skill)
                            <span class="tag">{{ $skill->name }}</span>
                        @endforeach
                    </p>
                </div> --}}
            @else
                <i class="text-muted">(Tidak memiliki keahlian)</i>
            @endif
        </div>
    </div>
@stop
