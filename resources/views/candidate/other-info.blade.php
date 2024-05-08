@extends('layouts.candidate')

@section('profile-content')
    <div class="profile-section pad-0 minHeight">
        <div class="va-table width-100" style="padding:20px 20px 20px 20px;background:#dcdcdc;">
            <div class="va-middle pad-b-1em-m ta-center-m">
                <h4 style=" margin:0px;"><i class="fa fa-list"></i>&nbsp;INFO LAIN</h4>
            </div>
            <div class="va-middle dis-tab-row-m ta-right ta-center-m">
                <a href="{{ route('edit-candidate-info') }}" class='btn btn-success'>
                    @if ($candidate->other_info == null)
                        <i class="fa fa-plus"style="width:auto !important;"></i>&nbsp;&nbsp;TAMBAH INFO LAIN
                    @else
                        <i class="fa fa-plus"style="width:auto !important;"></i>&nbsp;&nbsp;EDIT INFO LAIN
                    @endif
                </a>
            </div>
        </div>
        <div class="section-content" style="padding:20px 30px;margin:0px;">
            <label for="sosmed" class="form-label" style="margin-top: 20px">Info Lai nnya</label>
            <br>
            @if (!$candidate->other_info)
                <i class="text-muted">(Tidak memiliki info tambahan)</i>
            @else
                {!! $candidate->other_info !!}
            @endif

            <label for="sosmed" class="form-label" style="margin-top: 20px">Sosial Media</label>
            <br>
            @if (!$candidate->sosmed)
                <i class="text-muted">(Tidak memiliki atau belum menambahkan sosial media)</i>
            @else
                <table>
                    <tr>
                        <td><span class="label label-primary">Linkedin :</span></td>
                        <td><label for="sosmed" class="form-label text-muted" style="margin-left: 10px;">{{ $candidate->sosmed->linkedin }}</label>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="label label-danger">Instagram :</span></td>
                        <td><label for="sosmed" class="form-label text-muted" style="margin-left: 10px;">{{ $candidate->sosmed->instagram }}</label>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="label label-default">X :</span></td>
                        <td><label for="sosmed" class="form-label text-muted" style="margin-left: 10px;">{{ $candidate->sosmed->x }}</label></td>
                    </tr>
                    <tr>
                        <td><span class="label label-default">Tiktok :</span></td>
                        <td><label for="sosmed" class="form-label text-muted" style="margin-left: 10px;">{{ $candidate->sosmed->tiktok }}</label>
                        </td>
                    </tr>
                </table>
            @endif

        </div>
    </div>
@stop
