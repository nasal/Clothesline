@extends('layouts.master')

@section('title')
    Sign In &mdash;
@stop

@section('content')
<!--
<div class="panel panel-primary" style="width: 35em; margin: 0 auto;">
    <div class="panel-heading">
        <h3 class="panel-title">Login</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" method="post">
            <fieldset>
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" id="inputEmail" name="username" placeholder="Email">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                        </div>
                        <div class="checkbox" style="margin-top: .5em">
                            <input type="checkbox" id="remember"> <label for="remember" class="nopadding">Keep me signed in.</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-primary" value="Login">
                        <div style="margin-top: 1em; font-size: .8em;">Don't have an account? <a href="./signup">Sign up now</a>!</div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
-->
<div class="row">
    <div class="col-md-6">
        <h1>Sign In</h1>
        <div class="well" style="border-top: solid 5px black; box-shadow: 0px 2px 0px rgba(0, 0, 0, 0.1);">
            <form class="form-horizontal" method="post">
                <fieldset>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="inputEmail" name="username" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                            <div class="checkbox" style="margin-top: .5em">
                                <input type="checkbox" id="remember"> <label for="remember" class="nopadding">Keep me signed in.</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <input type="submit" style="padding: 10px 15px; background: black; color: white; border: none;" value="Login">
                        </div>
                        <div style="margin-top: 1em; font-size: 1em; text-align: center;">Forgot your password? <a href="./forgot">We are here for you</a>!</div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <h1>Don't have an account?</h1>
        <div class="well" style="border-top: solid 5px black; box-shadow: 0px 2px 0px rgba(0, 0, 0, 0.1);">
            <p>Creating an account will allow you to select your favourite brands. This will allow us to get to know you and suggest new brands we think you would like.</p>
            <p>Sold?</p>
            <p><a href="./signup" style="display: inline-block; padding: 10px 15px; background: black; color: white;">Sign Up Now</a></p>
        </div>
    </div>
</div>
@stop