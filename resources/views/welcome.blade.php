@extends('layouts.dashboard')

@section('content')
@if (count($Courses)>0)

<div class="container">
    <div class="d-flex justify-content-center mt-4 mb-4">
        <h2>
            Check Out Our Online Courses
        </h2>
    </div>

</div>
<div role="main" class='view-school mt-4 mb-0'>
<div id="blocks" class="blocks-page blocks-page-course_sales_page ">
    <div class="course-block block liquid_html  odd-stripe" id="block-2834735">
            <div class="course-block block bundle_contents odd-stripe" id="block-2230257">
                <div class="container">
                    <div class="row">
                     @foreach ($Courses as $course)
                       <div class="col-xs-12 col-sm-6 col-md-3">

                        <!-- Bundle Course -->
                        <div class="course-listing bundle" data-course-url=https://www.udemy.com/course/ios-13-app-development-bootcamp/?referralCode=D3530B180A3ECABC6056">
                          <div class="row">
                            <div class="col-lg-12">
                              <!-- Course Image, Name & Subtitle (everyone) -->
                              <div class="course-box-image-container">
                                <img class="course-box-image" src="{{asset('/storage/'.$course->image)}}">
                              </div>
                              <div class="course-listing-title">
                                {{$course->title}}
                              </div>

                              <!-- Subtitle (unenrolled users) -->
                              <div class="course-listing-subtitle">
                                {!!$course->description!!}
                              </div>

                            </div>
                          </div>
                          <div class="row course-listing-extra-info col-xs-12">
                            <div class="col-xs-9">
                              <!-- Bundle Info (everyone) -->

                              <!-- Author Image and Name (everyone) -->



                            </div>


                          </div>
                        </div>

                      </div>
                      @endforeach

                    </div>
                </div>
            </div>
    </div>
 </div>
@endif


<hr class="featurette-divider pt-0 mt-0">

<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading">Using Python with Arduino. <span class="text-muted">It’ll blow your mind.</span></h2>
    <p class="lead">This series of lessons will teach you how to take your Arduino projects to the next level by having the Arduino interact with the Python programming language</p>
  </div>
  <div class="col-md-5">
      <img src="http://toptechboy.com/wp-content/uploads/2014/07/python-arduino.jpg" alt="" width="500" height="500">
  </div>
</div>

<hr class="featurette-divider">
<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <img src="https://img.icons8.com/color/96/000000/google-logo.png"/>        <h2>Google</h2>
        <p>Google LLC /ˈguːgəl/ est une entreprise américaine de services technologiques fondée en 1998 dans la Silicon Valley, en Californie, par Larry Page et Sergey Brin, créateurs du moteur de recherche Google. C'est une filiale de la société Alphabet depuis août 2015.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="https://img.icons8.com/color/96/000000/python.png"/>        <h2>Python</h2>
        <p>Python est un langage de programmation interprété, multi-paradigme et multiplateformes. Il favorise la programmation impérative structurée, fonctionnelle et orientée objet. best language in the world and has many
            the library</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="https://img.icons8.com/color/96/000000/nasa.png"/>        <h2>Nasa</h2>
        <p>La National Aeronautics and Space Administration, plus connue sous son acronyme NASA, est l'agence gouvernementale qui est responsable de la majeure partie du programme spatial civil des États-Unis. NASA  Aeronautics and Space</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->



<div >
    <form id="langswitch" action="{{ route('language')}}" method="post">
        @csrf
         <select name="language" id="language">
              <option value="en"{{(session()->has('locale') && session ('locale') =='en' ? 'selected':'')}}>english</option>
              <option value="fr"{{(session()->has('locale') && session ('locale') =='fr' ? 'selected':'')}}>francais</option>
            <button type="submit" class="btn btn-primary">
         </select>
    </form>
</div>
@endsection
