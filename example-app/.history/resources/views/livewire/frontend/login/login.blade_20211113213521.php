<div>
    {{-- <form  action="#">
        <h1>Đăng nhập</h1>
        <div class="social-container">
            <a href="{{ URL::to('loginToGithub') }}" class="social"><i class="bi bi-github"></i></i></a>
            <a href="{{ URL::to('loginToGoogle')  }}" class="social"><i class="bi bi-google"></i></i></a>
        </div>
        <span>Đăng nhập thủ công</span>
        <input class="form-control" type="email" placeholder="Email" />
        <input class="form-control" type="password" placeholder="Mật khẩu" />
        <a href="#">Bạn quên mật khẩu?</a>
        <button>Đăng nhập</button>
    </form> --}}
    @if ($errorLoginVeri)
        @if ($successCode)
                    <p class="text-center alert" >Mật khẩu mới của bạn là :  <span class="alert alert-success">{{  $passNew  }}</span> </p>
                    <button wire:click.prevent="backLogin" class=" text-center btn btn-primary">Quay về đăng nhập </button>
        @else
                        <p class="alert alert-warning text-center">Lấy lại mật khẩu</p>
                        <form method="post" wire:submit.prevent="checkCode"  >
                            <input wire:model="code"  class="form-control " type="text"
                                placeholder="Nhập mã mật khẩu" name="code">
                            <x-error field="code" class="alert alert-danger" />
                            @if ($flag)
                            <button type="button" class="btn btn-outline-warning"  wire:poll.1000ms="timeHCode">
                                {{ $time -> diffInSeconds() }}
                            </button>
                            @else
                                <button wire:loading.remove wire:click.prevent="clickSendCode" type="button" class="btn m-3 btn-danger">Send Code</button>
                                <button wire:loading.remove wire:loading wire:target="clickSendCode" class="btn m-3 btn-danger">Đang gửi mã ...</button>
                            @endif
                            <input class="btn btn-outline-primary btn-login" type="submit" value="Xác minh code">
                            <x-error field="errorLogin" class="alert alert-warning" />
                        </form>
        @endif
    @else
        @if ($resetPass)

            <form wire:submit.prevent="forgotPassword"  action="#">
                <h1>Bạn quên mật khẩu ?</h1>
                <div class="social-container">
                    <a href="{{ URL::to('loginToGithub') }}" class="social"><i class="bi bi-github"></i></i></a>
                    <a href="{{ URL::to('loginToGoogle')  }}" class="social"><i class="bi bi-google"></i></i></a>
                </div>
                <span>Quên mật khẩu</span>
                <input wire:model="email"  class="form-control @error('email')
                    {{ 'is-invalid' }}
                @enderror" type="text"
                    placeholder="Email" name="email">
                <x-error field="email" class="text-danger" />
                <a wire:click.prevent="backLogin" href="#">Bạn nhớ lại mật khẩu có thể đăng nhập</a>
                <button>Lấy lại mật khẩu</button>
                <x-error field="errorLogin" class="alert alert-warning" />
            </form>

        @else

            <form wire:submit.prevent="loginAdmin"  action="#">
                <h1>Đăng nhập</h1>


                <div class="social-container">
                    <a href="{{ URL::to('loginToGithub') }}" class="social"><i class="bi bi-github"></i></i></a>
                    <a href="{{ URL::to('loginToGoogle')  }}" class="social"><i class="bi bi-google"></i></i></a>
                </div>
                <span>Đăng nhập thủ công</span>
                <input wire:model="email"  class="form-control @error('email')
                    {{ 'is-invalid' }}
                @enderror" type="text"
                    placeholder="Email" name="email">
                <x-error field="email" class="text-danger" />
                <input wire:model="password"   class="form-control @error('password')
                    {{ 'is-invalid' }}
                @enderror" type="password"
                    placeholder="Password" name="password">
                <x-error field="password" class="text-danger" />
                {{-- <div style="float:right">
                    <label for="">Nhớ tài khoản</label>
                    <input type="checkbox" class="checkbox">
                </div> --}}
                {{-- {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!} --}}
                <a wire:click.prevent="resetPassword" href="#">Bạn quên mật khẩu?</a>
                <button class="btn btn-striped-shadow btn-striped-shadow--black"><span> Đăng nhập</span></button>
                <x-error field="errorLogin" class="alert alert-warning" />
            </form>

        @endif
    @endif

</div>
