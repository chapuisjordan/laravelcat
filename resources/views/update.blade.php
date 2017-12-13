@extends('layouts.base')

@section('title', 'Accueil')
@section('main')
<div class="title">
    <h1>Mettre à jour un chat</h1>
</div>
<div class="flex-form">

    {!! Form::open(['url' => '/cat/update/{{id}}', 'class' =>'insertForm']) !!}
    {{{ Form::hidden('id', $cat->id) }}}
    <div class="flex-group">
        {{{ Form::label('Nom :') }}}
        {{{ Form::text('name', $cat->name) }}}
    </div>
    <div class="flex-group">
        {{{ Form::label('Espèce :') }}}
        {{{ Form::select('specie', ['L' => 'Large', 'S' => 'Small']) }}}
    </div>

    <div class="flex-group">
        {{{ Form::label('Taille :') }}}
        {{{ Form::number('size', $cat->size) }}}
    </div>
    <div class="flex-group">
        {{{ Form::label('Poids :') }}}
        {{{ Form::number('weight', $cat->weight) }}}
    </div>
    <div class="flex-group">
        {{{ Form::label('Age :') }}}
        {{{ Form::number('age', $cat->age) }}}
    </div>
    <div class="flex-group">
        {{{ Form::label('Sexe :') }}}
        {{{ Form::select('gender', $genders, $cat->gender->id) }}}
    </div>
    <div class="flex-group">
        {{{ Form::label('Couleur :') }}}
        {{{ Form::select('colors[]', $colors, $cat->colors, ['multiple' => true]) }}}
    </div>
    <div class="flex-group">
        {{{ Form::submit('Mettre à jour') }}}
    </div>
    {!! Form::close() !!}
</div>

@endsection