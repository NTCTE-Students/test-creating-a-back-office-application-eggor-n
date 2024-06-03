<p>Авторизация:</p>
@auth
    <p>ВЫ АВТОРИЗОВАНЫ!</p>
    <button><a href="/logout">Кабинет</a></button>
@endauth
@guest
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="control-group">
        <div class="form-floating controls mb-3"><input class="form-control" type="email" name="user[email]" required="" placeholder="Email Address"><label class="form-label">Email Address</label><small class="form-text text-danger help-block"></small></div>
    </div>
    <div class="control-group">
        <div class="form-floating controls mb-3"><input class="form-control" type="password" name="user[password]" required="" placeholder="Password"><label class="form-label">Password</label><small class="form-text text-danger help-block"></small></div>
    </div>
    <div id="success"></div>
    <div class="mb-3"><button class="btn btn-primary" id="sendMessageButton" type="submit">Send</button></div>
</form>    
@endguest
