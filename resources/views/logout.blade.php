<p>Ну тут кароче вся инфа там о пользователе все дела и кнопка для выхода</p>

<form action="{{ route('logout') }}" method="post">
    @csrf
    <input type="submit" value="Выйти из аккаунта!">
</form>