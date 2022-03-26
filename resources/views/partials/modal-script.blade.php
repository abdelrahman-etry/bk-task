<script>
    $(document).on('click','.delete-entity',function() {
        var entityId    =   $(this).attr('id');
        var entityTable =   $(this).data('table');
        var entityRoute =   $(this).data('route');
        var entity      =   $('#entity_'+entityId).text();
        var header      =   "Delete "+entity;
        var body        =   "Are you sure you want to delete "+entity+" from list?";
        var deleteBtn   =   "Delete "+entity;
        var footer      =   '<button class="btn waves-effect waves-light btn btn-outline-primary" data-dismiss="modal">No</button>';
        footer          +=  '<button class="btn waves-effect waves-light btn btn-outline-danger confirmDelete" id="confirmDelete" data-dismiss="modal">'+deleteBtn+'</button>'
        var success     =   entity+" Deleted Successfully.";
        var fail        =   "Unable To Delete "+entity;

        $('#deleteModalHeader').html(header);
        $('#deleteModalBody').html(body);
        $('#deleteModalFooter').html(footer);
        

        $('#confirmDelete').click(function () {
            $.ajax({
                type:"POST",
                url: entityRoute,
                data:{"_token": $("meta[name='_token']").attr("content"), id:entityId},
                success:function(response){
                    if(response === '1'){
                        $('#'+entityTable).DataTable().ajax.reload();
                        $('#deleteModal').modal('toggle');
                    }else{
                        $('#'+entityTable).DataTable().ajax.reload();
                        $('#deleteModal').modal('toggle');
                    }
                }
            });
        });
    });
</script>