@extends('layouts.main')

@section('content')
    <div id="candidate">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar-profile">
                    <div class="panel profile-nav">
                        <a class="nav-item {{ Route::currentRouteName() == 'candidate-profile' || Route::currentRouteName() == 'candidate-profile-edit' ? 'active' : '' }} profile-first"
                            href="{{ route('candidate-profile') }}">
                            <div class="profile"
                                style="text-overflow: ellipsis;
						white-space: nowrap;
						overflow: hidden;">
                                <div class="va-table">
                                    <div class="va-middle">
                                        <div class="prof-pic"><img
                                                src="{{ asset($candidate->photo ? 'upload/candidates/' . md5($candidate->candidate_id . 'folder') . '/' . $candidate->photo : 'img/no-pic.jpg') }}"
                                                class="img-responsive"></div>
                                    </div>
                                    <div class="va-middle">
                                        <div class="name mar-t-0">
                                            <span><b>{{ Auth::user()->name }}</b></span><br><span>{{ Auth::user()->email }}</span><br><span
                                                class="label label-primary">Lihat Profil</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                        <a class="nav-item {{ !Auth::user()->candidate->isMainProfileComplete() ? 'uncompleted' : '' }} {{ Route::currentRouteName() == 'candidate-summary' || Route::currentRouteName() == 'candidate-summary-edit' ? 'active' : '' }}"
                            href="{{ route('candidate-summary') }}"><i class="fa fa-user"></i> Profil</a>
                        <a class="nav-item {{ Route::currentRouteName() == 'candidate-experience' || Route::currentRouteName() == 'create-candidate-experience' ? 'active' : '' }}"
                            href="{{ route('candidate-experience') }}"><i class="fa fa-briefcase"></i> Pengalaman</a>
                        <a class="nav-item {{ Auth::user()->candidate->educations->count() === 0 ? 'uncompleted' : '' }} {{ Route::currentRouteName() == 'candidate-education' || Route::currentRouteName() == 'create-candidate-education' ? 'active' : '' }}"
                            href="{{ route('candidate-education') }}"><i class="fa fa-graduation-cap"></i> Pendidikan</a>
                        <a class="nav-item {{ Auth::user()->candidate->skills->count() === 0 ? 'uncompleted' : '' }} {{ Route::currentRouteName() == 'candidate-skill' || Route::currentRouteName() == 'create-candidate-skill' ? 'active' : '' }}"
                            href="{{ route('candidate-skill') }}"><i class="fa fa-star"></i> Keahlian</a>
                        <a class="nav-item {{ Route::currentRouteName() == 'candidate-info' || Route::currentRouteName() == 'edit-candidate-info' ? 'active' : '' }}"
                            href="{{ route('candidate-info') }}"><i class="fa fa-list"></i> Info Lain</a>
                        <a class="nav-item {{ Auth::user()->candidate->cv === null ? 'uncompleted' : '' }} {{ Route::currentRouteName() == 'candidate-cv' ? 'active' : '' }}"
                            href="{{ route('candidate-cv') }}"><i class="fa fa-paper-plane-o"></i> Unggah CV/Resume</a>
                        <a class="nav-item {{ Auth::user()->candidate->pvi === null ? 'uncompleted' : '' }} {{ Route::currentRouteName() == 'candidate-pvi' || Route::currentRouteName() == 'edit-candidate-pvi' ? 'active' : '' }}"
                            href="{{ route('candidate-pvi') }}"><i class="fa fa-video-camera"></i> PVI</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-content">
                    <div class="panel">
                        @yield('profile-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
