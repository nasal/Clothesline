@extends('layouts.master')

@section('title')
    Your Favourite Brands &mdash;
@stop

@section('content')
<!--
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">What are your fav brands?</h3>
    </div>
    <div style="padding: 1em 1em 0;">
        <ul class="pagination" style="margin: 0;">
          @foreach(range('a', 'z') as $i)
            <li {{ ($letter == $i ? 'class="active"' : '') }}><a href="http://localhost/laravel/public/favorites/{{ $i }}">{{ $i }}</a></li>
          @endforeach
        </ul>
        <div class="pull-right text-right">
            <form method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="q" id="query" style="display: inline; width: 75%; margin-right: .3em">
                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>

    <div class="panel-body">
        <ul class="brand">
            @foreach(Brand::orderBy('name')->get() as $brand)
                <li {{ (DB::table('favs')->where('user_id', Auth::id())->where('brand_id', $brand->id)->count() ? 'class="selected"' : '')  }} data-id="{{ $brand->id }}">{{ $brand->name }} <a href="#" class="close">x</a></a></li>
            @endforeach
        </ul>
    </div>
    <div class="panel-footer text-right" style="overflow: auto;">
        <a href="./likes" class="btn btn-info">Go back</a> or <a href="./similar" class="btn btn-primary">Finish!</a>
    </div>
</div>
-->
<h1>Choose your favourite brands.</h1>
<div class="tags row">
    @foreach(Brand::orderBy('name')->get() as $brand)
        <!--
        <div class="col-md-2 tag {{ (DB::table('favs')->where('user_id', Auth::id())->where('brand_id', $brand->id)->count() ? 'active' : '')  }}" data-id="{{ $brand->id }}">
            {{ $brand->name }} <span class="pull-right fa fa-check"></span>
        </div>
        -->
        <div class="col-md-2 tagPic" style="margin-bottom: 2em; position: relative;" data-id="{{ $brand->id }}">
            <div style=" background: white; position: relative; text-align: center;">
                <img src="./css/images/logos/{{ strtolower($brand->name) }}.jpg" style="width: 100%;">
                <span style="opacity: .7; display: {{ (DB::table('favs')->where('user_id', Auth::id())->where('brand_id', $brand->id)->count() ? 'block' : 'none')  }}; font-size: 8em; width: 110px; height: 110px; color: #45AF50; position: absolute; left: 50%; top: 50%; margin-left: -55px; margin-top: -65px;" class="fa fa-check"></span>
                <span style="background: rgba(0, 0, 0, 0.5); position: absolute; left: 0; bottom: 0; padding: 7px 15px; color: white; width: 100%">{{ ucwords($brand->name) }}</span>
            </div>
        </div>
    @endforeach
</div>
<div class="text-right">
    <a href="./likes" class="btn btn-info">Go back</a> <span style="margin: 0 10px;">or</span> <a href="./" class="btn btn-primary">Finish!</a>
</div>
<style>
.autocomplete-suggestions { border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; background: #eee; cursor: default; overflow: auto; box-shadow: 0px 3px 0px #ddd; }
.autocomplete-suggestion { padding: 5px 10px; white-space: nowrap; overflow: hidden; }
.autocomplete-no-suggestion { padding: 2px 5px;}
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: bold; color: #000; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { font-weight: bold; font-size: 16px; color: #000; display: block; border-bottom: 1px solid #000; }

.tagPic { cursor: pointer; }
.tagPic img { transition: .2s; }
.tagPic:hover img { opacity: .8; cursor: pointer; }
</style>
<script>
$(document).ready(function() {

    var options, a;
    jQuery(function(){
    	options = { serviceUrl: 'http://localhost/laravel/public/api/search.php' };
    	a = $('#query').autocomplete(options);
    });

    $('.tagPic').click(function(e) {
        e.preventDefault();
        var that = $(this);
        that.find('span').first().fadeToggle('fast');
         $.ajax({
             type: "POST",
             url: "http://localhost/laravel/public/api/user.php",
             data: {
                 action: "updateFav",
                 uid: {{ Auth::id() }},
                 bid: that.attr('data-id')
             }
         });
    });

    $('.tag').click(function(e) {
        e.preventDefault();
        var that = $(this);
        if (that.hasClass('active')) {
            that.removeAttr('data-selected');
            that.removeClass('active');
        } else {
            that.attr('data-selected', 'true');
            that.addClass('active');
        }
        $.ajax({
            type: "POST",
            url: "http://localhost/laravel/public/api/user.php",
            data: {
                action: "updateFav",
                uid: {{ Auth::id() }},
                bid: that.attr('data-id')
            }
        });
    });
});
</script>
@stop