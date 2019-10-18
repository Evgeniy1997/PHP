<table class="wrapper-table">
    <tr>
        <th class="table-title"></th>
        <th class="table-title">Firstname</th>
        <th class="table-title">Lastname</th>
        <th class="table-title">Date of birth</th>
        <th class="table-title table-email">E-mail</th>
    </tr>
    @foreach ($users as $index => $user)
    <tr>
        <td class="table-content">{{ $index + 1 }}</td>
        <td class="table-content">{{ $user->firstname }}</td>
        <td class="table-content">{{ $user->lastname }}</td>
        <td class="table-content">{{ $user->dateofbirth }}</td>
        <td class="table-content table-email">{{ $user->email }}</td>
        <td class="table-content">
            <button class="btn-primary delete" id="{{$user->id}}">Delete</button>
        </td>
    </tr>
    @endforeach
    <div class="error"></div>
</table>

<script type="text/javascript">
    $(function() {
        $(document).on('click', '.delete', function(event) {
            event.preventDefault();
            var delete_id = $(this).attr('id');
            var el = this;
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: 'deleteUser/' + delete_id,
                type: 'GET',
                success: function(response){
                    $(el).closest( "tr" ).remove();
                },
                error: function(error) {
                    $('.error').html(error.responseText);
                }
            });
        });

    });
</script>