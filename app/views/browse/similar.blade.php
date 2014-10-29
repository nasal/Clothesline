<?php
$tags = array();
$brands = array();
?>

@extends('layouts.master')

@section('content')
    <h1>Your fav brands</h1>
    @foreach (DB::table('favs')->where('user_id', Auth::id())->get() as $fav)
        <?php $brands[] = Brand::where('id', $fav->brand_id)->pluck('name'); ?>
        {{ Brand::where('id', $fav->brand_id)->pluck('name') }}<br>
    @endforeach

    <h1>Your  tags</h1>
    @foreach (DB::table('favs')->where('user_id', Auth::id())->get() as $fav)
        @foreach (Tag::where('brand_id', $fav->brand_id)->get() as $tag)
            <?php $tags[] = $tag->tag; ?>
            {{ $tag->tag }},
        @endforeach
    @endforeach

    <h1>Similar brands</h1>
    <?php
    for ($i = 0; $i < count($tags); $i++) {
        foreach (DB::table('tags')->where('tag', $tags[$i])->get() as $tag) {
            if (!in_array(Brand::where('id', $tag->brand_id)->pluck('name'), $brands)) {
                $brands[] = Brand::where('id', $tag->brand_id)->pluck('name');
                echo Brand::where('id', $tag->brand_id)->pluck('name') . ', because of ...<br>';
            }
        }
    }
    ?>
    {{--
    @foreach (DB::table('tags')->where('tag', $article)->get() as $tag)
        {{ Brand::where('id', $tag->brand_id)->pluck('name') }}<br>
    @endforeach
    --}}
@stop