<div>
    <h2 style="background-color: #fff ; padding:20px ; border-radius:10px">Đăng nhập với chúng tôi ❤️ </h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form wire:submit.prevent="registUser" action="#">
                <h1>Tạo mới tài khoản</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="bi bi-github"></i></i></a>
                    <a href="#" class="social"><i class="bi bi-google"></i></i></a>
                    {{-- <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a> --}}
                </div>
                <span>Tạo mới tài khoản thủ công</span>
                <input type="text" placeholder="Họ và tên " />
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Mật khẩu" />
                <button>Đăng ký</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form  action="#">
                <h1>Đăng nhập</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="bi bi-github"></i></i></a>
                    <a href="#" class="social"><i class="bi bi-google"></i></i></a>
                </div>
                <span>Đăng nhập thủ công</span>
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Mật khẩu" />
                <a href="#">Bạn quên mật khẩu?</a>
                <button>Đăng nhập</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Chào mừng trở lại!</h1>
                    <p>Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                    <button class="ghost" id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Chào bạn!</h1>
                    <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
                    <button class="ghost" id="signUp">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
</div>
