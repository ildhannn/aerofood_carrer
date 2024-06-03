@extends('layouts.dashboard')

@section('breadcrumb')
	<b>Home</b>
@stop

@section('content')
<script type="text/javascript" src="{{ asset('echarts/plugins/visualization/echarts/echarts.js') }}"></script>
<div class="container-fluid" style="margin-left: 0px;margin-right: 0px;">
	<div class="row">
		<!-- <div class="col-sm-12">
			<div class="text-center">
				<img src="{{asset('img/under.png')}}">
			</div>
		</div>
		<div class="col-sm-12">
			<div class="text-center">
				<h3>Halaman ini masih dalam proses pengembangan</h3>
			</div>
		</div> -->
		<!-- <div class="col-md-6">
			<div class="form-group">
				<div style="width: 100%;">
					<div class="va-table" style="width: 100%;height: 65px;">
						<div class="va-middle" style="width: 100%;"><h1 class="mar-0">JOBS</h1></div>				
					</div>
				</div>
				
			</div>
		</div> -->
		<div class="col-md-5">
			<div class="form-group">
				<div style="width: 100%; color: #fff;">
					<div class="va-table" style="width: 100%;">
						<div class="va-middle" style="width: 5%;text-align: center;background-color: #175332; padding: 1em;"><i class="fa fa-user-circle fa-lg"></i></div>
						<div class="va-middle" style="width: 65%;background-color: #1C643C; padding: 1em;">JUMLAH SEMUA KANDIDAT</div>
						<div class="va-middle" style="width: 30%;text-align: center;background-color: #1C643C; padding: 1em;"><span style="font-size: 25px;">0</span></div>
					</div>
				</div>		
			</div>		
		</div>
		<div class="col-md-1">
			<div class="form-group">
				<div style="width: 100%; color: #fff;">
					<div class="va-table" style="width: 100%;position: relative;">
						<a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
							<div class="va-middle" style="width: 5%;text-align: center;background-color: #175332; padding: 1.56em;color: #FFF;"><i class="fa fa-ellipsis-h fa-lg"></i></div>
						</a>						
                        <div class="bounce tooltip">
                            <span class="tooltiptext">CLICK FOR DETAIL</span>
                        </div>
					</div>
				</div>		
			</div>		
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<div style="width: 100%; color: #fff;">
					<div class="va-table" style="width: 100%;">
						<div class="va-middle" style="width: 5%;text-align: center;background-color: #9B181C; padding: 1em;"><i class="fa fa-thumbs-up fa-lg"></i></div>
						<div class="va-middle" style="width: 65%;background-color: #AF1B20; padding: 1em;">HIRED</div>
						<div class="va-middle" style="width: 30%;text-align: center;background-color: #AF1B20; padding: 1em;"><span style="font-size: 25px;">0</span></div>
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
							<div class="va-middle" style="width: 10%;text-align: center;background-color: #449C44; padding: 1em;"><i class="fa fa-check-circle fa-lg"></i></div>
							<div class="va-middle" style="width: 60%;background-color: #5cb85c; padding: 1em;">Matched</div>
							<div class="va-middle" style="width: 30%;text-align: center;background-color: #5cb85c; padding: 1em;"><span style="font-size: 25px;">0</span></div>
						</div>
					</div>		
				</div>	
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<div style="width: 100%; color: #fff;">
						<div class="va-table" style="width: 100%;">
							<div class="va-middle" style="width: 10%;text-align: center;background-color: #449C44; padding: 1em;"><i class="fa fa-server fa-lg"></i></div>
							<div class="va-middle" style="width: 60%;background-color: #5cb85c; padding: 1em;">Shortlisted</div>
							<div class="va-middle" style="width: 30%;text-align: center;background-color: #5cb85c; padding: 1em;"><span style="font-size: 25px;">0</span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<div style="width: 100%; color: #fff;">
						<div class="va-table" style="width: 100%;">
							<div class="va-middle" style="width: 10%;text-align: center;background-color: #449C44; padding: 1em;"><i class="fa fa-video-camera fa-lg"></i></div>
							<div class="va-middle" style="width: 60%;background-color: #5cb85c; padding: 1em;">PVI</div>
							<div class="va-middle" style="width: 30%;text-align: center;background-color: #5cb85c; padding: 1em;"><span style="font-size: 25px;">0</span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<div style="width: 100%; color: #fff;">
						<div class="va-table" style="width: 100%;">
							<div class="va-middle" style="width: 10%;text-align: center;background-color: #449C44; padding: 1em;"><i class="fa fa-globe fa-lg"></i></div>
							<div class="va-middle" style="width: 60%;background-color: #5cb85c; padding: 1em;">Online Test</div>
							<div class="va-middle" style="width: 30%;text-align: center;background-color: #5cb85c; padding: 1em;"><span style="font-size: 25px;">0</span></div>
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
							<div class="va-middle" style="width: 10%;text-align: center;background-color: #449C44; padding: 1em;"><i class="fa fa-exchange fa-lg"></i></div>
							<div class="va-middle" style="width: 60%;background-color: #5cb85c; padding: 1em;">Interview</div>
							<div class="va-middle" style="width: 30%;text-align: center;background-color: #5cb85c; padding: 1em;"><span style="font-size: 25px;">0</span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<div style="width: 100%; color: #fff;">
						<div class="va-table" style="width: 100%;">
							<div class="va-middle" style="width: 10%;text-align: center;background-color: #449C44; padding: 1em;"><i class="fa fa-medkit fa-lg"></i></div>
							<div class="va-middle" style="width: 60%;background-color: #5cb85c; padding: 1em;">MCU</div>
							<div class="va-middle" style="width: 30%;text-align: center;background-color: #5cb85c; padding: 1em;"><span style="font-size: 25px;">0</span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<div style="width: 100%; color: #fff;">
						<div class="va-table" style="width: 100%;">
							<div class="va-middle" style="width: 10%;text-align: center;background-color: #449C44; padding: 1em;"><i class="fa fa-folder-open fa-lg"></i></div>
							<div class="va-middle" style="width: 60%;background-color: #5cb85c; padding: 1em;">Offering</div>
							<div class="va-middle" style="width: 30%;text-align: center;background-color: #5cb85c; padding: 1em;"><span style="font-size: 25px;">0</span></div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="col-md-3">
				<div class="form-group">
					<div style="width: 100%; color: #fff;">
						<div class="va-table" style="width: 100%;">
							<div class="va-middle" style="width: 10%;text-align: center;background-color: #449C44; padding: 1em;"><i class="fa fa-thumbs-up fa-lg"></i></div>
							<div class="va-middle" style="width: 60%;background-color: #5cb85c; padding: 1em;">Hired</div>
							<div class="va-middle" style="width: 30%;text-align: center;background-color: #5cb85c; padding: 1em;"><span style="font-size: 25px;">0</span></div>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</div>

	
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<div class="header-sub" style="background-color: #22262E !important;">
					<div class="va-table width-100">
						<div class="va-middle width-50">PENDIDIKAN</div>
						<div class="va-middle width-50 ta-right"><i class="fa fa-graduation-cap"></i></div>
					</div>
				</div>
				<div class="lists candidate">
					<div class="list-content" style="padding: 1em;">
						<div class="chart-container">
			                <div class="chart has-fixed-height" id="chart_pendidikan_spare">tes</div>
			            </div>
					</div>
				</div>
        	</div>        	
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<div class="header-sub" style="background-color: #22262E !important;">
					<div class="va-table width-100">
						<div class="va-middle width-50">SALARY</div>
						<div class="va-middle width-50 ta-right"><i class="fa fa-money"></i></div>
					</div>
				</div>
				<div class="lists candidate">
					<div class="list-content" style="padding: 1em;">
						<div class="chart-container">
			                <div class="chart has-fixed-height" id="chart_salary">tes</div>
			            </div>
					</div>
				</div>
        	</div>        	
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<div class="header-sub" style="background-color: #22262E !important;">
					<div class="va-table width-100">
						<div class="va-middle width-50">INSTITUSI</div>
						<div class="va-middle width-50 ta-right"><i class="fa fa-institution"></i></div>
					</div>
				</div>
				<div class="lists candidate">
					<div class="list-content" style="padding: 1em;">
						<div class="chart-container">
			                <div class="chart has-fixed-height" id="chart_sekolah">tes</div>
			            </div>
					</div>
				</div>
        	</div>        	
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<div class="header-sub" style="background-color: #22262E !important;">
					<div class="va-table width-100">
						<div class="va-middle width-50">DOMISILI</div>
						<div class="va-middle width-50 ta-right"><i class="fa fa-map-marker"></i></div>
					</div>
				</div>
				<div class="lists candidate">
					<div class="list-content" style="padding: 1em;">
						<div class="chart-container">
			                <div class="chart has-fixed-height" id="chart_domisili">tes</div>
			            </div>
					</div>
				</div>
        	</div>        	
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<div class="header-sub" style="background-color: #22262E !important;">
					<div class="va-table width-100">
						<div class="va-middle width-50">LEAD TIME</div>
						<div class="va-middle width-50 ta-right"><i class="fa fa-clock-o"></i></div>
					</div>
				</div>
				<div class="lists candidate">
					<div class="list-content" style="padding: 1em;">
						<div class="chart-container">
			                <div class="chart has-fixed-height" id="chart_lead">tes</div>
			            </div>
					</div>
				</div>
        	</div>        	
		</div>
		<!-- <div class="col-md-6">
			<div class="form-group">
				<div class="header-sub" style="background-color: #22262E !important;">
					<div class="va-table width-100">
						<div class="va-middle width-50">TURN OVER RATE</div>
						<div class="va-middle width-50 ta-right"><i class="fa fa-user"></i></div>
					</div>
				</div>
				<div class="lists candidate">
					<div class="list-content" style="padding: 1em;">
						<div class="chart-container">
			                <div class="chart has-fixed-height" id="chart_tor">tes</div>
			            </div>
					</div>
				</div>
		        	</div>        	
		</div> -->
	</div>
