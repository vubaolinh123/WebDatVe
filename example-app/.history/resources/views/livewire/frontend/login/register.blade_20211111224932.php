<div>
    @if ($flag)
        @if ($successCode)
            <p class="alert alert-success">Bạn đã tạo tài khoản thành công đăng nhập ngay thôi </p>

        @else
            <form style="height: 100%;" wire:submit.prevent="ruleCode" action="#">
                <h1>Tạo mới tài khoản</h1>
                <input wire:model="code"
                    class="form-control  @error('code')
                                                            {{ 'is-invalid' }}
                                                        @enderror"
                    type="text" name="code" placeholder="Code 6 ký tự " />
                <button class="btn btn-outline-warning" wire:click.prevent wire:poll.1000ms="timeHCode">{{ $time -> diffInSeconds() }}</button>
                <x-error field="code" class="text-danger" />
                <button>Xác nhận code</button>
                <x-error field="errorLogin" class="text-danger" />
            </form>
        @endif
    @else
        <form wire:submit.prevent="registUser" action="#">
            <h1>Tạo mới tài khoản</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="bi bi-github"></i></i></a>
                <a href="#" class="social"><i class="bi bi-google"></i></i></a>
                {{-- <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a> --}}
            </div>
            <span>Tạo mới tài khoản thủ công</span>
            <input wire:model="name"
                class="form-control  @error('name')
            {{ 'is-invalid' }}
        @enderror" type="text"
                name="name" placeholder="Họ và tên " />
            <x-error field="name" class="text-danger" />
            <input wire:model="email"
                class="form-control @error('email')
            {{ 'is-invalid' }}
        @enderror" type="email"
                name="email" placeholder="Email" />
            <x-error field="email" class="text-danger" />
            <input wire:model="password"
                class="form-control @error('password')
            {{ 'is-invalid' }}
        @enderror"
                type="password" name="password" placeholder="Mật khẩu" />
            <x-error field="password" class="text-danger" />
            <input wire:model="confirmPassword"
                class="form-control @error('confirmPassword')
            {{ 'is-invalid' }}
        @enderror"
                type="password" name="confirmPassword" placeholder="Nhập lại mật khẩu" />
            <x-error field="confirmPassword" class="text-danger" />
            <button wire:loading.remove >Đăng ký</button>
            <button wire:loading wire:target="registUser" wire:click.prevent >Đang xử lý ...</button>
        </form>
    @endif
</div>
