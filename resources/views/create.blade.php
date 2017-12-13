@extends('layouts.base')

@section('title', 'Accueil')
@section('main')
  <div class="title">
    <h1>Insertion d'un nouveau chat</h1>
  </div>
<div class="flex-form">

  {!! Form::open(['url' => '/cat/insert', 'class' =>'insertForm']) !!}
    <div class="flex-group">
      {{{ Form::label('Nom :') }}}
      {{{ Form::text('name') }}}
    </div>
    <div class="flex-group">
      {{{ Form::label('Espèce :') }}}
      {{{ Form::select('specie', ['L' => 'Large', 'S' => 'Small']) }}}
    </div>

    <div class="flex-group">
      {{{ Form::label('Taille :') }}}
      {{{ Form::number('size') }}}
    </div>
    <div class="flex-group">
      {{{ Form::label('Poids :') }}}
      {{{ Form::number('weight') }}}
    </div>
    <div class="flex-group">
      {{{ Form::label('Age :') }}}
      {{{ Form::number('age') }}}
    </div>
    <div class="flex-group">
      {{{ Form::label('Sexe :') }}}
      {{{ Form::select('genders', $genders) }}}
    </div>
    <div class="flex-group">
      {{{ Form::label('Couleur :') }}}
      {{{ Form::select('colors[]', $colors, 0, ['multiple' => true]) }}}
    </div>
    <div class="flex-group">
      {{{ Form::submit('Insérez un chat') }}}
    </div>
  {!! Form::close() !!}
</div>
@endsection
