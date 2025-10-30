<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <div class="form-group">
        <label><strong>Электронная почта</strong></label>
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        @error('email')
            <small class="d-block text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block">Отправить ссылку</button>
    </div>
</form>
