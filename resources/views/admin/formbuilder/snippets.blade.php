




<!-------------------------------------------------------------------------------------------------->
<!-- Containers -->
<!-------------------------------------------------------------------------------------------------->
<div data-type="container" data-preview="{{asset('examples/snippets/preview/row_12.png')}}" data-keditor-title="1 column" data-keditor-categories="1 column">
    <div class="row">
        <div class="col-sm-12" data-type="container-content">
        </div>
    </div>
</div>

<div data-type="container" data-preview="{{asset('examples/snippets/preview/row_6_6.png')}}" data-keditor-title="2 columns (50% - 50%)" data-keditor-categories="2 columns">
    <div class="row">
        <div class="col-sm-6" data-type="container-content">
        </div>
        <div class="col-sm-6" data-type="container-content">
        </div>
    </div>
</div>

<div data-type="container" data-preview="{{asset('examples/snippets/preview/row_4_8.png')}}" data-keditor-title="2 columns (33% - 67%)" data-keditor-categories="2 columns">
    <div class="row">
        <div class="col-sm-4" data-type="container-content">
        </div>
        <div class="col-sm-8" data-type="container-content">
        </div>
    </div>
</div>

<div data-type="container" data-preview="{{asset('examples/snippets/preview/row_8_4.png')}}" data-keditor-title="2 columns (67% - 33%)" data-keditor-categories="2 columns">
    <div class="row">
        <div class="col-sm-8" data-type="container-content">
        </div>
        <div class="col-sm-4" data-type="container-content">
        </div>
    </div>
</div>

<div data-type="container" data-preview="{{asset('examples/snippets/preview/row_4_4_4.png')}}" data-keditor-title="3 columns (33% - 33% - 33%)" data-keditor-categories="3 columns">
    <div class="row">
        <div class="col-sm-4" data-type="container-content">
        </div>
        <div class="col-sm-4" data-type="container-content">
        </div>
        <div class="col-sm-4" data-type="container-content">
        </div>
    </div>
</div>

<div data-type="container" data-preview="{{asset('examples/snippets/preview/row_3_6_3.png')}}" data-keditor-title="3 columns (25% - 50% - 35%)" data-keditor-categories="3 columns">
    <div class="row">
        <div class="col-sm-3" data-type="container-content">
        </div>
        <div class="col-sm-6" data-type="container-content">
        </div>
        <div class="col-sm-3" data-type="container-content">
        </div>
    </div>
</div>

<div data-type="container" data-preview="{{asset('examples/snippets/preview/row_3_3_3_3.png')}}" data-keditor-title="4 columns (25% - 25% - 25% - 25%)" data-keditor-categories="4 columns">
    <div class="row">
        <div class="col-sm-3" data-type="container-content">
        </div>
        <div class="col-sm-3" data-type="container-content">
        </div>
        <div class="col-sm-3" data-type="container-content">
        </div>
        <div class="col-sm-3" data-type="container-content">
        </div>
    </div>
</div>

<!-------------------------------------------------------------------------------------------------->
<!-- Components -->
<!-------------------------------------------------------------------------------------------------->
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/page_header.png')}}" data-keditor-title="Page header" data-keditor-categories="Text;Heading;Bootstrap component">
    <div class="page-header">
        <h1 style="margin-bottom: 30px; font-size: 50px;"><b class="text-uppercase">Cras justo odio</b> <small>Donec id elit non mi</small></h1>
        <p class="lead"><em>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</em></p>
    </div>
</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/text.png')}}" data-keditor-title="Text block" data-keditor-categories="Text">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro labore architecto fuga tempore omnis aliquid, rerum numquam deleniti ipsam earum velit aliquam deserunt, molestiae officiis mollitia accusantium suscipit fugiat esse magnam eaque cumque, iste corrupti magni? Illo dicta saepe, maiores fugit aliquid consequuntur aut, rem ex iusto dolorem molestias obcaecati eveniet vel voluptatibus recusandae illum, voluptatem! Odit est possimus nesciunt.</p>
</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/jumbotron.png')}}" data-keditor-title="Jumbotron" data-keditor-categories="Text;Heading;Bootstrap component;Dynamic component">
    <div class="jumbotron">
        <h1>Hello, world!</h1>
        <p>This is a simple hero unit</p>
        <p><a role="button" href="#" class="btn btn-primary btn-lg">Learn more</a></p>
    </div>

    <div data-dynamic-href="{{asset('examples/snippets/_dynamic_content.html')}}"></div>
</div>

<div data-type="component-slider" data-preview="{{asset('examples/snippets/preview/slider.png')}}" data-keditor-title="Slider" data-keditor-categories="Text;Heading;Bootstrap component;Dynamic component;Slider">

@include('shortcodes.plainhtml.imgslider')

