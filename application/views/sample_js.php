<script language="javascript" type="text/javascript">

    $(document).on("click", ".trash_btn", function (e){
        var file_id=$(this).attr('data-id');
        var file_name=$(this).attr('data-name');
        // alert(file_id)
        // $(this).parent().remove();
        $.ajax({
            method: "post",
            dataType: "json",
            data:{
                file_id:file_id,
                file_name:file_name
            },
            url: "<?php echo base_url(); ?>a-delete-file",
            success: function(response) {
                if (response.status == "success") {
                    console.log("response",response)
                    if(response.status === 'success' && response.data === 0){
                        alert('deleted Success fully');
                    }
                }
            }
        });
    });

    $(document).on('keyup', '.search_file', function() {
        
    });

    jQuery(document).ready(function ()
    {
        var direcotry_path = $('#directory_folder_path_text').text()
        $('.fileUp').fileupload();
    // $(".upload_btn").dropzone({ url: 'assets/assets/img/portfolio/' });

    });
</script>