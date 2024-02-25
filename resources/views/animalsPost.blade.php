<x-header />

<section>
    <div class="container">
        <div class="d-flex" style="margin-top: 40px;gap:160px;">

    <div id="carouselExampleCaptions" class="carousel slide w-50 h-50">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">

            @foreach ( $animal->foto_model as $key => $foto)
          <div class="carousel-item mh-50 {{ $key === 0 ? 'active' : '' }}">
            <img src="/storage/img/{{$foto->img}}" class="d-block w-100 mh-50 foto_slider" alt="..." style="max-height:50%;">
          </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
            <div class="d-flex flex-column align-items-center w-20 ">
              
              
               <h1 style="padding-bottom: 20px;">Пропала {{$animal->breeds_model->title}}</h1>
               <div>
            
                      @if ($animal-> name_animals != null)
                        <p>{{$animal->name_animals}} </p>
                      @endif
                      <p class="fs-3">Дата подачи: {{$animal->date_location}} </p>
                      <p class="fs-3">Имя того , кто нашёл: {{$animal->users_model->name}} </p>
                      <p class="fs-3">Номер телефона: {{$animal->users_model->phone}} </p>
                      <p class="fs-3">Место нахождения: {{$animal->users_model->region}} </p>
                      </div>
              
            </div>
    </div>
              
         </div>
    </section>
    <hr>
    <section>
    <div class="container">
      <h2 class="text-center text-warning">Обстоятельства при которых был найден</h2>
    <p class="fs-1 "  >{{$animal->description}} </p>
    </div>
    </section>
    <hr>
    <section class="container">

    <div class="comment_main">
            <div class="d-flex flex-column">
                <p class="comment_logo">Отзывы
                    @guest
                    <h2 style="padding-left: 20px;">Чтобы оставлять отзывы- <a href="/auth"> Войдите </a> или <a href="/register"> зарегистрируйтесь </a></h2>
                    @endguest
                </p>
                <hr style="   border: none; color: #ffffff; background-color: #ffffff; 
    height: 2px; ">
                @auth
                <form class="d-flex gap-1" method="POST" action="/{{$animal->id}}/comment_Add" enctype="multipart/form-data">
                    @csrf
                    <input class="comment_text" type="text" name="text_comment" placeholder="Оставить отзыв" height="100%" width="1300px">
                    <input class="form-control  comment_file" type="file" name="foto" id="formFile" width="80px" style="width: 380px;">
                    <input type="submit" class="comment_add">
                </form>
                @endauth

            </div>
            <div class="d-flex">
        @foreach ($comment as $comments)
             
                <div class="d-flex align-items-center  comment_users" style="margin-left:5px;">
                <div class="testimonial d-flex flex-column  align-items-center " style="width:300px; margin-bottom:20px;">
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
                
            
                </div>
             
          @endforeach

        
             
            </div>

    </section>
    

</body>

</html>



{{-- <img src="/storage/img/{{$foto->img}}" class="foto_slider">
@break

@foreach ($animal as $animals )
@endforeach --}}
