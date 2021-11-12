<div>
    <form wire:submit.prevent="registUser" action="#">
        <h1>Tạo mới tài khoản</h1>
        <div class="social-container">
            <a href="#" class="social"><i class="bi bi-github"></i></i></a>
            <a href="#" class="social"><i class="bi bi-google"></i></i></a>
            {{-- <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a> --}}
        </div>
        <span>Tạo mới tài khoản thủ công</span>
        <input class="form-control  @error('name')
            {{ 'is-invalid' }}
        @enderror"  type="text" name="name" placeholder="Họ và tên " />
        <x-error field="name" class="alert alert-danger"/>
        <input class="form-control @error('name')
            {{ 'is-invalid' }}
        @enderror"  type="email" name="email" placeholder="Email" />
        <x-error field="email" class="alert alert-danger"/>
        <input class="form-control @error('name')
            {{ 'is-invalid' }}
        @enderror"  type="password" name="password" placeholder="Mật khẩu" />
        <x-error field="password" class="alert alert-danger"/>
        <input  class="form-control @error('name')
            {{ 'is-invalid' }}
        @enderror" type="password" name="confirmPassword" placeholder="Nhập lại mật khẩu" />
        <x-error field="confirmPassword" class="alert alert-danger"/>
        <button>Đăng ký</button>
    </form>
</div>
