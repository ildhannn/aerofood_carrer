@extends('layouts.main') @section('content')
<div id="home" style="margin-top:0px;">
    <div class="home-header">        
        <!-- <img src="{{asset('img/bg-home.jpg')}}" class="img-responsive home"> -->
        <div class="img-responsive home"></div>
        <div class="layer">
            <div class="va-table" style="height:100vh; width:100%;">
                <div class="va-middle">
                    <div class="job-search text-center">
                        <div style="padding:15px 0;" class="logo-inbanner"><img src="{{asset('img/logo-white.png')}}" width="100%"></div>
                        <div class="ready-teks pad-l-1em-m pad-r-1em-m">Ready To Be Part of Our Team?<span class="visible-inline-xs-block"><br></span>&nbsp;We Want You in Our Team.</div>
                        <div class="search-panel">
                            <form class='form-horizontal' method="GET" action="{{route('job-search')}}">
                                <div class="form-group">
                                    <div class="col-md-4 mar-b-1em-m">
                                        <input class="form-control" placeholder='Posisi, keahlian, dan kata kunci...' name='title' />
                                    </div>
                                    <div class="col-md-3 mar-b-1em-m">
                                        <select class="form-control" name='field_id'>
                                            <option value='0'>Pilih Bidang</option>
                                            @foreach($fields as $field)
                                                <option value="{{$field->id}}">{{$field->field}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mar-b-1em-m">
                                        <select class="form-control" name='province_id'>
                                            <option value='0'>Pilih Lokasi</option>
                                            @foreach($provinces as $province)
                                            <option value="{{$province->id}}">{{$province->province}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn col-md-12 btn-success width-100-m">Cari&nbsp;&nbsp;<i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
    <div class="newest-job section">
        <div class='text-center teks-peta pad-t-0-m'>LOWONGAN TERBARU AEROFOOD INDONESIA</div>
        <div class="title-divider dark-grey"></div>
        <div class="container section-content">
            <div class="row list-job">
                @foreach($jobs->take(7) as $job)
                <div class="col-md-3">
                    <div class="item" style="padding:0px;position:relative;height:auto !important;">
                        <div class="va-table" style="height:70px; padding:10px 15px; background:#034369; width:100%;">
                            <div class="va-middle" style="text-align:center;"><h4 style="margin:0px;"><a href="{{route('job-detail', $job->job_id)}}" style="color:#fff !important;">{{$job->title}}</a></h4></div>
                        </div>
                        <div class="va-table kotak-desc">
                            <div class="va-middle" style="padding:10px 15px;">
                                <table>
                                    <tr>
                                        <td style="vertical-align:top; width:20px;"><i class="fa fa-map-marker"></i></td>
                                        <td>Aerofood unit: <b>{{$job->city->city.', '.$job->province->province}}</b></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-birthday-cake"></i></td>
                                        <td>Usia minimal <b>{{$job->min_age}} tahun</b></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-graduation-cap"></i></td>
                                        <td>Minimal <b>{{$job->min_education()}}</b></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-briefcase"></i></td>
                                        <td>Pengalaman <b>{{$job->min_experience}} tahun</b></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="va-table" style="width:100%;">
                            <div><a href="{{route('job-detail', $job->job_id)}}" class="btn btn-success" style="width:100%;">DETAIL</a></div>
                        </div>
                        <!--<div class="description">{{$job->description}}</div>-->
                    </div>
                </div>                
                @endforeach
                <div class="col-md-3 tombol-low-lain">
                    <a href="{{route('jobs')}}">
                        <div class="item text-center" style="height:auto !important;">
                            <div class="va-table height-165 height-auto-m" style="width:100%;">
                                <div class="va-middle" style="text-align:center;"><i class="fa fa-briefcase" style="font-size:30px;"></i><br><h4>LIHAT LOWONGAN TERBARU LAINNYA</h4></div>
                            </div>
                            
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="field-job section">
        <h2 class='text-center'>Lowongan berdasarkan keahlian</h2>
        <div class="title-divider dark-grey"></div>
        <div class="container section-content">
            <div class="list-field col-md-10 col-md-offset-1">
                @foreach($fields as $key => $field)
                    @if($field->jobs->count() > 0)
                    <div class="col-sm-6">
                        <a href="{{url('job-search?title=&field_id='.$field->id.'&province_id=0')}}">
                            <div class="item"><i class="fa fa-desktop"></i> {{$field->field}} ({{$field->jobs()->count()}} Lowongan)</div>
                        </a>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>-->

    <!--<div class="location-job section">
        <h2 class='text-center'>Lowongan berdasarkan lokasi</h2>
        <div class="title-divider dark-grey"></div>
        <div class="container section-content">
            <div class="list-field col-md-10 col-md-offset-1">
                <div class="row">
                    @foreach($provinces as $key => $province) @if($loop->first)
                    <div class="col-md-4 job-location">
                        <h4><b>Sumatra</b></h4>
                        @if($province->jobs->count() > 0)
                        <div class="province"><a href="{{url('job-search?title=&field_id=0&province_id='.$province->id)}}">{{$province->province}} ({{$province->jobs->count()}} Lowongan)</a></div>
                        @endif @elseif($province->id
                        < 12 ) @if($province->id == 11)
                    </div>
                    <div class="col-md-4 job-location">
                        <h4><b>Jawa dan Sekitarnya</b></h4>
                        @endif @if($province->jobs->count() > 0)
                        <div class="province"><a href="{{url('job-search?title=&field_id=0&province_id='.$province->id)}}">{{$province->province}} ({{$province->jobs->count()}} Lowongan)</a></div>
                        @endif @elseif($province->id
                        < 21) @if($province->id == 20)
                    </div>
                    <div class="col-md-4 job-location">
                        <h4><b>Kalimantan</b></h4>
                        @endif @if($province->jobs->count() > 0)
                        <div class="province"><a href="{{url('job-search?title=&field_id=0&province_id='.$province->id)}}">{{$province->province}} ({{$province->jobs->count()}} Lowongan)</a></div>
                        @endif @elseif($province->id
                        < 26) @if($province->id == 25)
                    </div>
                    <div class="col-md-4 job-location">
                        <h4><b>Sulawesi</b></h4>
                        @endif @if($province->jobs->count() > 0)
                        <div class="province"><a href="{{url('job-search?title=&field_id=0&province_id='.$province->id)}}">{{$province->province}} ({{$province->jobs->count()}} Lowongan)</a></div>
                        @endif @elseif($province->id
                        < 32) @if($province->id == 31)
                    </div>
                    <div class="col-md-4 job-location">
                        <h4><b>Maluku</b></h4>
                        @endif @if($province->jobs->count() > 0)
                        <div class="province"><a href="{{url('job-search?title=&field_id=0&province_id='.$province->id)}}">{{$province->province}} ({{$province->jobs->count()}} Lowongan)</a></div>
                        @endif @elseif($province->id
                        < 35) @if($province->id == 33)
                    </div>
                    <div class="col-md-4 job-location">
                        <h4><b>Papua</b></h4>
                        @endif @if($province->jobs->count() > 0)
                        <div class="province"><a href="{{url('job-search?title=&field_id=0&province_id='.$province->id)}}">{{$province->province}} ({{$province->jobs->count()}} Lowongan)</a></div>
                        @endif @endif @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>-->

    <div class="location-job" style="background-color:#022940;">
        <div class='text-center teks-peta' style="color:#fff !important; margin-top:0px; text-transform:uppercase;">Lowongan berdasarkan lokasi</div>
        <div class="title-divider" style="background-color:#022940 !important;"></div>
        <div class="section-content" style="position:relative;">
            <div id="mapdiv" class="mapdiv" style="width: 100%; background-color:#022940; -webkit-box-shadow: 0px 20px 30px -17px rgba(0,0,0,0.4);-moz-box-shadow: 0px 20px 30px -17px rgba(0,0,0,0.4);box-shadow: 0px 20px 30px -17px rgba(0,0,0,0.4);"></div>
            <div style="position:absolute; bottom:0; left:0;z-index:2;">
                <div style="background:#022940; width:200px; height:20px;"></div>
            </div>
        </div>
    </div>
</div>


<!--<div class="container section-content">
    <div class="list-field col-md-10 col-md-offset-1">
        @foreach($fields as $key => $field)
            @if($field->jobs->count() > 0)
            <div class="col-sm-6">
                <a href="{{url('job-search?title=&field_id='.$field->id.'&province_id=0')}}">
                    <div class="item"><i class="fa fa-desktop"></i> {{$field->field}} ({{$field->jobs()->count()}} Lowongan)</div>
                </a>
            </div>
            @endif
        @endforeach
    </div>
</div>-->


<style>
    .ammapDescriptionWindow {
      background-color: #ccc;
      padding: 10px;
      border-radius: 5px;
      font-family: Verdana;
      font-size: 10px;
      opacity: 0.95;
      overflow: auto;
    }

    .ammapDescriptionTitle {
      font-weight: bold;
      font-size: 12px;
      margin-bottom: 10px;
        padding-bottom: 50px;
        border-bottom: 1px solid #ccc;
    }                
    
    .ammapDescriptionWindowCloseButton {
        position:absolute;
        top: 3px;
        right: 5px;
    }
</style>

<link rel="stylesheet" href="{{ asset('asset/map-id/ammap/ammap.css') }}" type="text/css">
<script src="{{ asset('asset/map-id/ammap/ammap.js') }}" type="text/javascript"></script>
<!-- check ammap/maps/js/ folder to see all available countries -->
<!-- map file should be included after ammap.js -->
<script src="{{ asset('asset/map-id/ammap/maps/js/indonesiaHigh.js') }}" type="text/javascript"></script>

<script>
    var map;

    AmCharts.ready(function() {
        map = new AmCharts.AmMap();

        var descPB = 'Tersedia <a href="http://en.wikipedia.org/wiki/Burgundy">4 Lowongan Pekerjaan</a><br /><br /><a href="http://en.wikipedia.org/wiki/Burgundy">PSCYCOLOGIST</a><br /><a href="http://en.wikipedia.org/wiki/Burgundy">DANCER</a><br /><a href="http://en.wikipedia.org/wiki/Burgundy">JANITOR</a><br /><a href="http://en.wikipedia.org/wiki/Burgundy">PSCYCOLOGIST</a><br /><br /><a href="http://en.wikipedia.org/wiki/Burgundy">Read the full article</a><br />';
        
        var dataProvider = {
            mapVar: AmCharts.maps.indonesiaHigh,
            /*getAreasFromMap: true,*/
            areas: [
				<?php foreach($provinces as $key => $province){
					
					if($province->jobs->count() > 0){
						echo "{ id:" . $province->id . ",";
						echo "value: " . $province->jobs->count() . ",";
						echo "description: '<a href=\"".url('job-search?title=&field_id=0&province_id='.$province->id)."\">Lihat Semua (".$province->jobs->count()." Lowongan)</a>' },";
					}
				} ?>
				
                ],
            legend: {
                useGraphSettings: false
            },
            balloon: {
                adjustBorderColor: true,
                color: "#FF0000",
                cornerRadius: 90,
                fillColor: "#FFFFFF"
            },
            "images": [
            {
                "type": "circle",
                "label": "Circle Test",
                "top": 100,
                "left": 100
            }]

        };

        map.dataProvider = dataProvider;

        map.areasSettings = {
            autoZoom: true,
            selectedColor: "#00D664",
            selectedOutlineColor: "#0B162F",
            unlistedAreasColor: "#034369",
            unlistedAreasOutlineColor: "#0B162F",
            balloonText: "<span style='text-transform:uppercase;'><b>[[title]]</b></span><br>[[value]] Lowongan Tersedia",
            color: "#035F2E",
            outlineColor: "#0B162F",
            colorSolid: "#00AA4E",
            rollOverOutlineColor: "#FFFFFF",
            descriptionWindowY: 20,
            descriptionWindowX: 550,
            descriptionWindowWidth: 280,
            descriptionWindowHeight: 330            
        };

        map.imagesSettings = {
            labelColor: "#FFFFFF",
            labelRollOverColor: "#FFFFFF",
            labelBackgroundColor: "#FFFFFF",
            outlineAlpha: 1,
            labelFontSize: 14,
            labelPosition: "center",
            outlineColor: "#000000",
            outlineThickness: 1,
            rollOverScale: 2,
            baseAnimationDistance: 200,
            centered: true
        };

        map.addListener("init", function() {
            setTimeout(function() {
                // iterate through areas and put a label over center of each
                map.dataProvider.images = [];
                for (x in map.dataProvider.areas) {
                    var area = map.dataProvider.areas[x];
                    var image = new AmCharts.MapImage();
                    image.latitude = map.getAreaCenterLatitude(area);
                    image.longitude = map.getAreaCenterLongitude(area);
					if(area.value == 1){
						image.label = area.value + " job";
					} else {
						image.label = area.value + " jobs";
					}
                    image.title = area.title;
                    /*image.type = "rectangle";
                    image.color = "#FF0000";
                    image.shiftX = offset;
                    image.width = 22;
                    image.height = 22;*/
                    image.linkToObject = area;
                    map.dataProvider.images.push(image);
                }
                map.validateData();
                console.log(map.dataProvider);
            }, 100)
        });


        map.smallMap = new AmCharts.SmallMap();

        map.write("mapdiv");
    });

</script>
@endsection
