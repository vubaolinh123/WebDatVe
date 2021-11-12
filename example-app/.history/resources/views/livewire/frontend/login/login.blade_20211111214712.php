<div>

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
                <button>Sign Up</button>
            </form>

</div>
