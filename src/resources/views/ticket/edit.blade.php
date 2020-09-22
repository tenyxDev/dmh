@extends('layouts.app')

@section('content')
    <div class="taskForm">
        <span class="pageLegend">Edit ticket</span>
        <form method="post" action="{{ route('tickets.update', ['ticket' => $ticket->id])}}">
            {{ method_field('PATCH') }}
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
                    if ($(this).hasClass('collapsed')) {
                        $('.py-1').css('top', 'auto')
                    } else {
                        $('.py-1').css('top', '6%')
                    }
                });
        }
    </script>
@endsection
