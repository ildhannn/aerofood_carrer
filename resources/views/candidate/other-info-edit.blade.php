@extends('layouts.candidate')

@section('profile-content')
    <div class="profile-section pad-0 minHeight">
        <div class="va-table width-100" style="padding:20px 20px 20px 20px;background:#dcdcdc;">
            <div class="va-middle pad-b-1em-m ta-center-m"><h4 style=" margin:0px;"><i class="fa fa-list"></i>&nbsp;INFO LAIN</h4></div>
            <div class="va-middle dis-tab-row-m ta-right ta-center-m"><a href="{{route('candidate-info')}}" class='btn btn-success'><i class="fa fa-chevron-left" style="width:auto !important;"></i>&nbsp;&nbsp;KEMBALI</a></div>
        </div>
        <div class="section-content" style="padding:20px 30px;margin:0px;">
            <div class="row mar-b-0">
                <form action="{{ route('update-candidate-info') }}" method='POST' class='form-horizontal'>
                    <div class="col-md-6">
                        {{ csrf_field() }}

                        {{-- <input type="hidden" name="id" value='{{$sosmed->id}}'> --}}

                        <div class="form-group">
                            <label for="other_info" class="col-md-12" style="font-weight:normal;">Silahkan tulis pengalaman lain di luar profesional, bisa berupa proyek, sertifikasi, seminar, dan lain-lain</label>
                            <div class="col-md-12">
                                <textarea id="other_info" name='other_info' class="width-100" rows="10">{!! $candidate->other_info !!}</textarea>
                                @if ($errors->has('other_info'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('other_info') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  
                    </div>
                    {{-- sosmed --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for='x' class="col-md-12" style="font-weight:normal;">X</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="x" name="x" value="{{ $sosmed->x ?? null }}">
                                @if ($errors->has('sosmed'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('x') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='linkedin' class="col-md-12" style="font-weight:normal;">Linkedin</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ $sosmed->linkedin ?? null }}">
                                @if ($errors->has('sosmed'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('linkedin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='tiktok' class="col-md-12" style="font-weight:normal;">Tiktok</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="tiktok" name="tiktok" value="{{ $sosmed->tiktok ?? null }}">
                                @if ($errors->has('sosmed'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tiktok') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for='instagram' class="col-md-12" style="font-weight:normal;">Instagram</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $sosmed->instagram ?? null }}">
                                @if ($errors->has('sosmed'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('instagram') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row mar-b-0">
                            <div class="col-md-12 text-right">
                                <button class='btn btn-success' style="text-transform:uppercase;"><i class="fa fa-floppy-o"
                                    style="width:auto;"></i>&nbsp;&nbsp;Simpan Info Lain</button>
                            </div>
                        </div>
                    </div>                    
                </form>    
            </div>
        </div>
    </div>
@stop

@push('styles')
    <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/summernote.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            /*$('#info').summernote({
              toolbar: [
    		    ['style', ['bold', 'italic', 'underline', 'clear']],
    		    ['font', ['strikethrough', 'superscript', 'subscript']],
    		    ['fontsize', ['fontsize']],
    		    ['color', ['color']],
    		    ['para', ['ul', 'ol', 'paragraph']],
    		    ['height', ['height']]
    		  ],
    		  height: 300,
            });*/

        });

    </script>
@endpush
