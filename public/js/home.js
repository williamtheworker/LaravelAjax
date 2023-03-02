$(document).ready(function() {
    // This is a test
    // I'll be adding my own comments
    const base_url = window.location.origin;

    get_providers();
    
    function get_providers() {
        $.ajax({
            type: 'GET',
            url: base_url + '/api/get_providers',
            success: function(result){
                let providers = result;

                providers.forEach((provider) => {
                    $('#providers-table-body').append(`
                        <tr>
                            <td>${provider.name}</td>
                            <td>${provider.url}</td>
                            <td>${provider.created_at}</td>
                            <td>
                                <button type="button" class="btn btn-primary activate_button" value="${provider.id}">Activate</button>
                                <button type="button" class="btn btn-warning edit_button" value="${provider.id}">Edit</button>
                                <button type="button" class="btn btn-danger delete_button" value="${provider.id}">Delete</button>
                            </td>
                        </tr>
                    `);
                });
            }
        });
    }

    function refresh_table () {
        $('#providers-table-body').empty();
        get_providers();
    }

    $(".add-provider-modal").click(() => {
        $('.crud-modal-title').html('Add Provider');
        $('.input-name').val('');
        $('.input-url').val('');
        $('.crud-modal-footer').html(`
            <button type="button" class="btn btn-success" id="add-provider">Add</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        `);
    });

    $('.crud-modal-footer').on('click', "#add-provider", () => {
        if($('.input-name').val() == '' || $('.input-url').val() == '') {
            alert('Please fill-up the empty fields');
            return false;
        } else {
            $.ajax({
                type: 'POST',
                url: base_url + '/api/add_provider',
                data:{
                    'name': $('.input-name').val(),
                    'url': $('.input-url').val()
                },
                success: function(result){
                    let data = JSON.parse(result);

                    if(data.status == 'success') {
                        refresh_table();
                        $('#myModal').modal('hide');
                    }
                }
            });
        }
    });

    $('#providers-table-body').on('click', 'tr td .activate_button', () => {
        let prov_id = $(this)[0].activeElement.value;

        $.ajax({
            type: 'POST',
            url: base_url + '/api/activate_provider',
            data:{
                'id': prov_id
            },
            success: function(result){
                let data = JSON.parse(result);

                if(data.status == 'success') {
                    $('.img-modal-body').html(`
                        <img src="${data.message}" alt="Provider Image">
                    `);
                    $('#imgModal').modal('toggle');
                } else {
                    alert('Something went wrong with the URL provided');
                }
            }
        });
    });

    $('#providers-table-body').on('click', 'tr td .edit_button', () => {
        let prov_id = $(this)[0].activeElement.value;

        $.ajax({
            type: 'Get',
            url: base_url + '/api/get_provider',
            data:{
                'id': prov_id,
            },
            success: function(result){
                $('.input-name').val(result.name);
                $('.input-url').val(result.url);
            }
        });

        $('.crud-modal-title').html('Edit Provider');
        $('.input-prov-id').val(prov_id);
        
        
        $('#myModal').modal('toggle');
        $('.crud-modal-footer').html(`
            <button type="button" class="btn btn-success" id="save-provider">Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        `);
    });

    $('.crud-modal-footer').on('click', '#save-provider', () => {
        if($('.input-name').val() == '' || $('.input-url').val() == '') {
            alert('Please fill-up the empty fields');
            return false;
        } else {
            $.ajax({
                type: 'POST',
                url: base_url + '/api/edit_provider',
                data:{
                    'id': $('.input-prov-id').val(),
                    'name': $('.input-name').val(),
                    'url': $('.input-url').val()
                },
                success: function(result){
                    let data = JSON.parse(result);

                    if(data.status == 'success') {
                        refresh_table();
                        $('#myModal').modal('hide');
                    }
                }
            });
        }
    })

    $('#providers-table-body').on('click', 'tr td .delete_button', () => {
        let prov_id = $(this)[0].activeElement.value;

        if (confirm('Are you sure you want to delete this provider?')) {
            $.ajax({
                type: 'POST',
                url: base_url + '/api/delete_provider',
                data:{
                    'id': prov_id,
                },
                success: function(result){
                    let data = JSON.parse(result);

                    if(data.status == 'success') {
                        refresh_table();
                    }
                }
            });
        }
    });
});