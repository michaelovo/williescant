$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#change_password_form').on('submit', (event)=>{
        event.preventDefault();

        current_password = $('[name="current_password"]').val();
        new_password = $('[name="new_password"]').val();
        new_password_confirmation = $('[name="new_password_confirmation"]').val();

        $.ajax({
            url: '/williescant/profile/update-password',
            type: 'POST',
            data: {
                'current_password': current_password,
                'new_password': new_password,
                'new_password_confirmation': new_password_confirmation
            }
        }).done((data)=>{
            console.log(data);

        }).fail((data)=>{
            console.log(data)
            errors = data.responseText.errors
            console.log(data.responseText);
        })


    })
});
