<x-header />

<section>
<div class="container mt-5">
<div class="row justify-content-center">
    <div class="col-md-12">
        <form method="post" action="/Poisk_post">
            @csrf
            <div class="form-group" style="width: 100%;">
                <label for="district">Район:</label>
                <input type="text" class="form-control " name="region" id="district" placeholder="Введите район">
            </div>
            <div class="form-group">
                <label for="animalType">Вид животного:</label>
                <select class="form-control" id="animalType" name="breeds" style="color: #333">
                 @foreach ($breeds as $breed )
                    <option value="{{$breed->id}}" style="color: #333">{{$breed->title}}</option>
               
                    @endforeach
                    <!-- Добавьте дополнительные опции по необходимости -->
                </select>
            </div>
            <!-- <div class="form-group">
                <label for="searchText">Текст для поиска:</label>
                <input type="text" class="form-control" id="searchText"
                    placeholder="Введите текст для поиска">
            </div> -->
            <button type="submit" class="btn btn-warning" style="width: 20%; margin-left:40%;">Поиск
                питомца</button>
        </form>
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



<x-footer/>
</body>

</html>



{{-- <img src="/storage/img/{{$foto->img}}" class="foto_slider">
@break

@foreach ($animal as $animals)
@endforeach --}}
