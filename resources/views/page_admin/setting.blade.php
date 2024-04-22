<form action="{{ route('push.update') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form group">
        <label for="">Pusher App Id</label>
        <input type=text name="pusher_app_id">
    </div>
    <div class="form group">
        <label for="">Pusher Key</label>
        <input type=text name="pusher_key">
    </div>

    <div class="form group">
        <label for="">Pusher secrete</label>
        <input type=text name="pusher_secret">
    </div>

    <div class="form group">
        <label for="">Pusher cluster</label>
        <input type=text name="pusher_cluster">
    </div>
    <button type=submit>Enviar</button>
</form>
