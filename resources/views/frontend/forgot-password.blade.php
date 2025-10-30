<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <input type="email" name="email" placeholder="Введите ваш email" required>
    <button type="submit">Отправить ссылку</button>
</form>
