<script type="text/javascript">
  Pusher.logToConsole = true;

  var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
    cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
    encrypted: true
  });

  var channel = pusher.subscribe('dashboard-updated');
  channel.bind('App\\Events\\DashboardUpdated', function(response) {
    alert(response.data);
  });
</script>
