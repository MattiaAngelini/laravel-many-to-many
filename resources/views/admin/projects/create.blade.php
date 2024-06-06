@extends('layouts.admin')

@section('content')
    <section>
        <div class="container">
            <h1 class="p-3">NEW PROJECT</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form enctype= "multipart/form-data" action="{{ route('admin.projects.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="name class="form-label">New project</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="mb-3">
                    <label for="summary" class="form-label">Summary</label>
                    <textarea class="form-control" id="summary" rows="10" name="summary"></textarea>
                </div>

                <div class="mb-3">
                    <label for="cover_image" class="form-label">Image</label>
                    <input class="form-control" type="file" name="cover_image"></textarea>
                </div>
              
            <label for="type_id" class="form-label">Type:</label>
            <select class="form-select" id="type_id" name="type_id">
                <option value="">Select Type</option>
                @foreach ($types as $type)
                <!--Value delle options corrisponde al numero del 'type id' per visualizzare i type-->
                    <option @selected($type->id == old('type_id')) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>


            <div class="mb-3 mt-4">
                <h5>Technologies</h5>
    
                @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input @checked(in_array($technology->id, old('technologies', []))) class="form-check-input" type="checkbox" name="technologies[]" value="{{ $technology->id }}" id="technology-{{ $technology->id }}">
                        <label class="form-check-label" for="technology-{{ $technology->id }}">
                        {{ $technology->name }}
                        </label>
                    </div>
                @endforeach
            </div>

                <button type="submit" class="btn btn-primary">SAVE NEW PROJECT</button>
            </form>

        
        </div>
    </section>
@endsection