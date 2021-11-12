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
                    <p class="alert alert-warning">Bạn đã nhập sai quá nhiều lần ! Để lấy lại mật khẩu chọn gửi token và XÁC MINH</p>
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
                        <input class="btn btn-default btn-login" type="submit" value="Login">
                        <x-error field="errorLogin" class="alert alert-warning" />
                    </form>
    @endif

    @else
        <div  >
            <div  >
                <div >

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
                        <input type="checkbox" class="form-control">Nhớ tài khoản
                        <a href="#">Bạn quên mật khẩu?</a>
                        <button>Đăng nhập</button>
                        <x-error field="errorLogin" class="alert alert-warning" />
                    </form>

                </div>
            </div>
        </div>
    @endif





</div>
