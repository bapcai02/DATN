@extends('fontend.layouts.master')
@section('content')

<div class="ogami-breadcrumb">
    <div class="container">
      <ul>
        <li> <a class="breadcrumb-link" href="{{ url('/') }}"> <i class="fas fa-home"></i>Home</a></li>
        <li> <a class="breadcrumb-link active">About us</a></li>
      </ul>
    </div>
  </div>
  <!-- End breadcrumb-->
  <div class="about-us">
    <div class="container">
      <div class="our-story">
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="our-story_text">
              <h1 class="title green-underline">The Story About Us</h1>
              <p>Tyna Giang's integrated agro-forestry farming model is the first project in Vietnam to achieve the highest ranking in the "100 projects to combat climate change" by the Ministry of Environment, Energy and Sea. France organized in 2016 ...</p>
              <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Neque porro quisquam est, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem</p>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="our-story_video"><img src="assets/images/pages/video_play.png" alt="play video"><a class="play-btn" href="https://www.youtube.com/watch?v=7e90gBu4pas" target="_blank"><i class="fas fa-play"></i></a></div>
          </div>
        </div>
      </div>
      <div class="our-number">
        <div class="row">
          <div class="col-md-4">
            <div class="our-number_block">
              <div class="our-number_icon"><img src="{{ asset('HTML/assets/images/pages/about_us_icon_1.png') }}" alt="icon"></div>
              <div class="our-number_info">
                <h1 class="nummber-increase"><span class="numscroller" data-min="1" data-max="100" data-delay="5" data-increment="10">100</span>%</h1>
                <p>Happy Clients</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="our-number_block">
              <div class="our-number_icon"><img src="{{ asset('HTML/assets/images/pages/about_us_icon_2.png') }}" alt="icon"></div>
              <div class="our-number_info">
                <h1 class="nummber-increase"><span class="numscroller" data-min="1" data-max="142" data-delay="5" data-increment="10">142</span></h1>
                <p>Our Engineer</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="our-number_block">
              <div class="our-number_icon"><img src="{{ asset('HTML/assets/images/pages/about_us_icon_3.png') }}" alt="icon"></div>
              <div class="our-number_info">
                <h1 class="nummber-increase">+<span class="numscroller" data-min="1" data-max="16" data-delay="5" data-increment="10">16</span></h1>
                <p>Our Farm</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End about us-->

@endsection