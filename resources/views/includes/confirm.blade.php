<script type="text/javascript">
$('.delete-btn').on('click', function(e){
    e.preventDefault();
    var self = $(this);
    var namadosen = $(this).attr("data-nama");
    var formid = $(this).attr("data-formid");
    swal({
        title: "DELETE",
        text: "Erase Lecturer Data : "+namadosen+" ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#D9534f",
        confirmButtonText: "Yes, delete!",
        closeOnConfirm: true
    },
    function(){
        $("#"+formid).submit();
    });
});
</script>
