
  
    <x-header/>
    <div class="container">
    @if (session("error"))
    <div  id="message"  class="message">
    {{session("error")}}

    </div>
    @endif
    <h1 class="text-center" style="color:#263248; padding-top:40px;">Регистрация</h1>
    <form method="POST" action="/sign_up_validate" class="form_reg">
      @csrf
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Имя</label>
        <input type="text" name="name" class="form-control" id="exampleInputPassword1">
        <p>@error('name') {{$message}}  @enderror</p>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Фамилия</label>
        <input type="text" name="surname" class="form-control" id="exampleInputPassword1">
        <p>@error('surname') {{$message}}  @enderror</p>
      </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <p>@error('email') {{$message}}  @enderror</p>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Телефон</label>
          <input type="phone" name="phone" class="form-control phone" id="tel" aria-describedby="emailHelp">
          <p>@error('phone') {{$message}}  @enderror</p>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Пароль</label>
          <input type="password" name="password" class="form-control" id="exampleInputEmail1">
          <p>@error('password') {{$message}}  @enderror</p>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Повторите пароль</label>
          <input type="password" name="password_reset" class="form-control" id="exampleInputPassword1">
          <p>@error('password_reset') {{$message}}  @enderror</p>
        </div>
        <div class="mb-3 form-check">
    <input type="checkbox" name="check" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
    <p>@error('check') {{$message}}  @enderror</p>
  </div>
        <button type="submit" class="btn btn-primary button_auth" >Зарегистрироваться</button>
      </form>


    </div>
    <script>
 $(".phone").mask("+7(999)999-99-99");
    </script>
</body>
</html>



