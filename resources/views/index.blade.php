<x-header />

<section style="background-color:  RGBA(var(--bs-dark-rgb);">
    <div class="container" style="padding-top: 20px">

        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">

                @foreach ($animal as $key => $animals)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">

                        @foreach ($animals->foto_model as $foto)
                            <img src="/storage/img/{{ $foto->img }}" class="d-block w-100 foto_slider"
                                alt="...">
                        @break
                    @endforeach
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $animals->breeds_model->title }}</h5>
                        <p>{{ $animals->description }}</p>
                        <a href="/{{ $animals->id }}/animalsPost" class="btn btn-warning"
                            style="margin-bottom: 20px;">Поподробнее</a>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
</section>
<section style=" margin-top: 40px;">
<div class="container">
    <h5 class="card-title text-light text-center fs-1">Быстрый поиск животного</h5>
    <!-- Форма поиска -->
    <form>
        <div class="form-group">
            <label for="animalSearch" class="text-light">Введите вид животного:</label>
            <input type="text" class="form-control" id="animalSearch" placeholder="Например, кошка">
        </div>
        <button type="submit" class="btn btn-warning block-center"
            style="width: 20%; margin-left:40%;">Найти</button>
    </form>
    <!-- Подсказки по поиску -->
    <div class="mt-3">
        <p class="text-light">Подсказки: лев, собака, попугай, рыба и т.д.</p>
    </div>
</div>
</section>

<section >

</section>

</body>

</html>



{{-- <img src="/storage/img/{{$foto->img}}" class="foto_slider">
@break

@foreach ($animal as $animals)
@endforeach --}}
