<x-head title="Categories"/>
<x-nav active="categories"/>
<div class="container">
  <h1>Categories</h1>
    <div class="d-flex flex-wrap justify-content-around">
        @foreach ($categories as $category)
            <div class="card m-3" style="width: 18rem;">
                <img src="img/{{ $category->img }}" class="card-img-top h-100" alt="...">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center fw-bolder">{{ $category->name }}</li>
                </ul>
            </div>
        @endforeach
    </div>
</div>
<x-foot/>