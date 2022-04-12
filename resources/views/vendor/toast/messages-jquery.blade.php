@if(Session::has('toasts'))
    <link rel="stylesheet" href="{{asset('assets/css/iziToast.min.css')}}">
    <script src="{{asset('assets/js/iziToast.min.js')}}"></script>

    <script type="text/javascript">

        setTimeout(function () {
            @foreach(Session::get('toasts') as $toast)
            iziToast{{ '.'.$toast['level'] }}({
                title: '{{ $toast['title'] }}',
                message: '{{ $toast['message'] }}',
                position: 'topRight',
            });
            @endforeach
        }, 1);

    </script>
@endif