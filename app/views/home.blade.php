<?php
$tags = array();
$brands = array();
?>

@extends('layouts.master')

@section('content')
    @if (Auth::check())
       <!--
       <div style="background: white; margin-bottom: 1em; font-family: Damion;">
           <span class="fa fa-star" style="font-size: 15px; padding: 15px; background: black; color: white; margin-right: .5em; display: inline-block; width: 50px; text-align: center;"></span>
           <span style="font-size: 1.5em; display: inline-block;">Check out your fav brands</span>
       </div>
       -->
       <h1>Check out your fav brands.</h1>
       <div class="row">
           <?php $i = 1; ?>
           @foreach (DB::table('favs')->where('user_id', Auth::id())->get() as $fav)
               <?php $brands[] = Brand::where('id', $fav->brand_id)->pluck('name'); ?>
               <!--<li style="backrgound: white;">{{ (file_exists('./css/images/logos/' . Brand::where('id', $fav->brand_id)->pluck('name') . '.jpg') ? '<img src="./css/images/logos/' . Brand::where('id', $fav->brand_id)->pluck('name') . '.jpg" width="100%">' : Brand::where('id', $fav->brand_id)->pluck('name')) }}</li>-->
               <div class="col-md-4">
                   <div style="background: white; padding: 1em; border-top: solid 5px black; border-radius: 2px; box-shadow: 0px 2px 0px rgba(0, 0, 0, 0.1); overflow: auto;">
                       {{ (file_exists('./css/images/logos/' . Brand::where('id', $fav->brand_id)->pluck('name') . '.jpg') ? '<img src="./css/images/logos/' . Brand::where('id', $fav->brand_id)->pluck('name') . '.jpg" width="110" class="pull-right" style="margin-left: 10px;">' : '') }}
                       <div style="font-size: 18px; font-weight: bold; margin-bottom: 5px;">{{ Brand::where('id', $fav->brand_id)->pluck('name') }}</div>
                       <span style="color: #777; text-overflow: ellipsis;">{{ Brand::where('id', $fav->brand_id)->pluck('description') }}</span>
                   </div>
                  </div>
                  <?php $i++; ?>
                  {{ ($i % 4 == 0 ? '<div style="clear: both; margin-top: 1em;"></div>' : '') }}
           @endforeach
           {{ ($i == 1 ? '<div class="col-md-12">No favourites yet.</div>' : '') }}
       </div>

        <!--
        <div style="background: white; margin: 2em 0 1em; font-family: Damion;">
           <span class="fa fa-exclamation" style="font-size: 15px; padding: 15px; background: black; color: white; margin-right: .5em; display: inline-block; width: 50px; text-align: center;"></span>
           <span style="font-size: 1.5em; display: inline-block;">We think you should take a look at these too</span>
       </div>
       -->
       <h2 style="margin-top: 1em;">We think you should take a look at these as well.</h2>
       @foreach (DB::table('favs')->where('user_id', Auth::id())->get() as $fav)
          @foreach (Tag::where('brand_id', $fav->brand_id)->get() as $tag)
              <?php $tags[] = $tag->tag; ?>
          @endforeach
       @endforeach
       <div class="row">
           <!--<ul class="brand">-->
              <?php
              for ($i = 0; $i < count($tags); $i++) {
                  foreach (DB::table('tags')->where('tag', $tags[$i])->get() as $tag) {
                      if (!in_array(Brand::where('id', $tag->brand_id)->pluck('name'), $brands)) {
                          $brands[] = Brand::where('id', $tag->brand_id)->pluck('name');
                          //echo '<li style="backrgound: white;">' . (file_exists('./css/images/logos/' . Brand::where('id', $tag->brand_id)->pluck('name') . '.jpg') ? '<img src="./css/images/logos/' . Brand::where('id', $tag->brand_id)->pluck('name') . '.jpg" width="100%">' : Brand::where('id', $tag->brand_id)->pluck('name')) . '</li>';
                          echo '<div class="col-md-4">';
                          echo '<div style="background: white; padding: 1em; border-top: solid 5px black; border-radius: 2px; box-shadow: 0px 2px 0px rgba(0, 0, 0, 0.1); overflow: auto;">';
                          echo (file_exists('./css/images/logos/' . Brand::where('id', $tag->brand_id)->pluck('name') . '.jpg') ? '<img src="./css/images/logos/' . Brand::where('id', $tag->brand_id)->pluck('name') . '.jpg" width="110" class="pull-right" style="margin-left: 10px;">' : '');
                          echo '<div style="font-size: 18px; font-weight: bold; margin-bottom: 5px;">' . Brand::where('id', $tag->brand_id)->pluck('name') . '</div>';
                          echo '<span style="color: #777;">' . Brand::where('id', $tag->brand_id)->pluck('description') . '</span>';
                          echo '<div style="margin-top: 5px;">Suggested because you like: ';
                          $myBrands = DB::table('tags')->where('tag', $tag->tag)->get();
                              $myi = 0;
                              foreach($myBrands as $my) {
                                $br = Brand::where('id', $my->brand_id)->pluck('name');
                                if ($br != Brand::where('id', $tag->brand_id)->pluck('name')) {
                                    echo ($myi > 0 ? ', ' : '') . $br;
                                    $myi++;
                                }
                              }
                              echo '</div>';
                            echo '</div>';
                            echo '</div>';
                      }
                  }
              }
              if (count($tags) == 0) {
              echo '<div class="col-md-12">No suggestions yet. Set up your Clothesline account first.</div>';
              }
              ?>
          <!--</ul>-->
      </div>
    @else
        <h1>Editor's Picks</h1>
        <!--<ul class="newbrand">-->
        <div class="row">
           @foreach (DB::table('picks')->get() as $fav)
               <?php $brands[] = Brand::where('id', $fav->brand_id)->pluck('name'); ?>
               <div class="col-md-4">
                <div style="background: white; padding: 1em; border-top: solid 5px black; border-radius: 2px; box-shadow: 0px 2px 0px rgba(0, 0, 0, 0.1);">
                    {{ (file_exists('./css/images/logos/' . Brand::where('id', $fav->brand_id)->pluck('name') . '.jpg') ? '<img src="./css/images/logos/' . Brand::where('id', $fav->brand_id)->pluck('name') . '.jpg" width="110" class="pull-right" style="margin-left: 10px;">' : '') }}
                    <div style="font-size: 18px; font-weight: bold; margin-bottom: 5px;">{{ Brand::where('id', $fav->brand_id)->pluck('name') }}</div>
                    <span style="color: #777;">{{ Brand::where('id', $fav->brand_id)->pluck('description') }}</span>
                </div>
               </div>
           @endforeach
        </div>
        {{-- (file_exists('./css/images/logos/' . Brand::where('id', $fav->brand_id)->pluck('name') . '.jpg') ? '<img src="./css/images/logos/' . Brand::where('id', $fav->brand_id)->pluck('name') . '.jpg" width="100%">' :  --}}
        <!--</ul>-->
        <h2>Most Popular Brands</h2>
        <div class="row">
            <div class="col-md-4">
                <div style="background: white; padding: 1em; border-top: solid 5px black; border-radius: 2px; box-shadow: 0px 2px 0px rgba(0, 0, 0, 0.1);">
                    <img src="./css/images/logos/h&m.jpg" width="110" class="pull-right" style="margin-left: 10px;">
                    <div style="font-size: 18px; font-weight: bold; margin-bottom: 5px;">H&M</div>
                    <span style="color: #777;">Offering unbeatable value with a wide range of products delivered every day, H&M is at the cutting edge of fashion.</span>
                </div>
            </div>
            <div class="col-md-4">
                <div style="background: white; padding: 1em; border-top: solid 5px black; border-radius: 2px; box-shadow: 0px 2px 0px rgba(0, 0, 0, 0.1);">
                    <img src="./css/images/logos/adidas.jpg" width="110" class="pull-right" style="margin-left: 10px;">
                    <div style="font-size: 18px; font-weight: bold; margin-bottom: 5px;">Adidas</div>
                    <span style="color: #777;">Adidas AG is a German multinational corporation that designs and manufactures sports shoes, clothing and accessories.</span>
                </div>
            </div>
            <div class="col-md-4">
                <div style="background: white; padding: 1em; border-top: solid 5px black; border-radius: 2px; box-shadow: 0px 2px 0px rgba(0, 0, 0, 0.1);">
                    <img src="./css/images/logos/gap.jpg" width="110" class="pull-right" style="margin-left: 10px;">
                    <div style="font-size: 18px; font-weight: bold; margin-bottom: 5px;">Gap</div>
                    <span style="color: #777;">Gap is an American multinational clothing and accessories retailer. It was founded in 1969 by Donald Fisher.</span>
                </div>
            </div>
        </div>
    @endif
    <style>
    .bx-wrapper { max-width: 100% !important; }
    .brand li:hover { opacity: .8; }
    .picks div { height: 80px; background: silver; text-align: center; line-height: 80px; }

    .popular { list-style: none; margin: 0; padding: 0; }
        .popular li { display: inline-block; margin-bottom: 10px; height: 250px; background: silver; text-align: center; line-height: 250px; }

    .newbrand { list-style: none; }
    .newbrand li { display: inline-block; }

    </style>
    <script>
    $(document).ready(function() {
        $('.brand').bxSlider({
            slideWidth: 120,
            minSlides: 5,
            maxSlides: 10,
            slideMargin: 10,
            moveSlides: 1,
            infiniteLoop: false,
            pager: false
          });
    });
    </script>
@stop