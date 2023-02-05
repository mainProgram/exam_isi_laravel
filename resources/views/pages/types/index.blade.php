@extends('layouts.app')
@section('content')
   <h3 class="text-center my-5">
      Liste des types 
      <a href="{{ route("types.create") }}">
         <i class="fa fa-plus"></i>
      </a>
   </h3>

   @if(session()->has('success'))
      <div class="alert alert-success mb-2" id="alert">{{ session()->get('success') }}</div>
   @endif

   @if(count($types) > 0)
      <table id="myTable" class="table table-hover">
         
         <thead>
            <tr>
               <th>Libellé</th>
               <th>Actions</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($types as $type)
               <tr>
                  <td>{{ ucwords($type->libelle) }}</td>
                  <td colspan="2">
                     <a class="edit" data-id="{{ $type->id }}" type="button">
                        <i class="fa fa-edit mx-2"></i>
                     </a>
                     <a data-id="{{ $type->id }}" class="delete">
                        <i class="fas fa-trash"></i>
                     </a>
                  </td>
               </tr>
         @endforeach
         </tbody>
      </table>
      <div class="mt-3 d-flex justify-content-end">{{ $types->links() }}</div>
   @else
      <h3 class="text-danger my-5">Pas de type !</h3>
   @endif

   <!-- Modal -->
   <div class="modal fade" id="ajoutType" tabindex="-1" aria-labelledby="modificationType" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="modificationType">Modification</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
               <form action="" method="POST" id="editForm">
                  @csrf
                  @method("put")
                  <div class="form-group mb-3">
                     <label>{{ __('Libellé') }}:</label>
                     <input type="text" name="libelle" class="form-control" value="" required id="libelleModif">
                  </div>
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

         $('body').on('click', '.edit', function () {
            var type_id = $(this).data('id');
            const url = `<?php echo route("types.update", false); ?>/${type_id}`;
            $("#editForm").attr('action', url);
            $.get("types" +'/' + type_id +'/edit', function (data) {
               $("#ajoutType").modal("show");
               $('#libelleModif').val(data.libelle);
            })
         });

         $("body").on("click", ".delete", function(e)
         {
            e.preventDefault();
            var type_id = $(this).data('id');

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
                     const url = `<?php echo route("types.destroy", false); ?>/${type_id}`;
                    var data = {
                        "id": type_id
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
