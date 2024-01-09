@extends('layouts.app')

@section('content')
    <section>
        <div class="container py-4">
            <h1 class="color-red pb-5">{{$project->title}}</h1>
            <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label color-grey">Titolo</label>
                    <input type="text" class="form-control text-bg-dark" name="title" id="title" placeholder="Titolo" value="{{old('title',$project->title)}}">
                </div>

                <div class="mb-3">
                    <label for="thumb" class="form-label color-grey">Url immagine</label>
                    <input type="text" class="form-control text-bg-dark" name="thumb" id="thumb" placeholder="Url Immagine" value="{{old('thumb',$project->thumb)}}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label color-grey">Descrizione</label>
                    <textarea class="form-control text-bg-dark" name="description" id="description" rows="4" placeholder="Descrizione del progetto">{{old('description', $project->description)}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label color-grey">Slug</label>
                    <input type="text" readonly class="form-control text-bg-dark" name="slug" id="slug" placeholder="Slug" value="{{old('slug', $project->slug)}}">
                </div>

                <div class="pt-5">
                    <input type="submit" class="btn main-button-background text-light" value="Conferma modifiche">
                </div>

            </form>

            @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </section>
@endsection