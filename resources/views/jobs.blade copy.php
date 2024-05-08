@extends('layouts.main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

<script>
    // Returns an array of maxLength (or less) page numbers
    // where a 0 in the returned array denotes a gap in the series.
    // Parameters:
    //   totalPages:     total number of pages
    //   page:           current page
    //   maxLength:      maximum size of returned array
    function getPageList(totalPages, page, maxLength) {
        if (maxLength < 5) throw "maxLength must be at least 5";

        function range(start, end) {
            return Array.from(Array(end - start + 1), (_, i) => i + start);
        }

        var sideWidth = maxLength < 9 ? 1 : 2;
        var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
        var rightWidth = (maxLength - sideWidth * 2 - 2) >> 1;
        if (totalPages <= maxLength) {
            // no breaks in list
            return range(1, totalPages);
        }
        if (page <= maxLength - sideWidth - 1 - rightWidth) {
            // no break on left of page
            return range(1, maxLength - sideWidth - 1)
                .concat([0])
                .concat(range(totalPages - sideWidth + 1, totalPages));
        }
        if (page >= totalPages - sideWidth - 1 - rightWidth) {
            // no break on right of page
            return range(1, sideWidth)
                .concat([0])
                .concat(range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages));
        }
        // Breaks on both sides
        return range(1, sideWidth)
            .concat([0])
            .concat(range(page - leftWidth, page + rightWidth))
            .concat([0])
            .concat(range(totalPages - sideWidth + 1, totalPages));
    }

    $(function() {
        // Number of items and limits the number of items per page
        var numberOfItems = $("#jar .cont-page").length;
        var limitPerPage = 10;
        // Total pages rounded upwards
        var totalPages = Math.ceil(numberOfItems / limitPerPage);
        // Number of buttons at the top, not counting prev/next,
        // but including the dotted buttons.
        // Must be at least 5:
        var paginationSize = 5;
        var currentPage;

        function showPage(whichPage) {
            if (whichPage < 1 || whichPage > totalPages) return false;
            currentPage = whichPage;
            $("#jar .cont-page").hide()
                .slice((currentPage - 1) * limitPerPage,
                    currentPage * limitPerPage).show();
            // Replace the navigation items (not prev/next):            
            $(".pagination li").slice(1, -1).remove();
            getPageList(totalPages, currentPage, paginationSize).forEach(item => {
                $("<li>").addClass("page-item")
                    .addClass(item ? "current-page" : "disabled")
                    .toggleClass("active", item === currentPage).append(
                        $("<a>").addClass("page-link").attr({
                            href: "javascript:void(0)"
                        }).text(item || "...")
                    ).insertBefore("#next-page");
            });
            // Disable prev/next when at first/last page:
            $("#previous-page").toggleClass("disabled", currentPage === 1);
            $("#next-page").toggleClass("disabled", currentPage === totalPages);
            return true;
        }

        // Include the prev/next buttons:
        $(".pagination").append(
            $("<li>").addClass("page-item").attr({
                id: "previous-page"
            }).append(
                $("<a>").addClass("page-link").attr({
                    href: "javascript:void(0)"
                }).html("<i class='fa fa-chevron-left'></i>")
            ),
            $("<li>").addClass("page-item").attr({
                id: "next-page"
            }).append(
                $("<a>").addClass("page-link").attr({
                    href: "javascript:void(0)"
                }).html("<i class='fa fa-chevron-right'></i>")
            )
        );
        // Show the page links
        $("#jar").show();
        showPage(1);

        // Use event delegation, as these items are recreated later    
        $(document).on("click", ".pagination li.current-page:not(.active)", function() {
            return showPage(+$(this).text());
        });
        $("#next-page").on("click", function() {
            return showPage(currentPage + 1);
        });

        $("#previous-page").on("click", function() {
            return showPage(currentPage - 1);
        });
        
        
        $(function(){
          $(".teks-elipsis").each(function(i){
            len=$(this).text().length;
            if(len>240)
            {
              $(this).text($(this).text().substr(0,240)+'...');
            }
          });
        });
    });

</script>

<style>
    .pagination > li:first-child > a {
        padding: 9px 10px;
    }
    .pagination > li:last-child > a {
        padding: 9px 10px;
    }
    #left-sticky {
        float:left;
        margin:0px 0 0;
    }
    #left-sticky.stick {
        position:fixed;
        top:0;
        margin:0px 0 0
    }
    #right-sticky {
        float:right;
        margin-top:0px;
    }
</style>

