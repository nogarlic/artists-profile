@extends('layouts.main')

@section('container')
    <picture class="img-wo profile-wo">
        <source srcset="img/gate-wp-hp.jpg" media="(max-width: 415px)">
        <source srcset="img/wannaone.jpg">
        <img src="img/gate-wp.jpg" alt="Group Photo of Wanna One" width="100%" height="auto">
    </picture>
    <div class="profile-spaces"></div>

    <div class="container-sm">
        <div class="row">
          <div class="col-5 profile-left">
            <div class="img-sub-profile">
                <img src="img/sub-profile-wo.jpg" width="100%">
            </div>
            <div class="awards">
                <h4>AWARDS</h4>
                <hr>
                <ul>
                    @foreach ($awards as $award)
                        <li>- {{ $award['year']." ".$award['edition'] }} @if ($award['edition']%10 == 1)
                              <sup>st</sup>
                            @elseif ($award['edition']%10 == 2) 
                              <sup>nd</sup>
                            @elseif ($award['edition']%10 == 3) 
                              <sup>rd</sup>
                            @else
                              <sup>th</sup>
                        @endif {{ " ".$award['name']." ".$award['category'] }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="filmography">
                <h4>FILMOGRAPHY</h4>
                <hr>
                <ul>
                  @foreach ($filmographies as $filmography)
                      <li>- {{ $filmography['name']." (".$filmography['year'].", ".$filmography['channel'].")" }}</li>
                  @endforeach
                </ul>
            </div>
           </div>
          <div class="col-7 profile-right">
            <div class="wo-profile">
                <h4>워너원</h4>
                <h2><strong>Wanna One</strong></h2>
                <p>Was a South Korean boy band formed by CJ E&M through the second season of Produce 101. The group <strong>debuted</strong> on August 7, 2017, under Swing Entertainment and CJ E&M. Their contract ended on December 31, 2018, but their final activity as a group was their last concert on January 24–27, 2019. The group was recognized for their brand recognition and marketing power, having topped <strong>'Boy Group Brand Power Ranking'</strong> published by the Korean Corporate Reputation Research Institute for four months; as well as viewership ratings of the TV shows they appear on. In 2017, they ranked second in the 30 "Power People" survey by Ilgan Sports, for their influence among broadcasting companies and advertisers; and sixth in the top 10 artist of Gallup Korea survey. The group was also chosen as Best K-pop Artist of 2017. For their achievements, Wanna One ranked second on Forbes Korea Power Celebrity list, which ranks South Korea's most powerful and influential celebrities, in 2018 and third the following year.</p>
            </div>
            <div class="member">
                <h4>MEMBER</h4>
                <hr>
                <div class="row">
                      @foreach ($memberProfiles as $mpf)
                    <div class="col-4 d-flex">
                        <button  data-bs-toggle="modal" data-bs-target="#profile{{ $mpf['id'] }}Modal"><img src="img/{{ $mpf['member_thumbnail'] }}" alt="" srcset="" width="95%"></button>
                    </div>
                        @endforeach
                </div>
                @foreach ($memberProfiles as $mpf)
                <div class="modal fade modal-fullscreen" id="profile{{ $mpf['id'] }}Modal" tabindex="-1" aria-labelledby="profile{{ $mpf['id'] }}ModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                        <div class="row">
                          <div class="col-5 modal-photo">
                            <img src="img/{{ $mpf['member_modal'] }}" alt="" srcset="" width="150%">
                          </div>
                          <div class="col modal-detail">
                            <h1>{{ $mpf['member_name'] }}</h1>
                            <h4>{{ $mpf['member_name_hangeul'] }}</h4><br>
                            <p><br>{{ $mpf['member_birth'] }}</p>
                            <p>Sub-unit {{ $mpf['member_sub-unit'] }}</p>
                          </div>
                        </div>
                  </div>
                </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
      <hr class="footer-line">


@endsection