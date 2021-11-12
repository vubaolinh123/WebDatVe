<div>
    <form wire:submit.prevent="registUser" action="#">
        <h1>Tạo mới tài khoản</h1>
        <div class="social-container">
            <a href="#" class="social"><i class="bi bi-github"></i></i></a>
            <a href="#" class="social"><i class="bi bi-google"></i></i></a>
            {{-- <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a> --}}
        </div>
        <span>Tạo mới tài khoản thủ công</span>
        <input class="form-control "  type="text" name="name" placeholder="Họ và tên " />
        <input class="form-control "  type="email" name="email" placeholder="Email" />
        <input class="form-control "  type="password" name="password" placeholder="Mật khẩu" />
        <input  class="form-control " type="password" name="confirmPassword" placeholder="Nhập lại mật khẩu" />
        <button>Đăng ký</button>
    </form>
</div>
