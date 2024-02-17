<x-header />

<section>
    <div class="container">

    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">

            @foreach ( $animal->foto_model as $key => $foto)
          <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
            <img src="/storage/img/{{$foto->img}}" class="d-block w-100 foto_slider" alt="...">
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
    </div>
    </section>
    <div>
        <p>{{$animal->description}} </p>
        @if ($animal-> name_animals != null)
        <p>{{$animal->name_animals}} </p>
        @endif
    </div>

    

</body>

</html>



{{-- <img src="/storage/img/{{$foto->img}}" class="foto_slider">
@break

@foreach ($animal as $animals )
@endforeach --}}
