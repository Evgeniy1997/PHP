@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="card-header-title">Dashboard</h2>
                <button id="show" class="btn btn-primary">Show all users</button>
            </div>
            
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @csrf
                    <div class="users"></div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $(document).on('click', '#show', function(event) {
            event.preventDefault();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/get-users',
                dataType : 'json',
                type: 'GET',
                success: function(response) {
                    console.log(response)
                    $('.users').html(response.view);
                },
                error: function(error) {
                    $('.users').html(error.responseText);
                }
            });
        });
    });
</script>
