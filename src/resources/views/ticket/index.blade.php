@extends('layouts.app')

@section('content')
    <div class="ticketWrapper">
        @foreach($ticketList as $ticket)
            <div class="ticket">
                <div class="row">
                    <div class="ticketName col-md-6">
                        {{ $ticket->ticket_name }}
                    </div>
                    <div class="col-md-6" id="timer">
                        {{ secToStr($ticket->timer - $currentTime) }} осталось
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('script')
    <script>
        window.onload = () => {
            $(document)
                .on('click', '.ticket', function() {
                    $(this).closest('.ticketWrapper').find('.ticket').removeClass('hovered')
                    $(this).addClass('hovered')
                });
        }
    </script>
@endsection
