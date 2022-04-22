    <!-- Libs JS -->
    <script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
    <script src="{{ asset('dist/libs/jsvectormap/dist/js/jsvectormap.min.js')}}"></script>
    <script src="{{ asset('dist/libs/jsvectormap/dist/maps/world.js')}}"></script>
    <script src="{{ asset('dist/libs/jsvectormap/dist/maps/world-merc.js')}}"></script>
    <!-- Tabler Core -->
    <script src="{{ asset('dist/js/tabler.min.js')}}"></script>
    <script src="{{ asset('dist/js/demo.min.js')}}"></script>
    <script src="//code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>


    <script>
        $('#logout').click(function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: 'logout',
                data: {
                    '_token': "{{csrf_token()}}"
                },
                success: function(response) {
                    window.location.href = '/'
                },
            })
        })
    </script>

    @stack('extra-scripts')
