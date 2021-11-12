<div>
    <form wire:submit.prevent="ggg" action="">
        <button type="submit" name>Click</button>
    </form>
    {{-- ------------------------------------------------------- REGISTER ------------------------------------------------------------------- --}}
    <div  >
        @if ($flag)
            <form wire:submit.prevent="registUser" class="login100-form ">
                <span class="login100-form-title p-b-43">
                    Đăng ký để tiếp tục
                </span>

                <div class="wrap-input100  ">
                    <input class="input100 " type="text" name="name">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Mật danh ( Lưu ý : Lên dùng tên thật )</span>
                </div>

                <div class="wrap-input100   ">
                    <input class="input100 " type="text" name="email">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>

                <div class="wrap-input100  ">
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Mật khẩu</span>
                </div>

                <div class="container-login100-form-btn">
                    <button wire:click.prevent="ggg" class="login100-form-btn" type="submit">
                        Đăng kí
                    </button>
                </div>

                <div class="text-center p-t-46 p-b-20">
                    <span class="txt2">
                        Bạn đã có tài khoản 👉<a href="" wire:click.prevent="registerD" class="text-primary"> đăng
                            nhập </a>
                    </span>
                </div>

            </form>

            {{-- ------------------------------------------------------- LOGIN ------------------------------------------------------------------- --}}
        @else
            <form  class="login100-form validate-form">
                <span class="login100-form-title p-b-43">
                    Đăng nhập để tiếp tục
                </span>


                <div class="wrap-input100  validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100 " type="text" name="email">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>


                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="pass">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Mật khẩu</span>
                </div>

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Nhớ mật khẩu
                        </label>
                    </div>

                    <div>
                        <a href="#" class="txt1">
                            Quên mật khẩu
                        </a>
                    </div>
                </div>


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Đăng nhập
                    </button>
                </div>

                <div class="text-center p-t-46 p-b-20">
                    <span class="txt2">
                        Đăng nhập bằng các mạng xã hội <a href="" wire:click.prevent="registerD"
                            class="text-primary">hoặc
                            đăng kí</a>
                    </span>
                </div>

                <div class="login100-form-social flex-c-m">
                    <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                        <i class="fa fa-facebook-f" aria-hidden="true"></i>
                    </a>

                    <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        @endif
    </div>
</div>
