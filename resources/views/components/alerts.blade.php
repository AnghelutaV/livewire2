<!-- Display validation error messages -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Display success messages -->
@if (session('success'))
    <div class="alert alert-success">
        @php
            $successMessages = session('success');
        @endphp

        @if (is_array($successMessages))
            @if (count($successMessages) > 1)
                <ul>
                    @foreach ($successMessages as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @else
                {{ $successMessages[0] }}
            @endif
        @else
            {{ $successMessages }}
        @endif
    </div>
@endif

<!-- Display error messages -->
@if (session('error'))
    <div class="alert alert-danger">
        @php
            $errorMessages = session('error');
        @endphp

        @if (is_array($errorMessages))
            @if (count($errorMessages) > 1)
                <ul>
                    @foreach ($errorMessages as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @else
                {{ $errorMessages[0] }}
            @endif
        @else
            {{ $errorMessages }}
        @endif
    </div>
@endif

<!-- Display status messages -->
@if (session('status'))
    <div class="alert alert-info">
        @php
            $statusMessage = session('status');
        @endphp

        @if (is_array($statusMessage))
            @if (count($statusMessage) > 1)
                <ul>
                    @foreach ($statusMessage as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @else
                {{ $statusMessage[0] }}
            @endif
        @else
            {{ $statusMessage }}
        @endif
    </div>
@endif
