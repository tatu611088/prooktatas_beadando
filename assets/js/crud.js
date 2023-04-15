$(document).ready(function(){
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function(){
        if(this.checked){
            checkbox.each(function(){
                this.checked = true;
            });
        } else{
            checkbox.each(function(){
                this.checked = false;
            });
        }
    });
    checkbox.click(function(){
        if(!this.checked){
            $("#selectAll").prop("checked", false);
        }
    });



    $('.edit').on('click', function() {
        var id = $(this).data('id');

        $.ajax({
            url: 'getEditModalFill.php',
            type: 'POST',
            data: {id: id},
            success: function(response) {
                var data = JSON.parse(response);

                $('input[name=name]').val(data.name);
                $('input[name=price]').val(data.price);
                $('textarea[name=contains]').val(data.contains);
                $('#type').val(data.type).prop('selected', true);
                $('.submit').attr('data-id', id);

            },
            error: function(response) {

            }
        });
    });

    $('.editmenu .submit').on('click', function() {

    });



});

