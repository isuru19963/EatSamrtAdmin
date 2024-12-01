<!DOCTYPE html>
<html lang="en">

    @section('title')

    {{__('Terms And Conditions') }}
    @endsection

        @include('layouts.front_header')

    <header id="home" class="bg-primary blog_detail">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-sm-12">
              <h1
                class="text-white mb-sm-4 wow animate__fadeInLeft"
                data-wow-delay="0.2s"
              >
              {{__('Terms And Conditions')}}
              </h1>
            </div>
          </div>
        </div>
      </header>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <article class="article article-detail article-noshadow">
                        <div class="p-0">
                            <div>
                                <!--{!! Utility::getsettings('term_condition') !!}-->
                                
                                <p>Stop Cannabis Challenge has been developed to help people understand their cannabis use. The data collected through this application may be used to help us improve this intervention.</p>
<p>The app may collect the following data from its users:</p>
<ul>
<li>Personally identifiable information: email address only;</li>
<li>&nbsp;Information about cannabis use over time; and</li>
<li>Information about how the user interacts with the Stop Cannabis Challenge app, including mood and craving log.</li>
</ul>
<p>Data collected will not be linked to your identity and may be used for making improvements to the Stop Cannabis Challenge. The Research Team at the Center for Addiction and Mental Health is responsible for protecting your information and upholding standard privacy practices in handling the data described above. Participation to use this app is completely voluntary. If you wish, you may withdraw from the use of this app, you can uninstall the app, and if you do not wish to share the data collected, you can do so at any time by sending an email to <a href="mailto:sumedha.kushwaha@mail.utoronto.ca"> sumedha.kushwaha@mail.utoronto.ca</a>/ <a href="mailto:Michael.chaiton@camh.ca">Michael.chaiton@camh.ca </a>with the subject line &ldquo;<em>I wish to withdraw from Stop Cannabis Challenge</em>&rdquo; using the email address you used to register on the app. Upon receipt of the email, the Research Team will ensure that you and your data are removed from the app.</p>
                            </div>

                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>


    @include('layouts.front_footer')


</body>

</html>
