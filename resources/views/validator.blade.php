<script>
    @if(count($errors))
        alert("@foreach($errors->all() as $error) {{ $error }}\n  @endforeach");
    @endif
</script>
