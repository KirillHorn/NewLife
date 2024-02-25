
  
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
            <p>Количество добавленных объявлений: 10</p>
            <p>Количество животных, вернувшихся к хозяевам: 5</p>
            <p>Дата регистрации: {{Auth::user()->created_at}}</p>
            <p>Дней с момента регистрации: 365</p>
        </div>

        <div class="ads-container">
            <h2>Объявления пользователя</h2>

            <div class="ad">
                <p>Статус: Активно</p>
                <p>Район: Центральный</p>
                <p>Дата добавления: 10.02.2024</p>
                <p>Дополнительная информация: Порода: сиамская кошка, без клейма</p>
                <img src="/images/2894c6e765f0c46dd633c2649ec56b2e.jpeg" alt="2894c6e765f0c46dd633c2649ec56b2e.jpeg">
                <div class="ad-actions">
                    <button class="btn btn-danger">Удалить</button>
                    <button class="btn btn-primary">Редактировать</button>
                </div>
            </div>

        </div>
    </div>
    <x-footer></x-footer>
   
</body>
</html>



