@extends('layouts.master')

@section('title')
    Words You Like &mdash;
@stop

@section('content')
<!--
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Go Home!</h3>
    </div>
    <div class="panel-body">
        @foreach (DB::table('likes')->groupBy('name')->get() as $tag)
            <div class="col-md-2 tag {{ (DB::table('user_likes')->where('user_id', Auth::id())->where('like_id', $tag->id)->count() ? 'active' : '')  }}" data-id="{{ $tag->id }}">{{ ucwords($tag->name) }} <span class="pull-right fa fa-check" style="color: white; margin-top: 3px;"></span></div>
        @endforeach
    </div>
    <div class="panel-footer" style="overflow: auto;">
        <a href="./favorites" class="btn btn-primary pull-right">Onwards!</a>
    </div>
</div>
-->
<h1>Choose the words that describe your taste.</h1>
<div class="tags row">
    @foreach (DB::table('likes')->groupBy('name')->get() as $tag)
        <!--
        <div class="col-md-2 tag {{ (DB::table('user_likes')->where('user_id', Auth::id())->where('like_id', $tag->id)->count() ? 'active' : '')  }}" data-id="{{ $tag->id }}">
            {{ ucwords($tag->name) }} <span class="pull-right fa fa-check"></span>
        </div>
        -->
        <div class="col-md-2 tagPic" style="margin-bottom: 2em;" data-id="{{ $tag->id }}">
            <div style=" background: white; position: relative; text-align: center;">
                <img src="./css/images/tags/{{ strtolower($tag->name) }}.jpg" width="100%" style="border-radius: 3px;">
                <span style="opacity: .6; display: {{ (DB::table('user_likes')->where('user_id', Auth::id())->where('like_id', $tag->id)->count() ? 'block' : 'none')  }}; font-size: 8em; width: 110px; height: 110px; color: #000; position: absolute; left: 50%; top: 50%; margin-left: -55px; margin-top: -65px;" class="fa fa-check"></span>
                <span style="background: rgba(0, 0, 0, 0.5); position: absolute; left: 0; bottom: 0; padding: 7px 15px; color: white; width: 100%">{{ ucwords($tag->name) }}</span>
            </div>
        </div>
    @endforeach
</div>
<a href="./favorites" class="btn btn-primary pull-right">Onwards!</a>
<style>
.tagPic { cursor: pointer; }
.tagPic img { transition: .2s; }
.tagPic:hover img { opacity: .8; }
</style>
<script>
$(document).ready(function() {
    $('.tag').click(function(e) {
        e.preventDefault();
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
        $.ajax({
            type: "POST",
            url: "http://localhost/laravel/public/api/user.php",
            data: {
                action: "updateLike",
                uid: {{ Auth::id() }},
                lid: $(this).attr('data-id')
            }
        });
    });
    $('.tagPic').click(function(e) {
        e.preventDefault();
        var that = $(this);
        that.find('span').first().fadeToggle('fast');
        $.ajax({
            type: "POST",
            url: "http://localhost/laravel/public/api/user.php",
            data: {
                action: "updateLike",
                uid: {{ Auth::id() }},
                lid: that.attr('data-id')
            }
        });
    });
});
</script>
@stop