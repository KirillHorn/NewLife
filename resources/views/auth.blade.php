 <x-header />

 @if (session('error'))
     <div id="message" class="message">
         {{ session('error') }}

         @endif

     </div>
     <div class="container">
         <h1 class="text-center" style="color:#263248; padding-top:40px;">Войти</h1>
         <form method="POST" action="/sign_in_validate" class="form_reg">
             @csrf
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Электронная почта </label>
                 <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                     aria-describedby="emailHelp">
                 <p>
                     @error('email')
                         {{ $message }}
                     @enderror
                 </p>
             </div>
             <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label">Пароль</label>
                 <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                 <p>
                     @error('password')
                         {{ $message }}
                     @enderror
                 </p>
             </div>
             <button type="submit" class="btn btn-primary button_auth">Войти</button>
         </form>
     </div>

     </div>
