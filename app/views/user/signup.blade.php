@extends('layouts.master')

@section('title')
    Sign Up &mdash;
@stop

@section('content')
<!--
<div class="panel panel-primary" style="width: 35em; margin: 0 auto;">
    <div class="panel-heading">
        <h3 class="panel-title">Sign Up</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">Email</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="inputEmail" name="username" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-4 control-label">Password</label>
                    <div class="col-lg-8">
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-4 control-label">Confirm Password</label>
                    <div class="col-lg-8">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary pull-right" style="margin-right: 1em;" value="Sign Up">
                </div>
                <div class="form-group" style="text-align: center;">
                    Already have an account? <a href="./login">Login now</a>!
                </div>
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </fieldset>
        </form>
    </div>
</div>
-->
<h1>Sign Up</h1>
<div class="well" style="border-top: solid 5px black;">
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
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Confirm Password</label>
                <div class="col-lg-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="pull-right" style="padding: 10px 15px; background: black; color: white; border: none; margin-right: 1em;" value="Sign Up">
            </div>
            <div class="form-group" style="text-align: center;">
                Already have an account? <a href="./login">Login now</a>!
            </div>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        </fieldset>
    </form>
</div>
@stop