<?php
    $title = 'Connexion';

    $columnSizes = [
        'sm' => [4, 8],
        'lg' => [3, 9]
    ];

    $requiredField = ' <sup style="color: #f00">*</sup>';
?>

@extends('layouts.default')

@section('title', $title)

@section('content')
        <h2 class="header">{{ $title }}</h2>
        <hr>

        {!! BootForm::openHorizontal($columnSizes)
            ->action(route('auth::login')) !!}

            <p>Les champs précédés par le signe &laquo;<sub style="font-size: 16px"><?= $requiredField ?></sub> &raquo; doivent obligatoirement être renseignés.</p>
            <br>

            {!! BootForm::text('Adresse e-mail' . $requiredField, 'email')
                ->required()
                ->placeholder('adresse@exemple.com') !!}

            {!! BootForm::password('Mot de passe' . $requiredField, 'password')
                ->required() !!}

            {!! BootForm::submit('Se connecter')
                ->class('btn btn-primary') !!}

        {!! BootForm::close() !!}
@endsection
