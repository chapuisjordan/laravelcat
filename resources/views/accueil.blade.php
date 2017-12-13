@extends('layouts.base')

@section('title', 'Accueil')
@section('main')
  <div>
    <h1 class="title">Liste des chats : </h1>
  </div>
  <table class="tableau">
    <tr>
      <td>Name</td>
      <td>Age</td>
      <td>Size</td>
      <td>Weight</td>
      <td>Sexe</td>
      <td>Couleur</td>
      <td>Delete</td>
      <td>Update</td>
    </tr>
  @foreach ($cats as $cat)
        <tr>
          <td>{{ $cat->name }}</td>
          <td>{{ $cat->age }}</td>
          <td>{{ $cat->size }}</td>
          <td>{{ $cat->weight }}</td>

          @if($cat->gender)
             <td>{{ $cat->gender->gender }}</td>

          @else
            <td>N</td>
          @endif
          <td>
           @foreach($cat->colors as $color)
              {{ $color->color }}
           @endforeach
          </td>
          <td>
              <form class="delete-form" method="GET" action="/cat/delete/{{$cat->id}}">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-outline-warning">
                      <i class="fa fa-trash orange" aria-hidden="true"></i>
                  </button>
              </form>
          </td>
          <td>
              <form class="update-form" method="GET" action="/cat/update/{{$cat->id}}">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-outline-warning">
                      <i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>
              </form>
          </td>
        </tr>
  @endforeach
  </table>


@endsection
