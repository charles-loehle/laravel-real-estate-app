@extends('layouts.app')

@section('content')

	<section class="py-5 text-center container">
		<div class="row py-lg-5">
			<div class="col-lg-6 col-md-8 mx-auto">
				<h1 class="fw-light">Album example</h1>
				<p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
				<p>
					<a href="#" class="btn btn-primary my-2">Main call to action</a>
					<a href="#" class="btn btn-secondary my-2">Secondary action</a>
				</p>
			</div>
		</div>
	</section>

	<div class="album py-5 bg-light">
		<div class="container">
			<h2>Properties</h2>

			<form class="mb-4" action="{{ route('search') }}" method="get">
				@csrf

				<div class="form-group">
					<input class="form-control" type="text" name="address" placeholder="enter location">
				</div>

				<div class="form-group mb-2">
					<label for="description">Choose Category</label>
					<select name="category" class="form-control @error('category') is-invalid @enderror">
						<option value="">Select</option>
						@foreach (App\Models\Category::all() as $category)
							<option value="{{$category->id}}">
								{{$category->name}}
							</option>
						@endforeach
					</select>
				</div>

				<button type="submit" class="btn btn-primary">Search</button>

			</form>

			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
	
				@foreach($properties as $property)
					<div class="col">
						<div class="card shadow-sm">
							{{-- @php
								echo Storage::url($property->image);
							@endphp --}}
							<img src="{{Storage::url($property->image)}}>
	
							<div class="card-body">
								<p class="card-text">
									category: {{$property->category->name}}
								</p>
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
								<div class="d-flex justify-content-between align-items-center">
									<div class="btn-group">
										<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
										<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
									</div>
									<small class="text-muted">9 mins</small>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			
		
			</div>
		</div>
	</div>

@endsection
