

    <x-header/>
    <div class="container">
    @if (session("error"))
    <div  id="message"  class="message">
    {{session("error")}}

    </div>
    @endif

    @if (session("yes"))
    <div  id="message"  class="message">
    {{session("yes")}}

    </div>
    @endif
    <h1 class="text-center" style="padding-top:40px;">Добавить объявление</h1>
    <form method="POST" action="/AnimalsAdd_validate" class="form_reg" enctype="multipart/form-data" >
      @csrf
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Кличка животного (необязательно)</label>
        <input type="text" name="name_animals" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3">
        <label for="floatingTextarea">Обстоятельство</label>
          <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
          <p>@error('description') {{$message}}  @enderror</p>
      </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Район</label>
          <input type="text" name="region" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <p>@error('region') {{$message}}  @enderror</p>
        </div>
        <div class="mb-3">

           <label class="form-label" for="photo">Фото</label>
          <label for="photo" class="c-post-cstm-input">
          <input type="file" name="foto[]" class="form-control" id="photo"  multiple>
          <span id="photo-fake">Выберите фото</span>
          </label>

          <p>@error('foto') {{$message}}  @enderror</p>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Дата нахождения</label>
          <input type="date" name="date" class="form-control" aria-describedby="emailHelp">
          <p>@error('date') {{$message}}  @enderror</p>
        </div>
        <div class="mb-3">
          <label for="floatingSelectGrid">Вид животного</label>
          <select class="form-select" id="floatingSelectGrid" name="breed"  style="height: 40px; font-size:15px;">
            <option selected  style="font-size:15px;" >Выберите вид животного</option>
            @foreach ($breeds as $breed)
            <option value="{{$breed->id}}" style="font-size:15px;">{{$breed->title}}</option>
            @endforeach
            <p>@error('breed') {{$message}}  @enderror</p>
          </select>
        </div>
        <div class="mb-3 form-check">
    <input type="checkbox" name="check" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Обработка персональной информации</label>
    <p>@error('check') {{$message}}  @enderror</p>
  </div>
        <button type="submit" class="button_auth btn btn-primary" style="width: 300px; margin-left: 20%;
    background-color: #000;" >Добавить объявление</button>
      </form>

    </div>


    <script>
    document.getElementById("photo").addEventListener("change", function() {
            var fileInput = this;
            var spanElement = document.getElementById("photo-fake");
            if (fileInput.files && fileInput.files.length > 0) {
                spanElement.textContent = "Выбрано файлов: " + fileInput.files.length;
            } else {
                spanElement.textContent = "Выберите фото";
            }
        });
    </script>
</body>
</html>