</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/slider.png')}}" data-keditor-title="MegaMenu" data-keditor-categories="Text;Heading;Bootstrap component;Dynamic component;MegaMenu">

@include('shortcodes.plainhtml.megamenu')

</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/Freshers-ribbon-faq.png')}}" data-keditor-title="FAQ" data-keditor-categories="Text;Heading;Bootstrap component;Dynamic component;FAQ">

@include('shortcodes.plainhtml.faq')

</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/menu.png')}}" data-keditor-title="AMenu" data-keditor-categories="Text;Heading;Bootstrap component;Dynamic component;AMenu">

@include('shortcodes.plainhtml.aboutmenu')

</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/aspa.png')}}" data-keditor-title="ASPA" data-keditor-categories="Text;Heading;Bootstrap component;Dynamic component;ASPA">

@include('shortcodes.plainhtml.aboutspa')

</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/twitter.png')}}" data-keditor-title="Twitter" data-keditor-categories="Text;Heading;Bootstrap component;Dynamic component;Twitter">

@include('shortcodes.plainhtml.twitter')

</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/introslider.jpg')}}" data-keditor-title="Introslider" data-keditor-categories="Text;Heading;Bootstrap component;Dynamic component;Introslider">

@include('shortcodes.plainhtml.introslider')

</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/services.png')}}" data-keditor-title="Services" data-keditor-categories="Text;Heading;Bootstrap component;Dynamic component;Services">

@include('shortcodes.plainhtml.services')

</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/bitcoin.png')}}" data-keditor-title="pagesliderwidget" data-keditor-categories="Text;Heading;Bootstrap component;Dynamic component;pagesliderwidget">

@include ('layouts/innerpageslider')

</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/links.png')}}" data-keditor-title="Footerlinks" data-keditor-categories="Text;Heading;Bootstrap component;Dynamic component;Footerlinks">

@include('shortcodes.plainhtml.footerlinks')

</div>

<div data-type="component-photo" data-preview="{{asset('examples/snippets/preview/photo.png')}}" data-keditor-title="Photo" data-keditor-categories="Media;Photo">
    <div class="photo-panel">
        <img src="{{asset('examples/snippets/img/somewhere_bangladesh.jpg')}}" width="100%" height="" />
    </div>
</div>






<div data-type="component-photo" data-preview="{{asset('examples/snippets/preview/parallax1.jpg')}}" data-keditor-title="Photo" data-keditor-categories="Media;Photo">


  <div class="project-image bcg">
   <img src="{{asset('parallax/bcg_slide-2.jpg')}}" class="img-responsive">
  </div> 


  </div>

<div data-type="component-photo" data-preview="{{asset('examples/snippets/preview/parallax2.jpg')}}" data-keditor-title="Photo" data-keditor-categories="Media;Photo">



<div class="project-img">
  <img src="{{asset('parallax/bcg_slide-1.jpg')}}">
  
</div>



</div>
  <div data-type="component-text" data-preview="{{asset('examples/snippets/preview/parallax3.jpg')}}" data-keditor-title="Thumbnail Panel" data-keditor-categories="Text;Photo;Bootstrap component"> 
  <h1 class="project-description">
  Project Title
  </h1>
  <p class="project-description">
  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
  <br/>
  <br/>
  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
  <br/>
  <br/>
  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
  </p>
</div>





<div data-type="component-audio" data-preview="{{asset('examples/snippets/preview/audio.png')}}" data-keditor-title="Audio" data-keditor-categories="Media">
    <div class="audio-wrapper">
        <audio src="http://www.noiseaddicts.com/samples_1w72b820/2558.mp3" controls style="width: 100%"></audio>
    </div>
</div>

<div data-type="component-video" data-preview="{{asset('examples/snippets/preview/video.png')}}" data-keditor-title="Video" data-keditor-categories="Media">
    <div class="video-wrapper">
        <video width="320" height="180" controls style="background: #222;">
            <source src="http://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4" />
            <source src="http://www.w3schools.com/html/mov_bbb.ogg" type="video/ogg" />
        </video>
    </div>
</div>

<div data-type="component-youtube" data-preview="{{asset('examples/snippets/preview/youtube.png')}}" data-keditor-title="Youtube" data-keditor-categories="Media">
    <div class="youtube-wrapper">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/P5yHEKqx86U"></iframe>
        </div>
    </div>
</div>

<div data-type="component-vimeo" data-preview="{{asset('examples/snippets/preview/vimeo.png')}}" data-keditor-title="Vimeo" data-keditor-categories="Media">
    <div class="vimeo-wrapper">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/2203727?byline=0&portrait=0&badge=0"></iframe>
        </div>
    </div>
</div>

