@extends('layouts.dashboard')

@section('breadcrumb')
    <b>Home</b>
@stop

@section('content')

    <div class="container-fluid" style="margin-left: 0px;margin-right: 0px;">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <div style="color: #fff;">
                        <div class="va-table" style="width: 100%;">
                            <div class="va-middle"
                                style="width: 5%;text-align: center;background-color: #3342EE; padding: 1em;"><i
                                    class="fa fa-user-circle fa-lg"></i></div>
                            <div class="va-middle" style="width: 65%;background-color: #3371EE; padding: 1em;">JUMLAH SEMUA
                                KANDIDAT</div>
                            <div class="va-middle"
                                style="width: 30%;text-align: center;background-color: #3371EE; padding: 1em;"><span
                                    style="font-size: 20px;">{{ $arr['total_candidate'] }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <div style="width: 100%; color: #fff;">
                        <div class="va-table" style="width: 100%;position: relative;">
                            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                                aria-controls="collapseExample">
                                <div class="va-middle"
                                    style="width: 5%;text-align: center;background-color: #3342EE; padding: 1.3em;color: #FFF;">
                                    <i class="fa fa-ellipsis-h fa-lg"></i>
                                </div>
                            </a>
                            <div class="bounce tooltip">
                                <span class="tooltiptext">CLICK FOR DETAIL</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-group">
                    <div style="color: #fff;">
                        <div class="va-table" style="width: 100%;">
                            <div class="row">
                                <div class="col-md-5">
                                    <a class='view-profile' onclick='getCandidateEducation(0);' href='#'
                                        style="text-decoration: none">
                                        <div class="va-middle"
                                            style="width: 100%;background-color: #C70039; padding: 1em;color:white;">TINGKAT
                                            SMA / SEDERAJAT</div>
                                        <div class="va-middle"
                                            style="text-align: center;background-color: #C70039; padding: 1em;color:white">
                                            <span style="font-size: 20px;">{{ $arr['arr_qualification'][0] }}</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class='view-profile' onclick='getCandidateEducation(1);' href='#'
                                                style="text-decoration: none">
                                                <div class="va-middle"
                                                    style="width: 100%;background-color: #FFC300; padding: 1em;color:white">
                                                    D1 - D4</div>
                                                <div class="va-middle"
                                                    style="text-align: center;background-color: #FFC300; padding: 1em;color:white">
                                                    <span style="font-size: 20px;">{{ $arr['arr_qualification'][1] }}</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class='view-profile' onclick='getCandidateEducation(2);' href='#'
                                                style="text-decoration: none">
                                                <div class="va-middle"
                                                    style="width: 100%;background-color: #33EE87; padding: 1em;color:white">
                                                    S1 - S3</div>
                                                <div class="va-middle"
                                                    style="text-align: center;background-color: #33EE87; padding: 1em;color:white">
                                                    <span style="font-size: 20px;">{{ $arr['arr_qualification'][2] }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div style="text-align: center; margin-bottom: 1em;">
              <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Detail Jobs<br><i class="fa fa-chevron-down"></i></a>
             </div> -->
        <div class="collapse" id="collapseExample">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <div style="width: 100%; color: #fff;">
                            <div class="va-table" style="width: 100%;">
                                <div class="va-middle"
                                    style="width: 10%;text-align: center;background-color: #449C44; padding: 1em;"><i
                                        class="fa fa-check-circle fa-lg"></i></div>
                                <div class="va-middle" style="width: 60%;background-color: #5cb85c; padding: 1em;">Matched
                                </div>
                                <div class="va-middle"
                                    style="width: 30%;text-align: center;background-color: #5cb85c; padding: 1em;"><span
                                        style="font-size: 25px;">{{ $arr['arr_step']['Matched'] }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div style="width: 100%; color: #fff;">
                            <div class="va-table" style="width: 100%;">
                                <div class="va-middle"
                                    style="width: 10%;text-align: center;background-color: #449C44; padding: 1em;"><i
                                        class="fa fa-server fa-lg"></i></div>
                                <div class="va-middle" style="width: 60%;background-color: #5cb85c; padding: 1em;">
                                    Shortlisted</div>
                                <div class="va-middle"
                                    style="width: 30%;text-align: center;background-color: #5cb85c; padding: 1em;"><span
                                        style="font-size: 25px;">{{ $arr['arr_step']['Shortlisted'] }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div style="width: 100%; color: #fff;">
                            <div class="va-table" style="width: 100%;">
                                <div class="va-middle"
                                    style="width: 10%;text-align: center;background-color: #449C44; padding: 1em;"><i
                                        class="fa fa-video-camera fa-lg"></i></div>
                                <div class="va-middle" style="width: 60%;background-color: #5cb85c; padding: 1em;">PVI
                                </div>
                                <div class="va-middle"
                                    style="width: 30%;text-align: center;background-color: #5cb85c; padding: 1em;"><span
                                        style="font-size: 25px;">{{ $arr['arr_step']['PVI'] }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div style="width: 100%; color: #fff;">
                            <div class="va-table" style="width: 100%;">
                                <div class="va-middle"
                                    style="width: 10%;text-align: center;background-color: #449C44; padding: 1em;"><i
                                        class="fa fa-globe fa-lg"></i></div>
                                <div class="va-middle" style="width: 60%;background-color: #5cb85c; padding: 1em;">Online
                                    Test</div>
                                <div class="va-middle"
                                    style="width: 30%;text-align: center;background-color: #5cb85c; padding: 1em;"><span
                                        style="font-size: 25px;">{{ $arr['arr_step']['OnlineTest'] }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <div style="width: 100%; color: #fff;">
                            <div class="va-table" style="width: 100%;">
                                <div class="va-middle"
                                    style="width: 10%;text-align: center;background-color: #449C44; padding: 1em;"><i
                                        class="fa fa-exchange fa-lg"></i></div>
                                <div class="va-middle" style="width: 60%;background-color: #5cb85c; padding: 1em;">
                                    Interview</div>
                                <div class="va-middle"
                                    style="width: 30%;text-align: center;background-color: #5cb85c; padding: 1em;"><span
                                        style="font-size: 25px;">{{ $arr['arr_step']['Interview'] }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div style="width: 100%; color: #fff;">
                            <div class="va-table" style="width: 100%;">
                                <div class="va-middle"
                                    style="width: 10%;text-align: center;background-color: #449C44; padding: 1em;"><i
                                        class="fa fa-medkit fa-lg"></i></div>
                                <div class="va-middle" style="width: 60%;background-color: #5cb85c; padding: 1em;">MCU
                                </div>
                                <div class="va-middle"
                                    style="width: 30%;text-align: center;background-color: #5cb85c; padding: 1em;"><span
                                        style="font-size: 25px;">{{ $arr['arr_step']['MCU'] }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div style="width: 100%; color: #fff;">
                            <div class="va-table" style="width: 100%;">
                                <div class="va-middle"
                                    style="width: 10%;text-align: center;background-color: #449C44; padding: 1em;"><i
                                        class="fa fa-folder-open fa-lg"></i></div>
                                <div class="va-middle" style="width: 60%;background-color: #5cb85c; padding: 1em;">
                                    Offering</div>
                                <div class="va-middle"
                                    style="width: 30%;text-align: center;background-color: #5cb85c; padding: 1em;"><span
                                        style="font-size: 25px;">{{ $arr['arr_step']['Offering'] }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div style="width: 100%; color: #fff;">
                            <div class="va-table" style="width: 100%;">
                                <div class="va-middle"
                                    style="width: 10%;text-align: center;background-color: #449C44; padding: 1em;"><i
                                        class="fa fa-thumbs-up fa-lg"></i></div>
                                <div class="va-middle" style="width: 60%;background-color: #5cb85c; padding: 1em;">Hired
                                </div>
                                <div class="va-middle"
                                    style="width: 30%;text-align: center;background-color: #5cb85c; padding: 1em;"><span
                                        style="font-size: 25px;">{{ $arr['arr_step']['Hired'] }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="header-sub" style="background-color: #22262E !important;">
                        <div class="va-table width-100">
                            <div class="va-middle width-50">KEWARGANEGARAAN KANDIDAT</div>
                            <div class="va-middle width-50 ta-right"><i class="fa fa-pie-chart"></i></div>
                        </div>
                    </div>
                    <div class="lists candidate">
                        <div class="list-content" style="padding: 1em;">
                            <div class="chart-container">
                                <div class="chart has-fixed-height" id="chart_kewarganegaraan"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="header-sub" style="background-color: #22262E !important;">
                        <div class="va-table width-100">
                            <div class="va-middle width-50">USIA KANDIDAT</div>
                            <div class="va-middle width-50 ta-right"><i class="fa fa-bar-chart"></i></div>
                        </div>
                    </div>
                    <div class="lists candidate">
                        <div class="list-content" style="padding: 1em;">
                            <div class="chart-container">
                                <div class="chart has-fixed-height" id="chart_usia"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="header-sub" style="background-color: #22262E !important;">
                        <div class="va-table width-100">
                            <div class="va-middle width-50">PROPINSI KANDIDAT TERBANYAK</div>
                            <div class="va-middle width-50 ta-right"><i class="fa fa-map-marker"></i></div>
                        </div>
                    </div>
                    <div class="lists candidate">
                        <div class="list-content" style="padding: 1em;">
                            <div class="chart-container">
                                <div class="chart has-fixed-height" id="chart_propinsi"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="header-sub" style="background-color: #22262E !important;">
                        <div class="va-table width-100">
                            <div class="va-middle width-50">GAJI KANDIDAT YG DIHARAPKAN</div>
                            <div class="va-middle width-50 ta-right"><i class="fa fa-money"></i></div>
                        </div>
                    </div>
                    <div class="lists candidate">
                        <div class="list-content" style="padding: 1em;">
                            <div class="chart-container">
                                <div class="chart has-fixed-height" id="chart_gaji"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="header-sub" style="background-color: #22262E !important;">
                        <div class="va-table width-100">
                            <div class="va-middle width-50">KANDIDAT BULAN INI</div>
                            <div class="va-middle width-50 ta-right"><i class="fa fa-user"></i></div>
                        </div>
                    </div>
                    <div class="lists candidate">
                        <div class="list-content" style="padding: 1em;">
                            <div class="chart-container">
                                <div class="chart has-fixed-height" id="chart_kandidat">tes</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        // $(function() {

        //     // Set paths
        //     // ------------------------------

        //     require.config({
        //         paths: {
        //             echarts: '/echarts/plugins/visualization/echarts'
        //         }
        //     });



        //     // Configuration
        //     // ------------------------------

        //     require(

        //         // Add necessary charts
        //         [
        //             'echarts',
        //             'echarts/theme/limitless',
        //             'echarts/chart/line',
        //             'echarts/chart/bar',
        //             'echarts/chart/pie'
        //         ],


        //         // Charts setup
        //         function(ec, limitless) {

        // 			var kewarganegaraancolumn_pie = ec.init(document.getElementById('chart_kewarganegaraan_spare'), limitless);
        // 			var kewarganegaraanlabelTop = {
        // 			    normal : {
        // 			        label : {
        // 			            show : true,
        // 			            position : 'center',
        // 			            formatter : '{b}',
        // 			            textStyle: {
        // 			                baseline : 'bottom'
        // 			            }
        // 			        },
        // 			        labelLine : {
        // 			            show : false
        // 			        }
        // 			    }
        // 			};

        // 			var kewarganegaraanlabelBottom = {
        // 			    normal : {
        // 			        color: '#ccc',
        // 			        label : {
        // 			            show : true,
        // 			            position : 'center'
        // 			        },
        // 			        labelLine : {
        // 			            show : false
        // 			        }
        // 			    },
        // 			    emphasis: {
        // 			        color: 'rgba(0,0,0,0)'
        // 			    }
        // 			};

        // 			var kewarganegaraanlabelFromatter = {
        // 			    normal : {
        // 			        label : {
        // 			            formatter : function (params){
        // 			                return 100 - params.value + '%'
        // 			            },
        // 			            textStyle: {
        // 			                baseline : 'top'
        // 			            }
        // 			        }
        // 			    },
        // 			}

        // 			var kewarganegaraanradius = [90, 40];
        // 			kewarganegaraan_pie_options  = {
        // 			    // legend: {
        // 			    //     x : 'center',
        // 			    //     y : 130,
        // 			    //     data:[
        // 			    //         'S1','S2',
        // 			    //     ]
        // 			    // },
        // 			    tooltip : {
        // 			        trigger: 'item',
        // 			        formatter: "{a} <br/>{b} : {c} ({d}%)"
        // 			    },
        // 			    toolbox: {
        //                     orient: 'horizontal',
        //                     x: 'center',
        //                     y: 'bottom',
        //                     show: true,
        //                     color: ['#1e90ff', '#22bb22', '#4b0082', '#d2691e'],
        //                     borderColor: '#ccc',
        //                     borderWidth: 1,
        //                     padding: 5,
        //                     itemGap: 30,
        //                     itemSize: 16,
        //                     feature: {
        //                         dataView: { show: true, title: 'Data View', readOnly: false, lang: ['Data View', 'Turn Off', 'Refresh'] },
        //                         saveAsImage: {
        //                             show: true,
        //                             title: 'Save as Image',
        //                             iconStyle: {
        //                                 textPosition: 'bottom'
        //                             }
        //                         }
        //                     },
        //                     featureTitle: {
        //                         dataView: 'Data View',
        //                         saveAsImage: 'Save as Image'
        //                     }
        //                 },

        // 			    series : [
        // 			        {
        // 			        	name: "Kewarganegaraan",
        // 			            type : 'pie',
        // 			            //center : ['65%', '70%'],
        // 			            radius : kewarganegaraanradius,
        // 			            x:'80%', // for funnel
        // 			            itemStyle : kewarganegaraanlabelFromatter,
        // 			            data : [
        // 			                {name:'Asing', value:{{ $arr['arr_nationality'][0] }}, itemStyle : kewarganegaraanlabelBottom},
        // 			                {name:'Indonesia', value:{{ $arr['arr_nationality'][1] }},itemStyle : kewarganegaraanlabelTop}
        // 			            ]
        // 			        }
        // 			    ]
        // 			};

        //             // Apply options
        //             // ------------------------------

        //             kewarganegaraancolumn_pie.setOption(kewarganegaraan_pie_options);

        //             // Resize charts
        //             // ------------------------------

        //             window.onresize = function() {
        //                 setTimeout(function() {
        //                     kewarganegaraancolumn_pie.resize();
        //                 }, 200);
        //             }



        // 			/* CHART USIA */

        //             var chart_usia = ec.init(document.getElementById('chart_usia'), limitless);

        // 			var usialabelRight = {normal: {label : {position: 'right'}}};

        // 			chart_usia_options = {
        // 			    toolbox: {
        //                     orient: 'horizontal',
        //                     x: 'center',
        //                     y: 'bottom',
        //                     show: true,
        //                     color: ['#1e90ff', '#22bb22', '#4b0082', '#d2691e'],
        //                     /*backgroundColor: 'rgba(0,0,0,0.5)',*/
        //                     borderColor: '#ccc',
        //                     borderWidth: 1,
        //                     padding: 5,
        //                     itemGap: 30,
        //                     itemSize: 16,
        //                     feature: {
        //                         dataView: { show: true, title: 'Data View', readOnly: false, lang: ['Data View', 'Turn Off', 'Refresh'] },
        //                         saveAsImage: {
        //                             show: true,
        //                             title: 'Save as Image',
        //                             iconStyle: {
        //                                 textPosition: 'bottom'
        //                             }
        //                         }
        //                     },
        //                     featureTitle: {
        //                         dataView: 'Data View',
        //                         saveAsImage: 'Save as Image'
        //                     }
        //                 },
        // 			    grid: {
        // 			    	x:40,
        // 			    	x2:40,
        // 			        y: 10,
        // 			        y2: 60
        // 			    },
        // 			    tooltip : {
        // 			        trigger: 'axis'
        // 			    },
        // 			    /*legend: {
        // 			        data:['Salary']
        // 			    },*/
        // 			    calculable : true,
        // 			    xAxis : [
        // 			        {
        // 			            type : 'category',
        // 			            data : ['<20 Tahun','21-25 Tahun','26-30 Tahun','31-35 Tahun','>35 Tahun']
        // 			        }
        // 			    ],
        // 			    yAxis : [
        // 			        {
        // 			            type : 'value',
        // 			            axisLabel : {
        // 			                formatter: '{value}'
        // 			            }
        // 			        }
        // 			    ],
        // 			    series : [
        // 			        {
        // 			            name:'Jumlah',
        // 			            type:'bar',
        // 			            data:[{{ $arr['arr_age'][0] }}, {{ $arr['arr_age'][1] }}, {{ $arr['arr_age'][2] }}, {{ $arr['arr_age'][3] }}, {{ $arr['arr_age'][4] }}],
        // 			        },

        // 			    ]

        // 			};

        // 			chart_usia.setOption(chart_usia_options);

        //             // Resize charts
        //             // ------------------------------

        //             window.onresize = function() {
        //                 setTimeout(function() {
        //                     chart_usia.resize();
        //                 }, 200);
        //             }



        // 			/* CHART PROPINSI */

        //             var chart_propinsi = ec.init(document.getElementById('chart_propinsi'), limitless);

        // 			var propinsilabelRight = {normal: {label : {position: 'right'}}};

        // 			chart_propinsi_options = {
        // 			    toolbox: {
        //                     orient: 'horizontal',
        //                     x: 'center',
        //                     y: 'bottom',
        //                     show: true,
        //                     color: ['#1e90ff', '#22bb22', '#4b0082', '#d2691e'],
        //                     /*backgroundColor: 'rgba(0,0,0,0.5)',*/
        //                     borderColor: '#ccc',
        //                     borderWidth: 1,
        //                     padding: 5,
        //                     itemGap: 30,
        //                     itemSize: 16,
        //                     feature: {
        //                         dataView: { show: true, title: 'Data View', readOnly: false, lang: ['Data View', 'Turn Off', 'Refresh'] },
        //                         saveAsImage: {
        //                             show: true,
        //                             title: 'Save as Image',
        //                             iconStyle: {
        //                                 textPosition: 'bottom'
        //                             }
        //                         }
        //                     },
        //                     featureTitle: {
        //                         dataView: 'Data View',
        //                         saveAsImage: 'Save as Image'
        //                     }
        //                 },
        // 			    grid: {
        // 			    	x:10,
        // 			    	x2:10,
        // 			        y: 20,
        // 			        y2: 40
        // 			    },
        // 			    tooltip : {
        // 			        trigger: 'axis'
        // 			    },
        // 			    toolbox: {
        //                     orient: 'horizontal',
        //                     x: 'center',
        //                     y: 'bottom',
        //                     show: true,
        //                     color: ['#1e90ff', '#22bb22', '#4b0082', '#d2691e'],
        //                     /*backgroundColor: 'rgba(0,0,0,0.5)',*/
        //                     borderColor: '#ccc',
        //                     borderWidth: 1,
        //                     padding: 5,
        //                     itemGap: 30,
        //                     itemSize: 16,
        //                     feature: {
        //                         dataView: { show: true, title: 'Data View', readOnly: false, lang: ['Data View', 'Turn Off', 'Refresh'] },
        //                         saveAsImage: {
        //                             show: true,
        //                             title: 'Save as Image',
        //                             iconStyle: {
        //                                 textPosition: 'bottom'
        //                             }
        //                         }
        //                     },
        //                     featureTitle: {
        //                         dataView: 'Data View',
        //                         saveAsImage: 'Save as Image'
        //                     }
        //                 },
        // 			    calculable : true,
        // 			    xAxis : [
        // 			        {
        // 			            type : 'value',
        // 			            min: 0,
        // 			            max: 50,
        // 			            position: 'top',
        // 			            boundaryGap : [0, 0.01]
        // 			        }
        // 			    ],
        // 			    yAxis : [
        // 			        {
        // 			            type : 'category',
        // 			            axisLine: {show: false},
        // 			            axisLabel: {show: false},
        // 			            axisTick: {show: false},
        // 			            splitLine: {show: false},
        // 			            data : [
        // 							@for ($i = 0; $i < count($arr['arr_province']); $i++)
        // 								"{{ $arr['arr_province'][$i]['label'] }}",
        // 							@endfor
        // 						]
        // 			        }
        // 			    ],
        // 			    series : [
        // 			        {
        // 			            name:'Jumlah',
        // 			            type:'bar',
        // 			          	itemStyle : { 
        // 			            	normal: {
        // 				                color: '#9CBD4C',
        // 				                borderRadius: 5,
        // 				                label : {
        // 				                    show: true,
        // 				                    position: 'right',
        // 				                    formatter: '{b}'
        // 			                	}
        // 			            	}
        // 			       	 	},
        // 			            data:[
        // 							@for ($i = 0; $i < count($arr['arr_province']); $i++)
        // 								{value:{{ $arr['arr_province'][$i]['value'] }}, itemStyle:propinsilabelRight},
        // 							@endfor
        // 			            ],
        // 			        }
        // 			    ]

        // 			};

        // 			chart_propinsi.setOption(chart_propinsi_options);

        //             // Resize charts
        //             // ------------------------------

        //             window.onresize = function() {
        //                 setTimeout(function() {
        //                     chart_propinsi.resize();
        //                 }, 200);
        //             }



        // 			/* CHART SALARY */

        //             var chart_gaji = ec.init(document.getElementById('chart_gaji'), limitless);

        // 			var gajilabelRight = {normal: {label : {position: 'right'}}};

        // 			chart_gaji_options = {
        // 			    toolbox: {
        //                     orient: 'horizontal',
        //                     x: 'center',
        //                     y: 'bottom',
        //                     show: true,
        // 					color: ['#1e90ff', '#22bb22', '#4b0082', '#d2691e'],
        //                     /*backgroundColor: 'rgba(0,0,0,0.5)',*/
        //                     borderColor: '#ccc',
        //                     borderWidth: 1,
        //                     padding: 5,
        //                     itemGap: 30,
        //                     itemSize: 16,
        //                     feature: {
        //                         dataView: { show: true, title: 'Data View', readOnly: false, lang: ['Data View', 'Turn Off', 'Refresh'] },
        //                         saveAsImage: {
        //                             show: true,
        //                             title: 'Save as Image',
        //                             iconStyle: {
        //                                 textPosition: 'bottom'
        //                             }
        //                         }
        //                     },
        //                     featureTitle: {
        //                         dataView: 'Data View',
        //                         saveAsImage: 'Save as Image'
        //                     }
        //                 },
        // 			    grid: {
        // 			    	x:10,
        // 			    	x2:10,
        // 			        y: 20,
        // 			        y2: 40
        // 			    },
        // 			    tooltip : {
        // 			        trigger: 'axis'
        // 			    },
        // 			    toolbox: {
        //                     orient: 'horizontal',
        //                     x: 'center',
        //                     y: 'bottom',
        //                     show: true,
        // 					color: ['#1e90ff', '#22bb22', '#4b0082', '#d2691e'],
        //                     /*backgroundColor: 'rgba(0,0,0,0.5)',*/
        //                     borderColor: '#ccc',
        //                     borderWidth: 1,
        //                     padding: 5,
        //                     itemGap: 30,
        //                     itemSize: 16,
        //                     feature: {
        //                         dataView: { show: true, title: 'Data View', readOnly: false, lang: ['Data View', 'Turn Off', 'Refresh'] },
        //                         saveAsImage: {
        //                             show: true,
        //                             title: 'Save as Image',
        //                             iconStyle: {
        //                                 textPosition: 'bottom'
        //                             }
        //                         }
        //                     },
        //                     featureTitle: {
        //                         dataView: 'Data View',
        //                         saveAsImage: 'Save as Image'
        //                     }
        //                 },
        // 			    calculable : true,
        // 			    xAxis : [
        // 			        {
        // 			            type : 'value',
        // 			            min: 0,
        // 			            max: 400,
        // 			            position: 'top',
        // 			            boundaryGap : [0, 0.01]
        // 			        }
        // 			    ],
        // 			    yAxis : [
        // 			        {
        // 			            type : 'category',
        // 			            axisLine: {show: false},
        // 			            axisLabel: {show: false},
        // 			            axisTick: {show: false},
        // 			            splitLine: {show: false},
        // 			            data : [
        // 							'<3 Juta','3-5 Juta','5-8 Juta','8-10 Juta','>10 Juta'
        // 						]
        // 			        }
        // 			    ],
        // 			    series : [
        // 			        {
        // 			            name:'Jumlah',
        // 			            type:'bar',
        // 			          	itemStyle : { 
        // 			            	normal: {
        // 				                color: '#FFBF77',
        // 				                borderRadius: 5,
        // 				                label : {
        // 				                    show: true,
        // 				                    position: 'right',
        // 				                    formatter: '{b}'
        // 			                	}
        // 			            	}
        // 			       	 	},
        // 			            data:[
        // 							{value:{{ $arr['arr_salary'][0] }}, itemStyle:gajilabelRight},
        // 							{value:{{ $arr['arr_salary'][1] }}, itemStyle:gajilabelRight},
        // 							{value:{{ $arr['arr_salary'][2] }}, itemStyle:gajilabelRight},
        // 							{value:{{ $arr['arr_salary'][3] }}, itemStyle:gajilabelRight},
        // 							{value:{{ $arr['arr_salary'][4] }}, itemStyle:gajilabelRight},
        // 			            ],
        // 			        }
        // 			    ]
        // 			};

        // 			chart_gaji.setOption(chart_gaji_options);

        //             // Resize charts
        //             // ------------------------------

        //             window.onresize = function() {
        //                 setTimeout(function() {
        //                     chart_gaji.resize();
        //                 }, 200);
        //             }


        // 			/* CHART KANDIDAT */

        //             var chart_candidate = ec.init(document.getElementById('chart_candidate'), limitless);

        // 			var labelRight = {normal: {label : {position: 'right'}}};

        // 			chart_candidate_options = {
        // 			    toolbox: {
        //                     orient: 'horizontal',
        //                     x: 'center',
        //                     y: 'bottom',
        //                     show: true,
        //                     color: ['#1e90ff', '#22bb22', '#4b0082', '#d2691e'],
        //                     borderColor: '#ccc',
        //                     borderWidth: 1,
        //                     padding: 5,
        //                     itemGap: 30,
        //                     itemSize: 16,
        //                     feature: {
        //                         dataView: { show: true, title: 'Data View', readOnly: false, lang: ['Data View', 'Turn Off', 'Refresh'] },
        //                         saveAsImage: {
        //                             show: true,
        //                             title: 'Save as Image',
        //                             iconStyle: {
        //                                 textPosition: 'bottom'
        //                             }
        //                         }
        //                     },
        //                     featureTitle: {
        //                         dataView: 'Data View',
        //                         saveAsImage: 'Save as Image'
        //                     }
        //                 },
        // 			    calculable : true,
        // 			    tooltip : {
        // 			        trigger: 'axis',
        // 			        formatter: "Tgl {b} : {c}"
        // 			    },				    
        // 			    grid: {
        // 			    	x:40,
        // 			    	x2:40,
        // 			        y: 10,
        // 			        y2: 60
        // 			    },
        // 			    xAxis : [
        // 			        {
        // 			            type : 'category',
        // 			            data : [
        // 							@for ($i = 0; $i < count($arr['arr_candidate']); $i++)
        // 								"{{ $arr['arr_candidate'][$i]['label'] }}",
        // 							@endfor
        // 						],				            
        // 			        }
        // 			    ],
        // 			    yAxis : [
        // 			        {
        // 			            type : 'value',
        // 			            axisLine : {onZero: false},
        // 			            axisLabel : {
        // 			                formatter: '{value} %'
        // 			            },
        // 			            boundaryGap : false,
        // 			            min: 0,
        // 			            max: 1,
        // 			            interval:0.2
        // 			        }
        // 			    ],
        // 			    series : [
        // 			        {
        // 			            name:'Kandidat Bulan Ini',
        // 			            type:'line',
        // 			            smooth:false,
        // 			            itemStyle: {
        // 			                normal: {
        // 			                    lineStyle: {
        // 			                        shadowColor : 'rgba(0,0,0,0.4)'
        // 			                    }
        // 			                }
        // 			            },
        // 			            data:[
        // 							@for ($i = 0; $i < count($arr['arr_candidate']); $i++)
        // 								{{ $arr['arr_candidate'][$i]['value'] }},
        // 							@endfor
        // 						]
        // 			        }
        // 			    ]

        // 			};

        // 			chart_candidate.setOption(chart_candidate_options);

        //             window.onresize = function() {
        //                 setTimeout(function() {
        //                     chart_candidate.resize();
        //                 }, 200);
        //             }
        //         }
        //     );
        // });
    </script> --}}

    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> --}}
    <script src="{{ asset('highcharts/code/highcharts.js') }}"></script>

    <script type="text/javascript">
        function getCandidateEducation(education) {
            $('#candidate_education').modal('show');
            $.get("{{ env('URL_DEV') }}/admin-dashboard/data-candidate-education" + '/' + education, function(data,
                status) {
                $('#candidate_education').find('.modal-body').html(data)
            });
        }

        Highcharts.chart('chart_kewarganegaraan', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Berdasarkan Kewarganegaraan'
            },
            tooltip: {
                valueSuffix: ''
            },
            subtitle: {
                text: ''
            },
            plotOptions: {
                series: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: [{
                        enabled: true,
                        distance: 20
                    }, {
                        enabled: true,
                        distance: -40,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '1.2em',
                            textOutline: 'none',
                            opacity: 0.7
                        },
                        filter: {
                            operator: '>',
                            property: 'percentage',
                            value: 10
                        }
                    }]
                }
            },
            series: [{
                name: 'Jumlah',
                colorByPoint: true,
                data: [{
                        name: 'Indonesia',
                        y: {{ doubleval($arr['arr_nationality'][1]) }}
                    },
                    {
                        name: 'Asing',
                        y: {{ doubleval($arr['arr_nationality'][0]) }}
                    }
                ]
            }]
        });

        Highcharts.chart('chart_usia', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Berdasarkan Usia',
                align: 'center'
            },
            subtitle: {
                text: '',
                align: 'left'
            },
            xAxis: {
                categories: ['<20 Tahun', '21-25 Tahun', '26-30 Tahun', '31-35 Tahun', '>35 Tahun'],
                crosshair: true,
                accessibility: {
                    description: ''
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            tooltip: {
                valueSuffix: ''
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Jumlah',
                data: [{{ $arr['arr_age'][0] }}, {{ $arr['arr_age'][1] }}, {{ $arr['arr_age'][2] }},
                    {{ $arr['arr_age'][3] }}, {{ $arr['arr_age'][4] }}
                ]
            }, ]
        });

        Highcharts.chart('chart_propinsi', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Berdasarkan Propinsi',
                align: 'center'
            },
            subtitle: {
                text: '',
                align: 'left'
            },
            xAxis: {
                categories: [
                    @for ($i = 0; $i < count($arr['arr_province']); $i++)
                        "{{ $arr['arr_province'][$i]['label'] }}",
                    @endfor
                ],
                title: {
                    text: null
                },
                gridLineWidth: 1,
                lineWidth: 0
            },
            yAxis: {
                min: 0,
                title: {
                    text: '',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                },
                gridLineWidth: 0
            },
            tooltip: {
                valueSuffix: ''
            },
            plotOptions: {
                bar: {
                    borderRadius: '10%',
                    dataLabels: {
                        enabled: true
                    },
                    groupPadding: 0.1
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 80,
                floating: true,
                borderWidth: 1,
                backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Jumlah',
                data: [
                    @for ($i = 0; $i < count($arr['arr_province']); $i++)
                        {{ $arr['arr_province'][$i]['value'] }},
                    @endfor
                ]
            }, ]
        });

        Highcharts.chart('chart_gaji', {
            chart: {
                type: 'area'
            },
            accessibility: {
                description: 'Gaji yang diharapkan'
            },
            title: {
                text: 'Berdasarkan Gaji Yang Diharapkan'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                    '-', '<3 Juta', '3-5 Juta', '5-8 Juta', '8-10 Juta', '>10 Juta',
                ]
            },
            // xAxis: {
            //     allowDecimals: false,
            //     accessibility: {
            //         rangeDescription: 'Range: 1940 to 2017.'
            //     }
            // },
            yAxis: {
                title: {
                    text: ''
                }
            },
            tooltip: {
                pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
            },
            plotOptions: {
                area: {
                    pointStart: 1,
                    marker: {
                        enabled: false,
                        symbol: 'circle',
                        radius: 2,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [{
                name: 'USA',
                data: [
                    {{ $arr['arr_salary'][0] }},
                    {{ $arr['arr_salary'][1] }},
                    {{ $arr['arr_salary'][2] }},
                    {{ $arr['arr_salary'][3] }},
                    {{ $arr['arr_salary'][4] }},
                ]
            }, ]
        });

        Highcharts.chart('chart_kandidat', {

            title: {
                text: 'Jumlah Pelamar Dalam Bulan Ini',
                align: 'center'
            },

            subtitle: {
                text: '',
                align: 'left'
            },

            yAxis: {
                title: {
                    text: ''
                }
            },
            xAxis: {
                categories: [
                    @for ($i = 0; $i < count($arr['arr_candidate']); $i++)
                        "{{ $arr['arr_candidate'][$i]['label'] }}",
                    @endfor
                ]
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Pelamar',
                data: [
                    @for ($i = 0; $i < count($arr['arr_candidate']); $i++)
                        {{ $arr['arr_candidate'][$i]['value'] }},
                    @endfor
                ]
            }, ],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="candidate_education" tabindex="-1" role="dialog" aria-labelledby="modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><B>DAFTAR KANDIDAT</B></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
@stop
