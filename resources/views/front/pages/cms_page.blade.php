@extends('layouts.frontLayout.front_layout')
@section('content')

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class="active">{{$cmsPageDetail['title']}}</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->
    <!-- MAIN SECTION -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="section-title">
						 <h3 class="title">{{$cmsPageDetail['title']}}</h3>
				</div>
                <div class="section-content">
                <?php echo nl2br($cmsPageDetail['description']); ?>
                </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- /MAIN SECTION -->
@endsection