<div data-type="component-googlemap" data-preview="{{asset('examples/snippets/preview/googlemap.png')}}" data-keditor-title="Google Map" data-keditor-categories="Gmap">
    <div class="googlemap-wrapper">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14897.682811563638!2d105.82315895!3d21.0158462!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1456466192755"></iframe>
        </div>
    </div>
</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/thumbnail_panel.png')}}" data-keditor-title="Thumbnail Panel" data-keditor-categories="Text;Photo;Bootstrap component">
    <div class="thumbnail">
        <img src="{{asset('examples/snippets/img/somewhere_bangladesh.jpg')}}" width="100%" height="" />
        <div class="caption">
            <h3>Thumbnail label</h3>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p>
                <a href="#" class="btn btn-primary" role="button">Button</a>
                <a href="#" class="btn btn-default" role="button">Button</a>
            </p>
        </div>
    </div>
</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/heading_1.png')}}" data-keditor-title="Heading 1" data-keditor-categories="Text;Heading">
    <h1>Heading text 1</h1>
    <p>Body text</p>
</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/heading_2.png')}}" data-keditor-title="Heading 2" data-keditor-categories="Text;Heading">
    <h2>Heading text 2</h2>
    <p>Body text</p>
</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/media_panel.png')}}" data-keditor-title="Media Panel" data-keditor-categories="Media;Photo;Bootstrap component">
    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="{{asset('examples/snippets/img/yenbai_vietnam.jpg')}}" width="150" height="" />
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">Media heading</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos minus hic praesentium, nihil nemo, optio delectus explicabo at beatae. Ullam itaque, officiis maxime quibusdam impedit vero?</p>
        </div>
    </div>
</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/snippet_06.png')}}" data-keditor-title="Featured Article" data-keditor-categories="Text;Heading;Photo">
    <div class="row">
        <div class="col-md-6 text-center">
            <img class="img-circle img-responsive" style="display: inline-block;" src="{{asset('examples/snippets/img/sydney_australia_squared.jpg')}}" />
        </div>
        <div class="col-md-6">
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi molestias eius quaerat, adipisci ratione aliquid eum explicabo illum temporibus? Optio facilis eveniet quam, impedit eos architecto sequi dolorum illo facere, consequatur sit voluptatibus sunt eius ad officia corrupti modi quia minima voluptas vero. Minus, maxime!</p>
        </div>
    </div>
</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/snippet_07.png')}}" data-keditor-title="Articles List" data-keditor-categories="Text;Heading;Photo">
    <div class="row">
        <div class="col-md-4 text-center">
            <img class="img-circle img-responsive" style="display: inline-block;" src="{{asset('examples/snippets/img/somewhere_bangladesh_squared.jpg')}}" />
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, alias, temporibus? Vero natus modi ipsa debitis, accusamus accusantium cum quam. Saepe atque quisquam pariatur voluptatem expedita nesciunt reprehenderit et vitae.</p>
        </div>
        <div class="col-md-4 text-center">
            <img class="img-circle img-responsive" style="display: inline-block;" src="{{asset('examples/snippets/img/wellington_newzealand_squared.jpg')}}" />
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, aut, earum. Quod, debitis, delectus. Maxime eius ipsam sit dolorum perspiciatis obcaecati consectetur, explicabo reprehenderit repellat tempore veniam eos ducimus! Dignissimos.</p>
        </div>
        <div class="col-md-4 text-center">
            <img class="img-circle img-responsive" style="display: inline-block;" src="{{asset('examples/snippets/img/yenbai_vietnam_squared.jpg')}}" />
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil voluptatibus dicta corrupti aliquam, natus voluptatem pariatur quidem nostrum nisi corporis id ratione exercitationem et recusandae incidunt assumenda soluta qui odit.</p>
        </div>
    </div>
</div>

<!--<div data-type="component-form" data-preview="{{asset('examples/snippets/preview/form.png')}}" data-keditor-title="Bootstrap Form" data-keditor-categories="Form;Bootstrap component"></div>-->

<div data-type="component-nonExisting" data-preview="{{asset('examples/snippets/preview/text.png')}}" data-website="website01" data-blog="blog01" data-article="article01" data-tags="tag01,tag02" data-keditor-title="Text block with dynamic content" data-keditor-categories="Text;Dynamic component">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro labore architecto fuga tempore omnis aliquid, rerum numquam deleniti ipsam earum velit aliquam deserunt, molestiae officiis mollitia accusantium suscipit fugiat esse magnam eaque cumque, iste corrupti magni? Illo dicta saepe, maiores fugit aliquid consequuntur aut, rem ex iusto dolorem molestias obcaecati eveniet vel voluptatibus recusandae illum, voluptatem! Odit est possimus nesciunt.</p>
    <div data-dynamic-href="{{asset('examples/snippets/_dynamic_content')}}"></div>
</div>
