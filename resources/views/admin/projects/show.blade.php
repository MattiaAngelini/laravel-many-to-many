@extends('layouts.admin')

@section('content')

    <section>
        <h1>PROGETTO: "{{$project->name}}"</h1>
        <h3>SLUG:</h3> {{$project->slug}}
        <h3>TYPE:</h3> {{ $project->type ? $project->type->name : 'No category' }}
        <h3>Descrizione:</h3>{{$project->summary}}  

        <div>
            <strong>Tags</strong>:
            @if (count($project->technologies) > 0)
                @foreach ($project->technologies as $technology)
                    {{ $technology->name }}@if (!$loop->last),@endif
                @endforeach
            @else
                none
            @endif
        </div>

        
    @if ($project->cover_image)
    <div>
        <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}">
    </div>
    @endif
    </section>
    
    
@endsection