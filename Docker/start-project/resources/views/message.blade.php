@extends('templates/'.$template, ['titulo'=> $titulo])

@section('conteudo')

    <div class="row">
        <div class="col-2">
            @if($type == "success")
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#198754" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
            @elseif($type == "danger")
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#DC3545" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#0D6EFD" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                </svg>
            @endif
        </div>
        <div class="col-8 text-center">
            <span class="fs-5 text-{{$type}}"><b>{{ mb_strtoupper($message, 'UTF-8') }}</b></span>
        </div>
        <div class="col-2 text-center">
            <x-button label="OK" type="" route="{{$link}}" color="dark"/>
        </div>
    </div>

@endsection

