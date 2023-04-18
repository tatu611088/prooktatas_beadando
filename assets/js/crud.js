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
                $('input[name=img]').val(data.img_url);
                $('textarea[name=contains]').val(data.contains);
                $('#type').val(data.type).prop('selected', true);
                $('.submit').attr('data-id', id);


            },
            error: function(response) {

            }
        });
    });

    $('.editmenu .submit').on('click', function(e) {
        event.preventDefault();

        var id = $(this).data('id');
        var name = $('.editmenu #name').val();
        var price = parseFloat($('.editmenu #price').val());
        var contains = $('.editmenu #contains').val();
        var type = $('.editmenu #type').val();
        var img = $('.editmenu #img').val();
        var data = {id: id, name: name, price: price, contains: contains, type: type, img: img};
        //var data = '?id=' + id + '&name=' + name + '&price=' + price + '&contains=' + contains + '&type=' + type;
        $.ajax({
            url: 'updateEditMenu.php',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(response) {
                location.reload();

            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                // Handle error response

            }
        });

    });

 /*   $('#addEmployeeModal .submit').on('click', function(e) {
        event.preventDefault();


        var name = $('#addEmployeeModal #name').val();
        var price = parseFloat($('#addEmployeeModal #price').val());
        var contains = $('#addEmployeeModal #contains').val();
        var type = $('#addEmployeeModal #type').val();
        var img = $('#addEmployeeModal #img').val();
        var data = {name: name, price: price, contains: contains, type: type, img: img};
        //var data = '?id=' + id + '&name=' + name + '&price=' + price + '&contains=' + contains + '&type=' + type;
        $.ajax({
            url: 'addMenu.php',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(response) {
                location.reload();

            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                // Handle error response

            }
        });

    });*/

    $('a.delete').on('click', function(e) {
        event.preventDefault();
        var id = $(this).data('id');
        var imgurl = $(this).closest("tr").find(".imgurl").text();
        // alert (imgurl);
        $('.modal-footer .confirmdelete').attr('data-id', id);
        $('.modal-footer .confirmdelete').attr('data-url', imgurl);

    });

    $('#deleteEmployeeModal .confirmdelete').on('click', function(e) {
        event.preventDefault();
        var id = $(this).data('id');
        var imgurl = $(this).data('url');

        $.ajax({
            url: 'deleteMenu.php',
            type: 'POST',
            data: {id:id, imgurl:imgurl},
            dataType: 'json',
            success: function(response) {
                 location.reload();
                // console.log(response);

                $(this).closest('tr').remove();
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);

                // Handle error response

            }
        });

    });


    });

