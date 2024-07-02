<!DOCTYPE html>
<html lang="en">
<head>
   @include('admin.components.header', ['title'=> 'Unsubscribe to us?'])
</head>
<body>
    @include('admin.components.loading')
    <div  style="background-color: #222222; width: 100vw; height: 100vh; display: grid; place-items: center">
        <div id="unsubButton" style="height: 40vh; justify-content:center; text-align:center; display: flex; flex-direction: column; gap: 10px">
            <img style="height: 40%" src="{{ asset('assets/images/unsubscribe.svg') }}" alt="Unsubscibe">
            <p class="lead">Are you sure? Can you please reconsider our offer?</p>
            <button onclick="Unsub('{{ route('Unsub') }}')" class="btn btn-info">Unsubscibe</button>
        </div>

        <div id="farewell" style="display: none; justify-content:center; align-items:center; width: 100vw; height: 100vh; flex-direction: column">
            <div class="tenor-gif-embed" data-postid="18564706" data-share-method="host" data-aspect-ratio="1" data-width="30%"><a href="https://tenor.com/view/tonton-tonton-friends-chubby-bunny-tonton-tobi-gif-18564706">Tonton Tonton Friends Sticker</a>from <a href="https://tenor.com/search/tonton-stickers">Tonton Stickers</a></div> <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
            <p class="lead">Farewell</p>
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