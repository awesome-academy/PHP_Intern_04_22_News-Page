<script src="{{ asset('bower_components/light-bootstrap-dashboard/assets/js/core/jquery.3.2.1.min.js') }}"
type="text/javascript"></script>
<script src="{{ asset('bower_components/light-bootstrap-dashboard/assets/js/core/popper.min.js') }}"
type="text/javascript"></script>
<script src="{{ asset('bower_components/light-bootstrap-dashboard/assets/js/core/bootstrap.min.js') }}"
type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('bower_components/light-bootstrap-dashboard/assets/js/plugins/bootstrap-switch.js') }}">
</script>
<!--  Chartist Plugin  -->
<script src="{{ asset('bower_components/light-bootstrap-dashboard/assets/js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('bower_components/light-bootstrap-dashboard/assets/js/plugins/bootstrap-notify.js') }}">
</script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script
src="{{ asset('bower_components/light-bootstrap-dashboard/assets/js/light-bootstrap-dashboard.js?v=2.0.0') }} "
type="text/javascript"></script>
<script>
    window.translations = {!! $translation !!}
    window.user = {{ Auth::id() }};
</script>
<script src="{{ asset('js/notification.js') }}"></script>
