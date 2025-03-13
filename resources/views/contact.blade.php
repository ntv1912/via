@if (session('success'))
    <h1>Thông tin liên hệ</h1>
    <p>Tên : {{ session('name') }}</p>
    <p>Email : {{  session('email')}}</p>

@endif
<h1>Form Liên Hệ</h1>
<form action="{{ route('contact-submit') }}" method="POST">
    @csrf
    <label for="name">Họ và Tên:</label>
    <input type="text" id="name" name="name" required>
    <br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br><br>

    <button type="submit">Gửi</button>
</form>
