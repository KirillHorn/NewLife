
  
    <x-header/>
    @if (session("error"))
    <div  id="message"  class="message">
    {{session("error")}}

    </div>
    @endif
    <div class="container cont-mt">
        <h1>Личный кабинет пользователя</h1>

        <div class="profile-info">
            <p>Номер телефона:  {{Auth::user()->phone}}
            <form method="POST" action="/Phone" >
              @csrf
           
            <input name="phone" value="{{Auth::user()->phone}}" type="text" style="color:#000;">
            <button class="btn btn-link">Изменить</button></p>
            </form>  
            <p>Email: {{Auth::user()->email}} 
            <form method="POST" action="/Email" >
              @csrf
   
            <input name="email" value="{{Auth::user()->email}} " type="text" style="color:#000;">
            <button class="btn btn-link">Изменить</button></p>
            </form> 
          </p>
            <p>Имя: {{Auth::user()->name}}</p>
            <p>Количество добавленных объявлений: {{Auth::user()->animalsCount()}}</p>
            <p>Количество животных, вернувшихся к хозяевам: 5</p>
            <p>Дата регистрации: {{Auth::user()->created_at}}</p>
            <p>Дней с момента регистрации: 365</p>
        </div>

        <div class="ads-container">
            <h2>Объявления пользователя</h2>
            @foreach ($userAnimal as $animals)
            <div class="ad">
                <p>Статус: {{ $animals->status_model->title }}</p>
                <p>Район:  {{ $animals->region }}</p>
                <p>Дата добавления: {{ $animals->date_location }}</p>
                <p>Дополнительная информация: {{ $animals->description }} Порода: {{ $animals->breeds_model->title }}</p>
                @foreach ($animals->foto_model as $foto)
                            <img src="/storage/img/{{ $foto->img }}" class="d-block w-100 foto_slider"
                                alt="...">
                        @break
                    @endforeach
      
                <div class="ad-actions">
                    <a href="/{{$animals->id}}/deleteAnimals" class="btn btn-danger">Удалить</a>
                </div>
            </div>

        </div>
        @endforeach
    </div>
    <x-footer></x-footer>
   
</body>
</html>



