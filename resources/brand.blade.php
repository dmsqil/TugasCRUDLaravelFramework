<x-head title="Brand" />
<x-nav active="brand" />
<div class="container">
    <h1>Brand</h1>
    <div class="d-flex flex-wrap justify-content-around">
        @foreach ($brands as $brand)
            <div class="card m-3" style="width: 18rem;">
                <img src="img/{{ $brand->img }}" class="card-img-top" style="height:15rem; width:auto;" alt="...">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="mb-3">
                    <h5 class="card-title">{{ $brand->name }}</h5>
                    <p class="card-text">{{ $brand->address }}</p>
                    </div>
                    <a href="{{ $brand->website }}" class="align-self-start btn btn-primary">{{ $brand->website }}</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<x-foot />