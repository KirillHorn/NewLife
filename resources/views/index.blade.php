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

<section>
<div class="container mt-5">
    <div class="row ">
        <!-- Факт 1 -->
        <div class="col-md-4" style="margin-top: 20px;">
            <div class="card card_info" style="border: 1px solid #eea236;">
                <img src="/img/free-icon-pets-allowed-3372417.png" class="card-img-top" alt="Image 1">
                <div class="card-body">
                    <h5 class="card-title text-center">Помогли найти более 500 животных по всей стране!</h5>

                </div>
            </div>
        </div>
        <!-- Факт 2 -->
        <div class="col-md-4" style="height:400px; margin-top: 20px;">
            <div class="card card_info">
                <img src="/img/free-icon-pets-3574755.png" class="card-img-top" alt="Image 2">
                <div class="card-body">
                    <h5 class="card-title text-center">Более трех лет способствуем возвращению питомцев к хозяевам
                    </h5>

                </div>
            </div>
        </div>
        <!-- Факт 3 -->
        <div class="col-md-4" style="margin-top: 20px;">
            <div class="card card_info" style="border: 1px solid #eea236;">
                <img src="/img/free-icon-work-from-home-3015343.png" class="card-img-top" alt="Image 3">
                <div class="card-body">
                    <h5 class="card-title text-center">Все услуги оказываются бесплатно. Поможем найти вашего
                        питомца!</h5>

                </div>
            </div>
        </div>
    </div>
</div>

</section>

<section>
<div class="container mt-5">
    <div class="row">
        <!-- Карточка 1 -->
        <div class="col-md-4 mb-4">
            @foreach ($animals_status as $animalss)
                <div class="card bg_ellow">
                    @foreach ($animalss->foto_model as $foto)
                        <img src="/storage/img/{{ $foto->img }}" class="card-img-top" alt="Фото животного">
                    @break
                @endforeach
                <div class="card-body card_animal">
                    <h5 class="card-title" style="color: #333;">{{ $animalss->breeds_model->title }}</h5>
                    <p class="card-text">Район: {{ $animalss->region }}</p>
                    <p class="card-text">Телефон: {{ $animalss->users_model->phone }}</p>
                    <p class="card-text">Дата размещения: {{ $animalss->created_at }}</p>
                    <p class="card-text">Добавлено: {{ $animalss->users_model->name }}</p>
                </div>
            </div>
        @endforeach
    </div>


    <!-- Добавьте дополнительные карточки по необходимости -->

</div>
</div>
</section>

<section>
<div class="container mt-5">
<div class="row justify-content-center">
    <div class="col-md-12">
        <form>
            <div class="form-group" style="width: 100%;">
                <label for="district">Район:</label>
                <input type="text" class="form-control " id="district" placeholder="Введите район">
            </div>
            <div class="form-group">
                <label for="animalType">Вид животного:</label>
                <select class="form-control" id="animalType" style="color: #333">
                    <option value="cat" style="color: #333">Кошка</option>
                    <option value="dog" style="color: #333">Собака</option>
                    <option value="squirrel" style="color: #333">Суслик</option>
                    <option value="hamster" style="color: #333">Хомяк</option>
                    <!-- Добавьте дополнительные опции по необходимости -->
                </select>
            </div>
          
            <button type="submit" class="btn btn-warning" style="width: 20%; margin-left:40%;">Поиск
                питомца</button>
        </form>
    </div>
</div>
</div>
</section>

<section>
<div class="container mt-5">
<div class="koguvcavis-varazdel">
    <div class="sestim-donials">
        <h1>Отзывы</h1>
        <div class="sectionesag"></div>
        @foreach ($comment as $comments)
        <div class="sagestim-lonials">
            <div class="vemotau-vokusipol">
                <div class="testimonial">
                    <img src="/storage/img/{{$comments->img}}" alt="">
                    <div class="gecedanam">{{$comments->user_id->name}}</div>
                    <div class="apogered-gselected">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>

                    <p>{{$comments->text_comment}}</p>
                </div>
                @endforeach
            </div>

         

  
        </div>

    </div>
</section>

@auth
<section>
    <div class="container">
    <h1 class="text-center">Подпишись для рассылки!</h1>
    <form method="POST" action="/Subscription">
        @csrf
        <div class="form-group">
            <label for="animalSearch" class="text-light">Email</label>
            <input type="email" name="email" class="form-control" id="email" >
        </div>
        <button type="submit" class="btn btn-warning block-center"
            style="width: 20%; margin-left:40%;">Подписаться</button>
    </form>
    </div>
</section>
@endauth

<x-footer/>
</body>

</html>



{{-- <img src="/storage/img/{{$foto->img}}" class="foto_slider">
@break

@foreach ($animal as $animals)
@endforeach --}}
