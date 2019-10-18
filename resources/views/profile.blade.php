@extends('layouts.app')

@section('content')
    <h1 class="profile-title">Update profile</h1>
    @foreach($user as $item)
        <input type="text" value="{{$item->firstname}}" id="firstname">
        <input type="text" value="{{$item->lastname}}" id="lastname">
        <input type="date" value="{{$item->dateofbirth}}" id="dateofbirth">
        <input type="email" value="{{$item->email}}" id="email">
        <button id="{{$item->id}}" class="update">Update</button>
    @endforeach
    <div class="error"></div>
    <a href="/home" class="profile">< Dashboard</a>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $(document).on("click", ".update" , function() {
            var edit_id = $(this).attr('id');
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var dateofbirth = $('#dateofbirth').val();
            var email = $('#email').val();
            if (firstname != '' && lastname != '' && dateofbirth != '' && email != '') {
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '/updateUser',
                    type: 'POST',
                    data: {firstname: firstname, lastname: lastname, dateofbirth: dateofbirth, email: email, editid: edit_id},
                    success: function (response) {
                        $('.error').html('Profile updated');
                    },
                    error: function(error) {
                        $('.error').html(error.responseText);
                    }
                });
            } else {
                $('.error').html('Fill all fields');
            }
        });
    });
</script>