<script>
  window.config = {
    pusherAppKey: '{{ config('broadcasting.connections.pusher.key') }}',
    pusherAppCluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}',
  }
</script>