@csrf
<div class="inputLabel">
    <label
        title="If you trust our services you could place your tickets on remote servers. Otherwise ticket will be created only on your current device">Ticket
        place</label>
    @php
        $selectedLocal = $selectedRemote = $ticketName = $ticketTimer = $ticketDescription = '';
        if (isset($ticket)) {
            $selectedLocal = $ticket->ticket_type == 0 ? 'selected' : '';
            $selectedRemote = $ticket->ticket_type == 1 ? 'selected' : '';
            $ticketName = $ticket->ticket_name;
            $ticketTimer = $ticket->timer;
            $ticketDescription = $ticket->description;
        } else {
            $ticket = false;
        }
    @endphp
    <select name="ticket_type">
        <option></option>
        <option {{ $selectedLocal }} value="0">Local</option>
        <option {{ $selectedRemote }} value="1">Remote</option>
    </select>
</div>
<div class="inputLabel">
    <label>Ticket name</label>
    <input name="ticket_name" autocomplete="off" value="{{ $ticketName }}">
</div>
<div class="inputLabel">
    <label>Execution time</label>
    <input name="timer" class="datetimepicker" autocomplete="off"
           value="{{ $ticketTimer ? Carbon\Carbon::createFromFormat('U', $ticketTimer)->format('Y/m/d H:i:s') : '' }}">
</div>
<div class="inputLabel">
    <label>Ticket description</label>
    <textarea rows="4" name="description">{{ $ticketDescription }}</textarea>
</div>

<div class="inputLabel transparent">
    <button type="submit" class="btn btn-primary">{{ $ticket ? 'Save' : 'Create' }}</button>
</div>

@if (isset($errors) && count($errors))
    <ul class="error-list">
        @foreach($errors->all() as $error)
            <li>{{ $error }} </li>
        @endforeach
    </ul>

@endif
