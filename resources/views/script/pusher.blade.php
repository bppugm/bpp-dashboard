<script type="text/javascript">
  Pusher.logToConsole = true;

  var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
    cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
    encrypted: true
  });

  function updateData(data) {
      $('#'+data.name).html(data.value)
      $('#'+data.name+"_date").html('<i class="fa fa-cloud-upload-alt fa-fw"></i> '+data.formatted_updated_at);
  }

  var channel = pusher.subscribe('dashboard-updated');
  channel.bind('App\\Events\\DashboardUpdated', function(response) {
    updateData(response.data);
  });
</script>