@section('content')
	<div id="jobs">
		<div class="container pad-r-0 pad-l-0">
			<div class="col-md-4">                
                <div class="sidebar-nav-fixed affix pos-rel-m width-26 width-100-m">
                    <div class="va-table fs-13" style="width:100%; padding:20px 20px; background:#034369; color:#fff; text-align: center; margin:0 auto;">
                        <div class="va-middle" style="text-align:left;">
                            <h4>CARI LOWONGAN</h4>
                        </div>
                        <div class="va-middle" style="text-align:right;">
                            <h4><i class="fa fa-search"></i></h4>
                        </div>
                    </div>
                    <div class="criteria panel pad-0">
                        <form method="GET" action="{{route('job-search')}}" class="mar-b-0-m">

                            <div class="form-group mar-b-0" style="padding:15px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" placeholder='Posisi, keahlian, dan kata kunci...' name='title' value='{{Request::get("title")}}'/>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-control" name='field_id'>
                                            <option value='0'>Pilih Bidang</option>
                                            @foreach($fields as $field)
                                            <option value='{{$field->id}}' {{Request::get('field_id') == $field->id ? 'selected' : ''}}>{{$field->field}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-control mar-b-0" name='province_id'>
                                            <option value='0'>Pilih Provinsi</option>
                                            @foreach($provinces as $province)
                                            <option value='{{$province->id}}' {{Request::get('province_id') == $province->id ? 'selected' : ''}}>{{$province->province}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div><button class="btn col-md-12 btn-success pad-10-0 width-100-m">CARI</button></div>	                    
                        </form>
                    </div>
                </div>
			</div>		
			<div class="col-md-8">
				<div style="margin-bottom:20px; font-size:14px;">
				    <div style="background:#DCDCDC; padding:10px 15px; color:#999">
				        <div class="va-table width-100">
				            <div class="va-middle">Hasil penelusuran <small>({{$jobs->count() > 0 ? '1' : '0'}}-{{$jobs->count()}} dari {{$jobs->count()}} hasil)</small></div>
				            <div class="va-middle" style="text-align:right;">
				                <div class="sort">
                                    <form class='form-inline mar-b-0'>
                                        <div class="form-group">
                                            <label style="font-weight:normal; margin-bottom:0px">Urutkan</label>
                                            <select id="filter-job">
                                                <option value="newest" {{Request::get('filter') == 'newest' ? 'selected' : ''}}>Terbaru</option>
                                                <option value="oldest" {{Request::get('filter') == 'oldest' ? 'selected' : ''}}>Terlama</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
				            </div>
				        </div>
				    </div>
				</div>
				<div class="list-job row" id="jar" style="display:none">
					@foreach($jobs as $job)
	                <div class="col-md-12 cont-page">
                       <div class="va-table width-100 pad-t-1em-m pad-b-1em-m pad-l-0-m" style="background:#DCDCDC;">
				            <div class="va-middle">
                                <div style="padding-left:1.2em;"><h4><a href="{{route('job-detail', $job->job_id)}}">{{$job->title}}</a></h4></div>
                            </div>
				            <div class="va-middle" style="text-align:right;">
				                <div class="see-detail text-right">
                                    <a href="{{route('job-detail', $job->job_id)}}" class='btn btn-lg btn-success'><i class="fa fa-ellipsis-h"></i></a>
                                </div>
				            </div>
				        </div>
                        <div class="row">
                            <div class="col-md-4 pad-r-0 pad-r-15-m">
                                <div class="item panel mar-b-0-m">
                                    <div class="va-table" style="height:145px; width:100%;">
                                        <div class="va-middle" style="padding:10px 0px;">
                                            <table>
                                                <tr>
                                                    <td style="vertical-align:top; width:20px; font-size:13px !important;"><i class="fa fa-map-marker"></i></td>
                                                    <td style="font-size:13px !important;">Aerofood unit: <b>{{$job->city->city.', '.$job->province->province}}</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="vertical-align:middle; width:20px; font-size:13px !important;"><i class="fa fa-birthday-cake"></i></td>
                                                    <td style="font-size:13px !important;">Usia minimal <b>{{$job->min_age}} tahun</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="vertical-align:middle; width:20px; font-size:13px !important;"><i class="fa fa-graduation-cap"></i></td>
                                                    <td style="font-size:13px !important;">Minimal <b>{{$job->min_education()}}</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="vertical-align:middle; width:20px; font-size:13px !important;"><i class="fa fa-briefcase"></i></td>
                                                    <td style="font-size:13px !important;">Pengalaman <b>{{$job->min_experience}} tahun</b></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 pad-l-0 pad-l-15-m">
                                <div class="item panel">
                                    <div class="va-table" style="height:145px; width:100%; overflow: scroll;">
                                        <div class="va-middle">
                                            <div class="location text-muted">Deskripsi Pekerjaan</div>
                                            <hr class="mar-t-0" style="margin-bottom:10px;">
                                            <div class="description mar-b-0 teks-elipsis" style="height:103px; overflow: hidden;"><?php echo $job->description ?></div>
                                            <!-- <div class="created-date"><i class="fa fa-clock-o"></i> Berakhir 3 hari lagi</div> -->
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>	         
                        </div>           
	                </div>
	                @endforeach
	                @if($jobs->count() == 0)
	                <div class="col-md-12">
	                    <div class="item panel alert alert-danger" role='alert'>
	                        <h4>Tidak menemukan hasil untuk penelusuran terkait</h4>
	                    </div>
	                </div>
	                @endif
				</div>
				
				<div class="pagination mar-t-0"></div>
				
			</div>
		</div>	
	</div>	
@stop

@push('scripts')
    <script type="text/javascript">

        $(function(){
            $('#filter-job').on('change', function(){
                window.location.search = 'filter=' + $(this).val()

            })
        })
    </script>
@endpush

<script>
    /*$( document ).ready(function() {
        var left = document.getElementById("left-sticky");
        var stop = (left.offsetTop - 60);

        window.onscroll = function (e) {
            var scrollTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
            console.log(scrollTop, left.offsetTop);
            // left.offsetTop;

            if (scrollTop >= stop) {
                left.className = 'stick';
            } else {
                left.className = '';
            }

        }
    });*/
    
    
</script>