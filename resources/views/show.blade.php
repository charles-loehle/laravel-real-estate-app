@extends('layouts.app')

@section('content')

<div class="container">
	<div class="">
		<div class="row justify-content-center">
			<div class="">
        <div class="gallery-wrap"> 
          <div class="img-big-wrap">
            <img src="{{Storage::url($property->image)}}"  width="450" >
          </div> 
					<div class="text">
						<h3 class="title mb-3">{{$property->address}}</h3>
							<p>${{$property->price}}</p>
					</div>
					<ul>
						<li>{{$property->bedrooms}} beds</li>
						<li>{{$property->bathrooms}} baths</li>
					</ul>
					<div>
						<p>${{$property->price}}</p>
					</div>
        </div> 
      </div>
		</div>
	</div>

	@if (count($propertyFromSameCategories) > 0)
		<div>
			<h3>Similar Homes You May Like</h3>

			<div class="row">
				@foreach ($propertyFromSameCategories as $property)
					<div class="col-md-4">
						<div class="card mb-4 shadow-sm">
							<img src="{{Storage::url($property->image)}}" alt="">
							<div class="card-body">
								<p class="card-text">
									${{$property->price}}
								</p>
								<p class="card-text">
									{{$property->address}}
								</p>
								<p class="card-text">
									{{$property->bedrooms}} bedrooms
								</p>
								<p class="card-text">
									{{$property->bathrooms}} bathrooms
								</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	@else
			
	@endif
</div>

@endsection