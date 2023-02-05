@extends('layouts.app')
@section('content')
    <h3 class="text-center my-5">
        Liste des formations 
        <a href="{{ route("formations.create") }}">
            <i class="fa fa-plus"></i>
        </a>
    </h3>

    @if(session()->has('success'))
        <div class="alert alert-success mb-2" id="alert">{{ session()->get('success') }}</div>
    @endif

    @if(count($formations) > 0)
        <table id="myTable" class="table table-hover">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Durée (heures)</th>
                    <th>Date de début</th>
                    <th>Référentiel</th>
                    <th>Débutée</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($formations as $formation)
                <tr>
                    <td>{{ ucwords($formation->nom) }}</td>
                    <td>{{ ($formation->duree) }}</td>
                    <td>{{ ($formation->date_debut) }}</td>
                    <td>{{ ucwords($formation->referentiel->libelle) }}</td>
                    <td>
                        <span class="badge {{isStartedClass($formation->isStarted)}}">
                            {{ isStartedText($formation->isStarted) }}
                        </span>
                    </td>
                    <td colspan="2">
                        <a href="{{ route('formations.edit', $formation->id ) }}">
                            <i class="fa fa-edit mx-2"></i>
                        </a>
                        <a data-id="{{ $formation->id }}" class="delete" role="button">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3 d-flex justify-content-end">{{ $formations->links() }}</div>
    @else
        <h3 class="text-danger my-5">Pas de formation !</h3>
    @endif

   <!-- Modal -->
   <div class="modal fade" id="modifformation" tabindex="-1" aria-labelledby="modificationRef" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modificationRef">Modification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5">
                <form action="" method="POST" id="editForm">
                    @csrf
                    @method("put")
                    <div class="form-group mb-3">
                        <label>{{ __('Libellé') }}:</label>
                        <input type="text" name="libelle" class="form-control" required id="libelleModif">
                    </div>
                    <div class="form-group mb-3">
                        <label>{{ __('Horaire') }}:</label>
                        <input type="text" name="horaire" class="form-control" required id="horaireModif">
                    </div>
                    <select name="type_id" id="type_id" class="form-select mb-5" >
                        @foreach ($referentiels as $referentiel)
                            <option value="{{ $referentiel->id }}">{{ $referentiel->libelle }}</option>
                        @endforeach
                        </select>
                    <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
                        <button type="submit" class="btn btn-outline-success">Modifier</button>                               
                    </div>     
                </form>
                </div>
            </div>
        </div>
   </div>
@stop

@section('scripts')
   <script>      
        $(function () {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("body").on("click", ".delete", function(e)
            {
                e.preventDefault();
                var formation_id = $(this).data('id');

                Swal.fire({
                    title: 'Êtes-vous sûr ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ff9f43',
                    cancelButtonColor: '#ef4d56',
                    confirmButtonText: 'Oui, supprimer !',
                    cancelButtonText: 'Retour'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        const url = `<?php echo route("formations.destroy", false); ?>/${formation_id}`;
                        var data = {
                            "id": formation_id
                        }
                        $.ajax({
                            type: "DELETE",
                            url: url,
                            data: data,
                            success: function(response) {
                            Swal.fire(
                                'Supprimé!',
                                response.status ,
                                'success'
                            ).then((result) => {
                                window.location.reload();
                            });
                            }
                        })
                    }
                })
            });
      });
      
   </script>
@stop
