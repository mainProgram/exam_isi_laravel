@extends('layouts.app')
@section('content')
    <h3 class="text-center my-5">
        Détails du candidat  
        <a href="{{ route("candidats.create") }}">
            <i class="fa fa-plus"></i>
        </a>
    </h3>

    @if(session()->has('success'))
        <div class="alert alert-success mb-2" id="alert">{{ session()->get('success') }}</div>
    @endif

    <table id="myTable" class="table table-hover">
        <thead>
            <tr>
                <th>Prénom (s)</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Âge</th>
                <th>Niveau d'étude</th>
                <th>Sexe</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ ucwords($candidat->prenom) }}</td>
                <td>{{ ucwords($candidat->nom) }}</td>
                <td>{{ ($candidat->email) }}</td>
                <td>{{ ($candidat->age) }}</td>
                <td>{{ ucwords($candidat->niveau_etude) }}</td>
                <td>{{ ucwords($candidat->sexe) }}</td>
                <td colspan="2">
                    <a href="{{ route('candidats.edit', $candidat->id ) }}">
                        <i class="fa fa-edit mx-2"></i>
                    </a>
                    <a data-id="{{ $candidat->id }}" class="delete" role="button">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="my-3 mx-2">
        <h6>Formation (s)</h6>
        <ol>
            @foreach ($candidat->formations as $formation)
                <li>{{ ucwords($formation->nom) }}</li>
            @endforeach
        </ol>
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
                var candidat_id = $(this).data('id');

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
                        const url = `<?php echo route("candidats.destroy", false); ?>/${candidat_id}`;
                        var data = {
                            "id": candidat_id
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
