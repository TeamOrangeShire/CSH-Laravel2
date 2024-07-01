<!DOCTYPE html>
<html lang="en">
<head>
   @include('admin.components.header', ['title'=> 'Unsubscribe to us?'])
</head>
<body>
    <div  style="background-color: #222222; width: 100vw; height: 100vh; display: grid; place-items: center">
        <div style="height: 40vh; justify-content:center; text-align:center; display: flex; flex-direction: column; gap: 10px">
            <img style="height: 40%" src="{{ asset('assets/images/unsubscribe.svg') }}" alt="Unsubscibe">
            <p class="lead">Are you sure? Can you please reconsider our offer?</p>
            <button onclick="Unsub('{{ route('Unsub') }}')" class="btn btn-info">Unsubscibe</button>
        </div>
    </div>

    <form method="POST" id="unsubForm">
        @csrf
        <input type="hidden" name="lead_id" value="{{ $lead_id }}">
    </form>
    @include('admin.components.scripts')
   <script src="{{ asset('backend/unsub.js') }}"></script>
</body>
</html>