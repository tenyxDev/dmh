@extends('layouts.app')

@section('content')
    <div class="taskForm">
        <span class="pageLegend">Create ticket</span>
        <form method="POST" action="{{ route('tickets.store')}}">
            @include('ticket.form')
        </form>
    </div>
@endsection

@section('script')
    <script>
        window.onload = () => {
            $(document)
                .ready(function () {
                    $('.error-list').fadeOut(6000);
                })
                .on('click', '.navbar-toggler', function () {
                    if($(this).hasClass('collapsed')){
                        $('.py-1').css('top', 'auto')
                    } else {
                        $('.py-1').css('top', '6%')
                    }
                });
        }
    </script>
@endsection
