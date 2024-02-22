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
    <div class="row">
        <!-- Факт 1 -->
        <div class="col-md-4">
            <div class="card card_info" style="border: 1px solid #eea236;">
                <img src="/img/free-icon-pets-allowed-3372417.png" class="card-img-top" alt="Image 1">
                <div class="card-body">
                    <h5 class="card-title text-center">Помогли найти более 500 животных по всей стране!</h5>

                </div>
            </div>
        </div>
        <!-- Факт 2 -->
        <div class="col-md-4" style="height:400px;">
            <div class="card card_info">
                <img src="/img/free-icon-pets-3574755.png" class="card-img-top" alt="Image 2">
                <div class="card-body">
                    <h5 class="card-title text-center">Более трех лет способствуем возвращению питомцев к хозяевам
                    </h5>

                </div>
            </div>
        </div>
        <!-- Факт 3 -->
        <div class="col-md-4">
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
            <div class="form-group">
                <label for="searchText">Текст для поиска:</label>
                <input type="text" class="form-control" id="searchText"
                    placeholder="Введите текст для поиска">
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
        <div class="sagestim-lonials">
            <div class="vemotau-vokusipol">
                <div class="testimonial">
                    <img src="https://zornet.ru/_fr/83/7890600.jpg" alt="">
                    <div class="gecedanam">Антон Попов</div>
                    <div class="apogered-gselected">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>

                    <p>Здесь первое описание. Продолжение.</p>
                </div>
            </div>

            <div class="vemotau-vokusipol">
                <div class="testimonial">
                    <img src="https://zornet.ru/_fr/83/2047084.jpg" alt="">
                    <div class="gecedanam">Дмитрий Атрохов</div>
                    <div class="apogered-gselected">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <p>Второй отзыв. Его продолжение.</p>
                </div>
            </div>

            <div class="vemotau-vokusipol">
                <div class="testimonial">
                    <img src="https://zornet.ru/_fr/83/5640570.jpg" alt="">
                    <div class="gecedanam">Каспер Волков</div>
                    <div class="apogered-gselected">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <p>Третье описание. На отзыв.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

<x-footer/>
</body>

</html>



{{-- <img src="/storage/img/{{$foto->img}}" class="foto_slider">
@break

@foreach ($animal as $animals)
@endforeach --}}
