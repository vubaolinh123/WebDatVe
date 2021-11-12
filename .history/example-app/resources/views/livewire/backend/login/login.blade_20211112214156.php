<div>
    <div class="modal fade login" id="loginModal" wire:ignore.self>
        <div class="modal-dialog @if ($errors -> any())
            {{ 'shake' }}
        @endif login animated">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" wire:click="resetD" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Login with</h4>
                </div>
                <div class="modal-body">
                    @if ($errorLoginVeri)
                    @if ($successCode)
                        <div class="box">
                            <div class="content">
                                 <p class="text-center alert" >Mật khẩu mới của bạn là :  <span class="alert alert-success">{{  $passNew  }}</span> </p>
                                 <button wire:click.prevent="backLogin" class=" text-center btn btn-primary"> 👉 Quay về đăng nhập </button>
                            </div>
                        </div>
                    @else
                        <div class="box">
                            <div class="content">
                                <div   class="form loginBox">
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
                                        <input class="btn btn-default btn-login" type="submit" value="Xác minh code">
                                        <x-error field="errorLogin" class="alert alert-warning" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                    @else
                        <div class="box">
                            <div class="content">
                                <div class="social">
                                    <a class="circle github" href="{{ URL::to('loginToGithub') }}">
                                        <i class="fa fa-github fa-fw"></i>
                                    </a>
                                    <a id="google_login" class="circle google" href="{{ URL::to('loginToGoogle')  }}">
                                        <i class="fa fa-google-plus fa-fw"></i>
                                    </a>
                                    {{-- <a id="facebook_login" class="circle facebook" href="#">
                                        <i class="fa fa-facebook fa-fw"></i>
                                    </a> --}}
                                </div>
                                <div class="division">
                                    <div class="line l"></div>
                                    <span>or</span>
                                    <div class="line r"></div>
                                </div>
                                <div class="error"></div>
                                <div e class="form loginBox">
                                    <form method="post" wire:submit.prevent="loginAdmin"  >
                                        <input wire:model="email"  class="form-control" type="text"
                                            placeholder="Email" name="email">
                                        <x-error field="email" class="alert alert-danger" />
                                        <input wire:model="password"   class="form-control" type="password"
                                            placeholder="Password" name="password">
                                        <x-error field="password" class="alert alert-danger" />
                                        <input class="btn btn-default btn-login" type="submit" value="Login">
                                        <x-error field="errorLogin" class="alert alert-warning" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{--  --}}
                    @livewire('backend.login.register')
                    {{--  --}}
                </div>
                {{-- <div class="modal-footer">
                    <div class="forgot login-footer">
                        <span>Looking to
                            <a href="javascript: showRegisterForm();">create an account</a>
                            ?</span>
                    </div>
                    <div class="forgot register-footer" style="display:none">
                        <span>Already have an account?</span>
                        <a href="javascript: showLoginForm();">Login</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
