<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {!! $mess !!}

    <img src="{{ route('emailTracking', ['id' => $id]) }}" alt="" width="1" height="1" style="display:none;">

<div style="justify-content: center; display: flex; width: 100%">
    <p>Do you want to <a href="{{ route('UnsubscribeView') }}?id={{ $id }}">Unsubscribe</a> to this email?</p>

</div>
</body>
</html>