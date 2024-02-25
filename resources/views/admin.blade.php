<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="/style/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <x-alerts></x-alerts>
</head>
<body>



<a href="sign_out" type="button" class="btn btn-warning center-block">Выход</a>
<div class="container mt-4">
    <h2 class="text-center mb-4 text-black" >Объявления о найденных животных</h2>

    <div class="personal-settings justify-content-center rounded-1 d-flex  border py-3 px-4 mb-3 gap-3" >
            <a href="{{ route('admins', ['sort_order' => '0']) }}" class="text-decoration-none ">Все статусы</a>
            <a href="{{ route('admins', ['sort_order' => '1']) }}" class="text-decoration-none ">На модерации</a>
            <a href="{{ route('admins', ['sort_order' => '2']) }}" class="text-decoration-none ">Активно</a>
            <a href="{{ route('admins', ['sort_order' => '3']) }}" class="text-decoration-none ">Найдено</a>
            <a href="{{ route('admins', ['sort_order' => '4']) }}" class="text-decoration-none ">В архиве</a>

        </div>

    <!-- Объявления о найденных животных -->
    <div class="row">
      <div class="col-md-4">
        @foreach( $post as $posts)
        <div class="card mb-4">
          <!-- Информация о найденном животном -->
          <div class="card-body card_admin">
            <h5 class="card-title">Вид животного:{{ $posts->breeds_model->title }}</h5>
            <p class="card-text">Доп. информация: {{ $posts->description }}</p>
            <p class="card-text">Клеймо: @if ($posts->name_animals == null ) Клички нету @else  {{$posts->name_animals}}  @endif </p>
            <p class="card-text">Район:  {{ $posts->region }}</p>
            <p class="card-text">Дата найденного животного: {{ $posts->date_location }}</p>
            <p class="card-text">Контактный номер: {{ $posts->users_model->phone }}</p>
            <p class="card-text">Статус: {{ $posts->status_model->title }}</p>
          </div>
          <div class="card-footer">
            <div class="btn-group" role="group" aria-label="Basic example">
              @if ($posts->status == 1)
              <a href="{{ route('changeStatus', [ 'id' => $posts->id  ,'status' => 2]) }}" type="button" class="btn btn-success">Активно</a>
              <a href="{{ route('changeStatus', [ 'id' => $posts->id  ,'status' => 3]) }}" type="button" class="btn btn-warning">Найдено</a>
              <a href="{{ route('changeStatus', [ 'id' =>  $posts->id  ,'status' => 4]) }}" type="button" class="btn btn-danger">В архиве</a>
              @elseif ($posts->status == 2)
              <a href="{{ route('changeStatus', [ 'id' => $posts->id  ,'status' => 3]) }}" type="button" class="btn btn-warning">Найдено</a>
              <a href="{{ route('changeStatus', [ 'id' =>  $posts->id  ,'status' => 4]) }}" type="button" class="btn btn-danger">В архиве</a>
              @elseif ($posts->status == 3)
              <a href="{{ route('changeStatus', [ 'id' =>  $posts->id  ,'status' => 4]) }}" type="button" class="btn btn-danger">В архиве</a>
              
             @else 
             <p>Уже в архиве</p>
              @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <!-- Добавьте дополнительные карточки с объявлениями по мере необходимости -->
    </div>
  </div>
  </body>   