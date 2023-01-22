<div class="wrapper fadeInDown" style="margin-top: 5%">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first" style="height: 30px;">
            <!--<img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />-->
        </div>

        <!-- Login Form -->
        <form method="post" action="{{route('login')}}" enctype="multipart/form-data">
            @csrf
           <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-group">
                <input type="text" id="login" class="form-control logintext" name="email" placeholder="login" required>
                @if($errors->has('email'))
                    <strong class="error text-danger" >{{ $errors->first('email') }}</strong>
                @endif
            </div>
            <div class="form-group">
            <input type="password" id="password" class=" form-control fadeIn third logintext" name="password" placeholder="password">
                @if($errors->has('password'))
                    <strong class="error text-danger" >{{ $errors->first('password') }}</strong>
                @endif
                @if ($message = Session::get('success'))

                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>
        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>
</div>
