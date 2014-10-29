@extends('layouts.master')

@section('title')
    Brands Directory &mdash;
@stop

@section('content')
<h1>Brands Directory</h1>
<div class="row">
<?php $i = 1; ?>
   @foreach (DB::table('topbrands')->orderBy('name')->get() as $fav)
       <div class="col-md-4">
        <div style="background: white; padding: 1em; border-top: solid 5px black; border-radius: 2px; box-shadow: 0px 2px 0px rgba(0, 0, 0, 0.1); overflow: auto;">
            {{ (file_exists('./css/images/logos/' . $fav->name . '.jpg') ? '<img src="./css/images/logos/' . $fav->name . '.jpg" width="110" class="pull-right" style="margin-left: 10px;">' : '') }}
            <div style="font-size: 18px; font-weight: bold; margin-bottom: 5px;">{{ $fav->name }}</div>
            <span style="color: #777;">{{ $fav->description }}</span>
        </div>
       </div>
       {{ ($i % 3 == 0 ? '<div style="clear: both; margin-top: 1em;"></div>' : '') }}
       <?php $i++; ?>
   @endforeach
</div>
@stop