</div>


<script>
	
	$(function() {

        // Set paths
        // ------------------------------

        require.config({
            paths: {
                echarts: '/echarts/plugins/visualization/echarts'
            }
        });



        // Configuration
        // ------------------------------

        require(

            // Add necessary charts
            [
                'echarts',
                'echarts/theme/limitless',
                'echarts/chart/line',
                'echarts/chart/bar',
                'echarts/chart/pie'
            ],


            // Charts setup
            function(ec, limitless) {


                // Initialize charts
                // ------------------------------

                var column_pie = ec.init(document.getElementById('chart_pendidikan_spare'), limitless);

                // Charts options
                // ------------------------------

                //
                // Column and pie combination
                //

				var labelTop = {
				    normal : {
				        label : {
				            show : true,
				            position : 'center',
				            formatter : '{b}',
				            textStyle: {
				                baseline : 'bottom'
				            }
				        },
				        labelLine : {
				            show : false
				        }
				    }
				};
				var labelFromatter = {
				    normal : {
				        label : {
				            formatter : function (params){
				                return 100 - params.value + '%'
				            },
				            textStyle: {
				                baseline : 'top'
				            }
				        }
				    },
				}
				var labelBottom = {
				    normal : {
				        color: '#ccc',
				        label : {
				            show : true,
				            position : 'center'
				        },
				        labelLine : {
				            show : false
				        }
				    },
				    emphasis: {
				        color: 'rgba(0,0,0,0)'
				    }
				};
				var radius = [40, 55];
				column_pie_options  = {
				    legend: {
				        x : 'center',
				        y : 130,
				        data:[
				            'SMA/SMK','D1','D3','S1','S2',
				            /*'GoogleMaps','Facebook','Youtube','Google+','Weixin',
				            'Twitter', 'Skype', 'Messenger', 'Whatsapp', 'Instagram'*/
				        ]
				    },
				    tooltip : {
				        trigger: 'item',
				        formatter: "{a} <br/>{b} : {c} ({d}%)"
				    },
				    toolbox: {
                        orient: 'horizontal',
                        x: 'center',
                        y: 'bottom',
                        show: true,
                        color: ['#1e90ff', '#22bb22', '#4b0082', '#d2691e'],
                        /*backgroundColor: 'rgba(0,0,0,0.5)',*/
                        borderColor: '#ccc',
                        borderWidth: 1,
                        padding: 5,
                        itemGap: 30,
                        itemSize: 16,
                        feature: {
                            mark: { show: true, title: 'Mark' },
                            dataView: { show: true, title: 'Data View', readOnly: false, lang: ['Data View', 'Turn Off', 'Refresh'] },
                            magicType: { show: true, title: { line: 'For line charts', bar: 'For bar charts' }, type: ['line', 'bar'] },
                            restore: {
                                show: true,
                                title: 'Restore'
                            },
                            saveAsImage: {
                                show: true,
                                title: 'Save as Image',
                                iconStyle: {
                                    textPosition: 'bottom'
                                }
                            }
                        },
                        featureTitle: {
                            mark: 'Mark',
                            markUndo: 'Mark Undo',
                            markClear: 'Mark Clear',
                            dataZoom: 'Data Zoom',
                            dataZoomReset: 'Data Zoom Reset',
                            dataView: 'Data View',
                            lineChart: 'Line Chart',
                            barChart: 'Bar Chart',
                            restore: 'Restore',
                            saveAsImage: 'Save as Image'
                        }
                    },
				    /*toolbox: {
				        show : true,
				        feature : {
				            dataView : {show: true, readOnly: false},
				            magicType : {
				                show: true, 
				                type: ['pie', 'funnel'],
				                option: {
				                    funnel: {
				                        width: '20%',
				                        height: '30%',
				                        itemStyle : {
				                            normal : {
				                                label : {
				                                    formatter : function (params){
				                                        return 'other\n' + params.value + '%\n'
				                                    },
				                                    textStyle: {
				                                        baseline : 'middle'
				                                    }
				                                }
				                            },
				                        } 
				                    }
				                }
				            },
				            restore : {show: true},
				            saveAsImage : {show: true}
				        }
				    },*/
				    series : [
				        {
				        	name: "SMA/SMK",
				            type : 'pie',
				            center : ['20%', '20%'],
				            radius : radius,
				            x: '0%', // for funnel
				            itemStyle : labelFromatter,
				            data : [
				                {name:'other', value:46, itemStyle : labelBottom},
				                {name:'SMA/SMK', value:54,itemStyle : labelTop}
				            ]
				        },
				        {
				        	name: "D1",
				            type : 'pie',
				            center : ['50%', '20%'],
				            radius : radius,
				            x:'20%', // for funnel
				            itemStyle : labelFromatter,
				            data : [
				                {name:'other', value:56, itemStyle : labelBottom},
				                {name:'D1', value:44,itemStyle : labelTop}
				            ]
				        },
				        {
				        	name: "D3",
				            type : 'pie',
				            center : ['80%', '20%'],
				            radius : radius,
				            x:'40%', // for funnel
				            itemStyle : labelFromatter,
				            data : [
				                {name:'other', value:65, itemStyle : labelBottom},
				                {name:'D3', value:35,itemStyle : labelTop}
				            ]
				        },
				        {
				        	name: "S1",
				            type : 'pie',
				            center : ['35%', '70%'],
				            radius : radius,
				            x:'60%', // for funnel
				            itemStyle : labelFromatter,
				            data : [
				                {name:'other', value:70, itemStyle : labelBottom},
				                {name:'S1', value:30,itemStyle : labelTop}
				            ]
				        },
				        {
				        	name: "S2",
				            type : 'pie',
				            center : ['65%', '70%'],
				            radius : radius,
				            x:'80%', // for funnel
				            itemStyle : labelFromatter,
				            data : [
				                {name:'other', value:73, itemStyle : labelBottom},
				                {name:'S2', value:27,itemStyle : labelTop}
				            ]
				        }
				    ]
				};


                // Apply options
                // ------------------------------

                column_pie.setOption(column_pie_options);

                // Resize charts
                // ------------------------------

                window.onresize = function() {
                    setTimeout(function() {
                        column_pie.resize();
                    }, 200);
                }

                /* CHART 3 */

                var chart_3 = ec.init(document.getElementById('chart_sekolah'), limitless);

				var labelRight = {normal: {label : {position: 'right'}}};

				chart_3_options = {
				    toolbox: {
                        orient: 'horizontal',
                        x: 'center',
                        y: 'bottom',
                        show: true,
                        color: ['#1e90ff', '#22bb22', '#4b0082', '#d2691e'],
                        /*backgroundColor: 'rgba(0,0,0,0.5)',*/
                        borderColor: '#ccc',
                        borderWidth: 1,
                        padding: 5,
                        itemGap: 30,
                        itemSize: 16,
                        feature: {
                            mark: { show: true, title: 'Mark' },
                            dataView: { show: true, title: 'Data View', readOnly: false, lang: ['Data View', 'Turn Off', 'Refresh'] },
                            magicType: { show: true, title: { line: 'For line charts', bar: 'For bar charts' }, type: ['line', 'bar'] },
                            restore: {
                                show: true,
                                title: 'Restore'
                            },
                            saveAsImage: {
                                show: true,
                                title: 'Save as Image',
                                iconStyle: {
                                    textPosition: 'bottom'
                                }
                            }
                        },
                        featureTitle: {
                            mark: 'Mark',
                            markUndo: 'Mark Undo',
                            markClear: 'Mark Clear',
                            dataZoom: 'Data Zoom',
                            dataZoomReset: 'Data Zoom Reset',
                            dataView: 'Data View',
                            lineChart: 'Line Chart',
                            barChart: 'Bar Chart',
                            restore: 'Restore',
                            saveAsImage: 'Save as Image'
                        }
                    },
				    grid: {
				    	x:10,
				    	x2:10,
				        y: 20,
				        y2: 40
				    },
				    tooltip : {
				        trigger: 'axis'
				    },
				    toolbox: {
                        orient: 'horizontal',
                        x: 'center',
                        y: 'bottom',
                        show: true,
                        color: ['#1e90ff', '#22bb22', '#4b0082', '#d2691e'],
                        /*backgroundColor: 'rgba(0,0,0,0.5)',*/
                        borderColor: '#ccc',
                        borderWidth: 1,
                        padding: 5,
                        itemGap: 30,
                        itemSize: 16,
                        feature: {
                            mark: { show: true, title: 'Mark' },
                            dataView: { show: true, title: 'Data View', readOnly: false, lang: ['Data View', 'Turn Off', 'Refresh'] },
                            magicType: { show: true, title: { line: 'For line charts', bar: 'For bar charts' }, type: ['line', 'bar'] },
                            restore: {
                                show: true,
                                title: 'Restore'
                            },
                            saveAsImage: {
                                show: true,
                                title: 'Save as Image',
                                iconStyle: {
                                    textPosition: 'bottom'
                                }
                            }
                        },
                        featureTitle: {
                            mark: 'Mark',
                            markUndo: 'Mark Undo',
                            markClear: 'Mark Clear',
                            dataZoom: 'Data Zoom',
                            dataZoomReset: 'Data Zoom Reset',
                            dataView: 'Data View',
                            lineChart: 'Line Chart',
                            barChart: 'Bar Chart',
                            restore: 'Restore',
                            saveAsImage: 'Save as Image'
                        }
                    },
				    calculable : true,
				    xAxis : [
				        {
				            type : 'value',
				            min: 0,
				            max: 50,
				            position: 'top',
				            boundaryGap : [0, 0.01]
				        }
				    ],
				    yAxis : [
				        {
				            type : 'category',
				            axisLine: {show: false},
				            axisLabel: {show: false},
				            axisTick: {show: false},
				            splitLine: {show: false},
				            data : ['BINUS', 'UI', 'ITB', 'IPB', 'UGM', 'Univ. Pancasila', 'Univ. Sahid', 'Univ. Brawijaya', 'ITS', 'SMK 34 Jakarta']
				        }
				    ],
				    series : [
				        {
				            name:'Jumlah',
				            type:'bar',
				          	itemStyle : { 
				            	normal: {
					                color: '#9CBD4C',
					                borderRadius: 5,
					                label : {
					                    show: true,
					                    position: 'right',
					                    formatter: '{b}'
				                	}
				            	}
				       	 	},
				            data:[
				                {value:1, itemStyle:labelRight},
				                {value:1, itemStyle:labelRight},
				                {value:1, itemStyle:labelRight},
				                {value:2, itemStyle:labelRight},
				            	{value:2, itemStyle:labelRight},
				                {value:4, itemStyle:labelRight},
				                {value:4, itemStyle:labelRight},
				                {value:6, itemStyle:labelRight},
				                {value:11, itemStyle:labelRight},
				                {value:23, itemStyle:labelRight},
				            ],
				          
				        }
				    ]
				    
				};

				chart_3.setOption(chart_3_options);

                // Resize charts
                // ------------------------------

                window.onresize = function() {
                    setTimeout(function() {
                        chart_3.resize();
                    }, 200);
                }



                /* CHART 4 */

                var chart_4 = ec.init(document.getElementById('chart_domisili'), limitless);

				var labelRight = {normal: {label : {position: 'right'}}};

				chart_4_options = {
				    toolbox: {
                        orient: 'horizontal',
                        x: 'center',
                        y: 'bottom',
                        show: true,
                        color: ['#1e90ff', '#22bb22', '#4b0082', '#d2691e'],
                        /*backgroundColor: 'rgba(0,0,0,0.5)',*/
                        borderColor: '#ccc',
                        borderWidth: 1,
                        padding: 5,
                        itemGap: 30,
                        itemSize: 16,
                        feature: {
                            mark: { show: true, title: 'Mark' },
                            dataView: { show: true, title: 'Data View', readOnly: false, lang: ['Data View', 'Turn Off', 'Refresh'] },
                            magicType: { show: true, title: { line: 'For line charts', bar: 'For bar charts' }, type: ['line', 'bar'] },
                            restore: {
                                show: true,
                                title: 'Restore'
                            },
                            saveAsImage: {
                                show: true,
                                title: 'Save as Image',
                                iconStyle: {
                                    textPosition: 'bottom'
                                }
                            }
                        },
                        featureTitle: {
                            mark: 'Mark',
                            markUndo: 'Mark Undo',
                            markClear: 'Mark Clear',
                            dataZoom: 'Data Zoom',
                            dataZoomReset: 'Data Zoom Reset',
                            dataView: 'Data View',
                            lineChart: 'Line Chart',
                            barChart: 'Bar Chart',
                            restore: 'Restore',
                            saveAsImage: 'Save as Image'
                        }
                    },
				    grid: {
				    	x:10,
				    	x2:10,
				        y: 20,
				        y2: 40
				    },
				    tooltip : {
				        trigger: 'axis'
				    },
				    toolbox: {
                        orient: 'horizontal',
                        x: 'center',
                        y: 'bottom',
                        show: true,
                        color: ['#1e90ff', '#22bb22', '#4b0082', '#d2691e'],
                        /*backgroundColor: 'rgba(0,0,0,0.5)',*/
                        borderColor: '#ccc',
                        borderWidth: 1,
                        padding: 5,
                        itemGap: 30,
                        itemSize: 16,
                        feature: {
                            mark: { show: true, title: 'Mark' },
                            dataView: { show: true, title: 'Data View', readOnly: false, lang: ['Data View', 'Turn Off', 'Refresh'] },
                            magicType: { show: true, title: { line: 'For line charts', bar: 'For bar charts' }, type: ['line', 'bar'] },
                            restore: {
                                show: true,
                                title: 'Restore'
                            },
                            saveAsImage: {
                                show: true,
                                title: 'Save as Image',
                                iconStyle: {
                                    textPosition: 'bottom'
                                }
                            }
                        },
                        featureTitle: {
                            mark: 'Mark',
                            markUndo: 'Mark Undo',
                            markClear: 'Mark Clear',
                            dataZoom: 'Data Zoom',
                            dataZoomReset: 'Data Zoom Reset',
                            dataView: 'Data View',
                            lineChart: 'Line Chart',
                            barChart: 'Bar Chart',
                            restore: 'Restore',
                            saveAsImage: 'Save as Image'
                        }
                    },
				    calculable : true,
				    xAxis : [
				        {
				            type : 'value',
				            min: 0,
				            max: 50,
				            position: 'top',
				            boundaryGap : [0, 0.01]
				        }
				    ],
				    yAxis : [
				        {
				            type : 'category',
				            axisLine: {show: false},
				            axisLabel: {show: false},
				            axisTick: {show: false},
				            splitLine: {show: false},
				            data : ['Kab. Kolaka', 'Kab. Pati', 'Cimahi', 'Denpasar', 'Madiun', 'Jakarta Timur', 'Solo', 'Kab. Boyolali', 'Kab. Sumedang', 'Kab. Bekasi']
				        }
				    ],
				    series : [
				        {
				            name:'Jumlah',
				            type:'bar',
				          	itemStyle : { 
				            	normal: {
					                color: '#FFBF77',
					                borderRadius: 5,
					                label : {
					                    show: true,
					                    position: 'right',
					                    formatter: '{b}'
				                	}
				            	}
				       	 	},
				            data:[
				                {value:1, itemStyle:labelRight},
				                {value:1, itemStyle:labelRight},
				                {value:1, itemStyle:labelRight},
				                {value:2, itemStyle:labelRight},
				            	{value:2, itemStyle:labelRight},
				                {value:4, itemStyle:labelRight},
				                {value:4, itemStyle:labelRight},
				                {value:6, itemStyle:labelRight},
				                {value:11, itemStyle:labelRight},
				                {value:23, itemStyle:labelRight},
				            ],
				          
				        }
				    ]
				    
				};

				chart_4.setOption(chart_4_options);

                // Resize charts
                // ------------------------------

                window.onresize = function() {
                    setTimeout(function() {
                        chart_3.resize();
                    }, 200);
                }

                /* CHART SALARY */

                var chart_salary = ec.init(document.getElementById('chart_salary'), limitless);

				var labelRight = {normal: {label : {position: 'right'}}};

				chart_salary_options = {
				    toolbox: {
                        orient: 'horizontal',
                        x: 'center',
                        y: 'bottom',
                        show: true,
                        color: ['#1e90ff', '#22bb22', '#4b0082', '#d2691e'],
                        /*backgroundColor: 'rgba(0,0,0,0.5)',*/
                        borderColor: '#ccc',
                        borderWidth: 1,
                        padding: 5,
                        itemGap: 30,
                        itemSize: 16,
                        feature: {
                            mark: { show: true, title: 'Mark' },
                            dataView: { show: true, title: 'Data View', readOnly: false, lang: ['Data View', 'Turn Off', 'Refresh'] },
                            magicType: { show: true, title: { line: 'For line charts', bar: 'For bar charts' }, type: ['line', 'bar'] },
                            restore: {
                                show: true,
                                title: 'Restore'
                            },
                            saveAsImage: {
                                show: true,
                                title: 'Save as Image',
                                iconStyle: {
                                    textPosition: 'bottom'
                                }
                            }
                        },
                        featureTitle: {
                            mark: 'Mark',
                            markUndo: 'Mark Undo',
                            markClear: 'Mark Clear',
                            dataZoom: 'Data Zoom',
                            dataZoomReset: 'Data Zoom Reset',
                            dataView: 'Data View',
                            lineChart: 'Line Chart',
                            barChart: 'Bar Chart',
                            restore: 'Restore',
                            saveAsImage: 'Save as Image'
                        }
                    },
				    grid: {
				    	x:40,
				    	x2:40,
				        y: 10,
				        y2: 60
				    },
				    tooltip : {
				        trigger: 'axis'
				    },
				    /*legend: {
				        data:['Salary']
				    },*/
				    calculable : true,
				    xAxis : [
				        {
				            type : 'category',
				            data : ['DIR','LEA','MKA','JTA','SCT','MGM','NFC','KLM','SCR','MKE']
				        }
				    ],
				    yAxis : [
				        {
				            type : 'value',
				            axisLabel : {
				                formatter: '{value} m'
				            }
				        }
				    ],
				    series : [
				        {
				            name:'Salary',
				            type:'bar',
				            data:[2, 5, 7, 23, 25, 76, 135, 162, 32, 20],
				            /*markPoint : {
				                data : [
				                    {type : 'max', name: '最大值'},
				                    {type : 'min', name: '最小值'}
				                ]
				            },*/
				            /*markLine : {
				                data : [
				                    {type : 'average', name: '平均值'}
				                ]
				            }*/
				        },
				        /*{
				            name:'降水量',
				            type:'bar',
				            data:[2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3],
				            markPoint : {
				                data : [
				                    {name : '年最高', value : 182.2, xAxis: 7, yAxis: 183, symbolSize:18},
				                    {name : '年最低', value : 2.3, xAxis: 11, yAxis: 3}
				                ]
				            },
				            markLine : {
				                data : [
				                    {type : 'average', name : '平均值'}
				                ]
				            }
				        }*/
				    ]
				    
				};

				chart_salary.setOption(chart_salary_options);

                // Resize charts
                // ------------------------------

                window.onresize = function() {
                    setTimeout(function() {
                        chart_salary.resize();
                    }, 200);
                }

                /* CHART LEAD */

                var chart_lead = ec.init(document.getElementById('chart_lead'), limitless);

				var labelRight = {normal: {label : {position: 'right'}}};

				chart_lead_options = {
				    toolbox: {
                        orient: 'horizontal',
                        x: 'center',
                        y: 'bottom',
                        show: true,
                        color: ['#1e90ff', '#22bb22', '#4b0082', '#d2691e'],
                        /*backgroundColor: 'rgba(0,0,0,0.5)',*/
                        borderColor: '#ccc',
                        borderWidth: 1,
                        padding: 5,
                        itemGap: 30,
                        itemSize: 16,
                        feature: {
                            mark: { show: true, title: 'Mark' },
                            dataView: { show: true, title: 'Data View', readOnly: false, lang: ['Data View', 'Turn Off', 'Refresh'] },
                            magicType: { show: true, title: { line: 'For line charts', bar: 'For bar charts' }, type: ['line', 'bar'] },
                            restore: {
                                show: true,
                                title: 'Restore'
                            },
                            saveAsImage: {
                                show: true,
                                title: 'Save as Image',
                                iconStyle: {
                                    textPosition: 'bottom'
                                }
                            }
                        },
                        featureTitle: {
                            mark: 'Mark',
                            markUndo: 'Mark Undo',
                            markClear: 'Mark Clear',
                            dataZoom: 'Data Zoom',
                            dataZoomReset: 'Data Zoom Reset',
                            dataView: 'Data View',
                            lineChart: 'Line Chart',
                            barChart: 'Bar Chart',
                            restore: 'Restore',
                            saveAsImage: 'Save as Image'
                        }
                    },
				    grid: {
				    	x:10,
				    	x2:10,
				        y: 20,
				        y2: 40
				    },
				    tooltip : {
				        trigger: 'axis'
				    },
				    toolbox: {
                        orient: 'horizontal',
                        x: 'center',
                        y: 'bottom',
                        show: true,
                        color: ['#1e90ff', '#22bb22', '#4b0082', '#d2691e'],
                        /*backgroundColor: 'rgba(0,0,0,0.5)',*/
                        borderColor: '#ccc',
                        borderWidth: 1,
                        padding: 5,
                        itemGap: 30,
                        itemSize: 16,
                        feature: {
                            mark: { show: true, title: 'Mark' },
                            dataView: { show: true, title: 'Data View', readOnly: false, lang: ['Data View', 'Turn Off', 'Refresh'] },
                            magicType: { show: true, title: { line: 'For line charts', bar: 'For bar charts' }, type: ['line', 'bar'] },
                            restore: {
                                show: true,
                                title: 'Restore'
                            },
                            saveAsImage: {
                                show: true,
                                title: 'Save as Image',
                                iconStyle: {
                                    textPosition: 'bottom'
                                }
                            }
                        },
                        featureTitle: {
                            mark: 'Mark',
                            markUndo: 'Mark Undo',
                            markClear: 'Mark Clear',
                            dataZoom: 'Data Zoom',
                            dataZoomReset: 'Data Zoom Reset',
                            dataView: 'Data View',
                            lineChart: 'Line Chart',
                            barChart: 'Bar Chart',
                            restore: 'Restore',
                            saveAsImage: 'Save as Image'
                        }
                    },
				    calculable : true,
				    xAxis : [
				        {
				            type : 'value',
				            min: 0,
				            max: 50,
				            position: 'top',
				            boundaryGap : [0, 0.01],
				            axisLabel : {
				                formatter: '{value} d'
				            }
				        }
				    ],
				    yAxis : [
				        {
				            type : 'category',
				            axisLine: {show: false},
				            axisLabel: {show: false},
				            axisTick: {show: false},
				            splitLine: {show: false},
				            data : ['Appliance Repairer', 'Offset Lithographic Press Operator', 'Geoscientists', 'Optical Instrument Assembler', 'Railroad Inspector', 'Roof Bolters Mining', 'Machinist', 'State', 'Electric Motor Repairer', 'Distribution Manager']
				        }
				    ],
				    series : [
				        {
				            name:'Jumlah',
				            type:'bar',
				          	itemStyle : { 
				            	normal: {
					                color: '#DC7977',
					                borderRadius: 5,
					                label : {
					                    show: true,
					                    position: 'right',
					                    formatter: '{b}'
				                	}
				            	}
				       	 	},
				            data:[
				                {value:1, itemStyle:labelRight},
				                {value:1, itemStyle:labelRight},
				                {value:1, itemStyle:labelRight},
				                {value:2, itemStyle:labelRight},
				            	{value:2, itemStyle:labelRight},
				                {value:4, itemStyle:labelRight},
				                {value:4, itemStyle:labelRight},
				                {value:6, itemStyle:labelRight},
				                {value:11, itemStyle:labelRight},
				                {value:23, itemStyle:labelRight},
				            ],
				          
				        },
				        /*{
				        	name: "S1",
				            type : 'pie',
				            center : ['35%', '70%'],
				            radius : radius,
				            x:'60%', // for funnel
				            itemStyle : labelFromatter,
				            data : [
				                {name:'other', value:70, itemStyle : labelBottom},
				                {name:'S1', value:30,itemStyle : labelTop}
				            ]
				        },*/
				        {
				            name: "Average",
				            type : 'pie',
				            center : ['80%', '50%'],
				            x:'60%', // for funnel
				            tooltip : {
				                trigger: 'item',
				                formatter: '{a} <br/>{b} : {c} ({d}%)'
				            },
				            radius : [0, 50],
				            itemStyle :　{
				                normal : {
				                    labelLine : {
				                        length : 20
				                    }
				                }
				            },
				            data:[
				                /*{
				                	name:'Total', 
				                	value:70, 
				                	itemStyle : 
									{
			                			normal : {
									        color: '#ccc',
									        label : {
									            show : true,
									            position : 'inner',
									            textStyle: {
									            	color: '#666',
									            },
				           						formatter : 'Total {c}%'
									        },
									        labelLine : {
									            show : false,
									            lineStyle: {
									            	color: '#DC7977',
									            }										            
									        }
									    },
			                		}

				            	},	*/			            	
				                {
				                	name:'Average', 
				                	value:30, 
				                	itemStyle : 
			                		{
			                			normal : {
									        color: '#A12B29',
									        label : {
									            show : true,
									            position : 'outer',
									            textStyle: {
									            	color: '#A12B29',
									            },
				           						formatter : 'Lead Time Average: {c}'
									        },
									        labelLine : {
									            show : true,
									            lineStyle: {
									            	color: '#DC7977',
									            }										            
									        }
									    },
			                		}

				            	}
				            ]
				        }
				    ]
				    
				};

				chart_lead.setOption(chart_lead_options);

                window.onresize = function() {
                    setTimeout(function() {
                        chart_lead.resize();
                    }, 200);
                }

                /* CHART TURN OVER RATE */

                /*var chart_tor = ec.init(document.getElementById('chart_tor'), limitless);

				var labelRight = {normal: {label : {position: 'right'}}};

				chart_tor_options = {
				    toolbox: {
                        orient: 'horizontal',
                        x: 'center',
                        y: 'bottom',
                        show: true,
                        color: ['#1e90ff', '#22bb22', '#4b0082', '#d2691e'],
                        borderColor: '#ccc',
                        borderWidth: 1,
                        padding: 5,
                        itemGap: 30,
                        itemSize: 16,
                        feature: {
                            mark: { show: true, title: 'Mark' },
                            dataView: { show: true, title: 'Data View', readOnly: false, lang: ['Data View', 'Turn Off', 'Refresh'] },
                            magicType: { show: true, title: { line: 'For line charts', bar: 'For bar charts' }, type: ['line', 'bar'] },
                            restore: {
                                show: true,
                                title: 'Restore'
                            },
                            saveAsImage: {
                                show: true,
                                title: 'Save as Image',
                                iconStyle: {
                                    textPosition: 'bottom'
                                }
                            }
                        },
                        featureTitle: {
                            mark: 'Mark',
                            markUndo: 'Mark Undo',
                            markClear: 'Mark Clear',
                            dataZoom: 'Data Zoom',
                            dataZoomReset: 'Data Zoom Reset',
                            dataView: 'Data View',
                            lineChart: 'Line Chart',
                            barChart: 'Bar Chart',
                            restore: 'Restore',
                            saveAsImage: 'Save as Image'
                        }
                    },
				    calculable : true,
				    tooltip : {
				        trigger: 'axis',
				        formatter: "TOR : <br/>{b} : {c}%"
				    },				    
				    grid: {
				    	x:40,
				    	x2:40,
				        y: 10,
				        y2: 60
				    },
				    xAxis : [
				        {
				            type : 'category',
				            data : ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGS', 'SEP', 'OKT', 'NOV', 'DES'],				            
				        }
				    ],
				    yAxis : [
				        {
				            type : 'value',
				            axisLine : {onZero: false},
				            axisLabel : {
				                formatter: '{value} %'
				            },
				            boundaryGap : false,
				            min: 0,
				            max: 1,
				            interval:0.2
				        }
				    ],
				    series : [
				        {
				            name:'Turn Over Rate',
				            type:'line',
				            smooth:false,
				            itemStyle: {
				                normal: {
				                    lineStyle: {
				                        shadowColor : 'rgba(0,0,0,0.4)'
				                    }
				                }
				            },
				            data:[0.21, 0.34, 0.60, 0.34, 0.53, 0.35]
				        }
				    ]
				    
				};

				chart_tor.setOption(chart_tor_options);

                window.onresize = function() {
                    setTimeout(function() {
                        chart_tor.resize();
                    }, 200);
                }*/





            }
        );
    });

</script>
@stop