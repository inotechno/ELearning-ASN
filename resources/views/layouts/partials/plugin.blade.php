{{-- @vite('resources/js/app.js') --}}

@livewireScripts

<script src="{{asset('libs/jquery/jquery.min.js') }}"></script>
<script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{asset('libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{asset('libs/node-waves/waves.min.js') }}"></script>

@stack('plugin')
<!-- App js -->
<script src="{{asset('js/app.js') }}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />
