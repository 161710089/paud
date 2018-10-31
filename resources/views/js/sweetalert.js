<script type="text/javascript">
    $('button.confirm').on('click', function(e){
        e.preventDefault();
        var self = $(this);
        swal({
            title             : "Are you sure?",
            text              : "Please confirm you would like to do this.",
            type              : "warning",
            showCancelButton  : true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText : "Yes",
            cancelButtonText  : "No, Cancel",
            closeOnConfirm    : false,
            closeOnCancel     : false
        },
        function(isConfirm){
            if(isConfirm){
                swal("Success!","Action completed.", "success");
                self.parents(".confirm").submit();
            }
            else{
                swal("Cancelled","Action cancelled.", "error");
            }
        });
    });
</script>