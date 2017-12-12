<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laraflat') }} | @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if(getDir() == 'rtl')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
    @endif
    {{ Html::style('css/sweetalert.css') }}
    {{ Html::Style('website/css/custom.css') }}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @stack('css')
</head>
<body>
    <div id="app">
        @include(layoutMenu('website'))
        @include(layoutPushHeader('website'))
        @stack('before')
        @include(layoutContent('website'))
        @stack('after')
        @include(layoutPushFooter('website'))
        @include(layoutFooter('website'))
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    {!! Links::track(true) !!}
    {{ Html::script('js/sweetalert.min.js') }}
    <script type="application/javascript">
        function deleteThisItem(e){
            var link = $(e).data('link');
            swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this Item Again!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    },
                    function(){
                        window.location = link;
                    });
        }
    </script>

    @include('sweet::alert')
    @stack('js')

</body>
</html>
