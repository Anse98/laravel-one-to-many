@extends('layouts.app')

@section('content')
    <section>
        <div class="container py-5">
            <h1 class="color-red pb-5"> {{$project->title}}</h1>
            <p class="text-light pb-5">{{$project->description}}</p>

            <div class="d-flex align-items-center gap-3 pb-3">
                <a class="btn modify-button-bg text-light btn-sm" href="{{route('admin.projects.edit', $project->id)}}">Modifica</a>
            <div class="index" id="modal-delete-{{ $project->id }}">
                <div class="delete-notification py-3 px-4">
                    <p class="mb-5 border-bottom text-light"><b>Sei sicuro di voler eliminare questo elemento?</b></p>
                    <div class="d-flex justify-content-around">
                      <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        {{-- Pulsante elimina --}}
                        <input type="submit" value="Elimina" class="btn btn-danger btn-sm">
                      </form>
                      
                      {{-- Pulsante annulla --}}
                      <span class="btn btn-primary btn-sm" onclick="hideModal('{{ $project->id }}')">Annulla</span>
                    </div>
                </div>
              </div>
            
            <span class="btn btn-danger btn-sm" onclick="deleteNotification('{{ $project->id }}')">Elimina</span>
            </div>
        </div>
    </section>

    <script>
  
        function deleteNotification(projectId) {
          const deleteMenu = document.getElementById('modal-delete-' + projectId);
          deleteMenu.classList.add("d-block");
        }
      
        function hideModal(projectId) {
          const deleteMenu = document.getElementById('modal-delete-' + projectId);
      
          deleteMenu.classList.remove('d-block');
        }
      
            
    </script>

@endsection