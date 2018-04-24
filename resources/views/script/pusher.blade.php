<script type="text/javascript">
  Pusher.logToConsole = true;

  var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
    cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
    encrypted: true
  });

  function updateData(index, value) {
      var old = $('#'+index).html();

      if (old != value) {
        $('#'+index).html(value)
      }
  }

  var channel = pusher.subscribe('dashboard-updated');
  channel.bind('App\\Events\\DashboardUpdated', function(response) {
    updateData(response.data.name, response.data.value)
  });
</script>
