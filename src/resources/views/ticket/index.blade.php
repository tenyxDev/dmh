@extends('layouts.app')

@section('content')
    {{--    <div id="space-invader"></div>--}}
    <div class="taskList">
        @if(count($newTicketList))
            <div class="task-container new">
                <div class="box-label new">draft</div>
                @foreach($newTicketList as $ticket)
                    <div class="ticket new">
                        <div class="ticketName">
                            {{ $ticket->ticket_name }}
                        </div>
                        <div class="ticketActions"
                             data-id="{{ $ticket->id }}"
                             data-time-left="{{ $ticket->timer - $currentTime }}">
                            @if(($ticket->timer - $currentTime) < 0)
                                <i class="fas fa-exclamation-triangle"></i>
                            @else
                                <form method="post" action="{{ route('ticket.activate')}}">
                                    @csrf
                                    <input type="hidden" name="ticketId" value="{{ $ticket->id }}">
                                    {{--                                    <input type="submit" class="btn btn-warning" value="START">--}}
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fa fa-play"></i>
                                        <span class="d-none d-sm-inline">START</span>
                                    </button>
                                </form>
                            @endif
                            <div class="delimiter"></div>
                            <a class="btn btn-success"
                               href="{{ route('tickets.edit', ['ticket' => $ticket->id])}}">
                                <i class="fas fa-edit"></i>
                                <span class="d-none d-sm-inline">EDIT</span>
                            </a>
                            <div class="delimiter"></div>
                            <form method="post" action="{{ route('ticket.destroy')}}">
                                @csrf
                                <input type="hidden" name="ticketId" value="{{ $ticket->id }}">
                                {{--                                <input type="submit" class="btn btn-danger" value="DELETE">--}}
                                <button type="submit" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                    <span class="d-none d-sm-inline">DELETE</span>
                                </button>
                            </form>
                            <div class="clearfix"></div>
                            @if(($ticket->timer - $currentTime) < 0)
                                <span>Finish date can't be in the past</span>
                            @else
                                <span>Ticket is ready to start</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        @if(count($activeTicketList))
            <div class="task-container active {{ count($activeTicketList) ?: 'hide' }}">
                <div class="box-label active"><a id="active">activated</a></div>
                @foreach($activeTicketList as $ticket)
                    <div class="ticket active">
                        <div class="ticketName">
                            <span>{{ $ticket->ticket_name }}</span>
                            <div class="clearfix"></div>
                            <div class="ticketTime"
                                 data-id="{{ $ticket->id }}"
                                 data-time-left="{{ $ticket->timer - $currentTime }}">
                                @if(($ticket->timer - $currentTime) < 0)
                                    Active (timer-error)!
                                @else
                                    {{ secToStr($ticket->timer - $currentTime) }}
                                @endif
                            </div>
                        </div>
                        <div class="ticketActions">
                            <form method="post" action="{{ route('ticket.deactivate')}}">
                                @csrf
                                <input type="hidden" name="ticketId" value="{{ $ticket->id }}">
                                {{--                                <input type="submit" class="btn btn-danger" value="STOP">--}}
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-stop hidden-sm-up"></i>
                                    <span class="d-none d-sm-inline">STOP</span>
                                </button>
                            </form>
                            <div class="clearfix"></div>
                            <span>{{ \Carbon\Carbon::createFromFormat('U', $ticket->timer)->format('Y-m-d H:i:s') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        @if(count($pendingTicketList))
            <div class="task-container pending">
                <div class="box-label pending">
                    <div class="meter animate">
                        <span style="width: 100%">pending<span></span></span>
                    </div>
                </div>
                @foreach($pendingTicketList as $ticket)
                    <div class="ticket pending">
                        <div class="ticketName">
                            {{ $ticket->ticket_name }}
                        </div>
                        <div class="ticketTime"
                             data-id="{{ $ticket->id }}"
                             data-time-left="{{ $ticket->timer - $currentTime }}">
                            @if(($ticket->timer - $currentTime) < 0)
                                Pending
                            @else
                                <input type="button" class="btn btn-primary pending" value="PROGRESS BAR">
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        @if(count($completedTicketList))
            <div class="task-container completed">
                <div class="box-label completed">completed</div>
                @foreach($completedTicketList as $ticket)
                    <div class="ticket completed">
                        <div class="ticketName">
                            {{ $ticket->ticket_name }}
                        </div>
                        <div class="ticketTime"
                             data-id="{{ $ticket->id }}">
                            <input type="button" class="btn btn-success" value="COMPLETED">
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        @if(count($failedTicketList))
            <div class="task-container failed">
                <div class="box-label failed">failed</div>
                @foreach($failedTicketList as $ticket)
                    <div class="ticket failed">
                        <div class="ticketName">
                            {{ $ticket->ticket_name }}
                        </div>
                        <div class="ticketTime"
                             data-id="{{ $ticket->id }}">
                            <input type="button" class="btn btn-danger failed" value="RETRY">
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if(!count($newTicketList)
         && !count($activeTicketList)
         && !count($pendingTicketList)
         && !count($completedTicketList)
         && !count($failedTicketList)
        )
            <h1>WELCOME TO DEAD MEN'S HAND</h1>
        @endif

    </div>

    <div class="hud-interface">
        <div class="create-ticket">
            <button type="button" id="addTicket" data-route="{{ route('tickets.create') }}">
                <i class="fal fa-plus-circle"></i>
            </button>
        </div>
    </div>
@endsection

@section('script')
    <script>
        window.onload = () => {
            $(document)
                .ready(function () {
                    setTimeout(function () {
                        let anchor = $('#active').offset();
                        if (anchor) {
                            window.scrollTo({top: anchor.top - 70, behavior: 'smooth'});
                        }
                    }, 55)
                    let ticketList = $('.ticketWrapper').find('.ticket.active')
                    ticketList.each(function (i, e) {
                        let element = $(e).find('.ticketTime')
                        setTicketTimer(element)
                    })
                })
                .on('click', '.ticket', function () {
                    $(this).closest('.ticketWrapper').find('.ticket').removeClass('hovered')
                    $(this).addClass('hovered')
                })
                .on('click', '.navbar-toggler', function () {
                    if ($(this).hasClass('collapsed')) {
                        $('.py-1').css('top', 'auto')
                    } else {
                        $('.py-1').css('top', '6%')
                    }
                })
                .on('click', '#addTicket', function () {
                    window.location = $(this).data('route')
                });
        }

        function setTicketTimer(element) {
            let interval = setInterval(() => {
                if (element.data('time-left') >= 0) {
                    element.text(secToStr(element.data('time-left')))
                } else {
                    timerComplete(interval, element)
                }
                element.data('time-left', element.data('time-left') - 1)
            }, 1000)
        }

        function timerComplete(interval, element) {
            clearInterval(interval);
            console.log(element);
            element.text('Completed')
            // callTack(element.data('id'))
        }

        {{--function callTack(taskId) {--}}
        {{--    console.log(taskId);--}}
        {{--    $.ajax({--}}
        {{--        url: $('.ticketWrapper').data('route'),--}}
        {{--        type: 'POST',--}}
        {{--        data: {"_token": "{{ csrf_token() }}", taskId},--}}
        {{--        error: response => {--}}
        {{--            console.log('error')--}}
        {{--            console.log(response);--}}
        {{--        },--}}
        {{--        success: function (response) {--}}
        {{--            console.log('success')--}}
        {{--            console.log(response);--}}
        {{--        },--}}
        {{--        complete: function (response) {--}}
        {{--        },--}}
        {{--    });--}}
        {{--}--}}

        function num_word(value, words, show = true) {
            let num;
            let out;

            num = value % 100;
            if (num > 19) {
                num = num % 10;
            }

            out = (show) ? value + '' : '';
            switch (num) {
                case 1:
                    out = out + words[0];
                    break;
                case 2:
                case 3:
                case 4:
                    out = out + words[1];
                    break;
                default:
                    out = out + words[2];
                    break;
            }

            return out;
        }

        function secToStr(secs, lang = 'en') {
            let res = '';
            let hours;
            let minutes;
            let dayNames = ['d', 'd', 'd'];
            let hourNames = ['h', 'h', 'h'];
            let minNames = ['m', 'm', 'm'];
            let sekNames = ['s', 's', 's'];
            let postFix = ' left';

            if(lang === 'ru') {
                dayNames = ['день', 'дня', 'дней'];
                hourNames = ['час', 'часа', 'часов'];
                minNames = ['минута', 'минуты', 'минут'];
                sekNames = ['секунда', 'секунды', 'секунд'];
                postFix = ' осталось';
            }

            let days = Math.floor(secs / 86400);
            secs = secs % 86400;
            res = res + num_word(days, dayNames) + ', ';

            hours = Math.floor(secs / 3600);
            secs = secs % 3600;
            res = res + num_word(hours, hourNames) + ', ';

            minutes = Math.floor(secs / 60);
            secs = secs % 60;
            res = res + num_word(minutes, minNames) + ', ';

            res = res + num_word(secs, sekNames);

            return res + postFix;
        }


    </script>
@endsection
