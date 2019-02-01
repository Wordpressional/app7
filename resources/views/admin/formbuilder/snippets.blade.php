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
        <h1 style="margin-bottom: 30px; font-size: 50px; padding:20px;"><b class="text-uppercase">Cras justo odio</b> <small>Donec id elit non mi</small></h1>
        <p class="lead" style="padding:20px;"><em>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</em></p>
    </div>
</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/text.png')}}" data-keditor-title="Text block" data-keditor-categories="Text">
    <p style="padding:20px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro labore architecto fuga tempore omnis aliquid, rerum numquam deleniti ipsam earum velit aliquam deserunt, molestiae officiis mollitia accusantium suscipit fugiat esse magnam eaque cumque, iste corrupti magni? Illo dicta saepe, maiores fugit aliquid consequuntur aut, rem ex iusto dolorem molestias obcaecati eveniet vel voluptatibus recusandae illum, voluptatem! Odit est possimus nesciunt.</p>
</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/jumbotron.png')}}" data-keditor-title="Jumbotron" data-keditor-categories="Text;Heading;Bootstrap component;Dynamic component">
    <div class="jumbotron">
        <h1 style="padding:20px;">Hello, world!</h1>
        <p style="padding:20px;">This is a simple hero unit</p>
        <p style="padding:20px;"><a role="button" href="#" class="btn btn-primary btn-lg">Learn more</a></p>
    </div>

    <div data-dynamic-href="{{asset('examples/snippets/_dynamic_content.html')}}"></div>
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
            <p style="color:black; padding:20px;">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p>
                <a href="#" class="btn btn-primary" role="button">Button</a>
                <a href="#" class="btn btn-default" role="button">Button</a>
            </p>
        </div>
    </div>
</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/heading_1.png')}}" data-keditor-title="Heading 1" data-keditor-categories="Text;Heading">
    <h1 style="padding:20px;">Heading text 1</h1>
    <p style="padding:20px;">Body text</p>
</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/heading_2.png')}}" data-keditor-title="Heading 2" data-keditor-categories="Text;Heading">
    <h2 style="padding:20px;">Heading text 2</h2>
    <p style="padding:20px;">Body text</p>
</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/media_panel.png')}}" data-keditor-title="Media Panel" data-keditor-categories="Media;Photo;Bootstrap component">
    <div class="media col-sm-12">
        <div class="media-left col-md-6 col-sm-12 col-xs-12">
            <a href="#">
                <img class="media-object col-sm-12 col-xs-12" src="{{asset('examples/snippets/img/yenbai_vietnam.jpg')}}" width="150" height="" />
            </a>
        </div>
        <div class="media-body col-md-6 col-sm-12 col-xs-12">
            <h4 class="media-heading" style="padding:20px;">Media heading</h4>
            <p style="padding:20px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos minus hic praesentium, nihil nemo, optio delectus explicabo at beatae. Ullam itaque, officiis maxime quibusdam impedit vero?</p>
        </div>
    </div>
</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/snippet_06.png')}}" data-keditor-title="Featured Article" data-keditor-categories="Text;Heading;Photo">
    <div class="row">
        <div class="col-md-6 text-center">
            <img class="img-circle img-responsive" style="display: inline-block;" src="{{asset('examples/snippets/img/sydney_australia_squared.jpg')}}" />
        </div>
        <div class="col-md-6">
            <h3 style="padding:20px; text-align:center;">Lorem ipsum</h3>
            <p style="padding:20px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi molestias eius quaerat, adipisci ratione aliquid eum explicabo illum temporibus? Optio facilis eveniet quam, impedit eos architecto sequi dolorum illo facere, consequatur sit voluptatibus sunt eius ad officia corrupti modi quia minima voluptas vero. Minus, maxime!</p>
        </div>
    </div>
</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/snippet_07.png')}}" data-keditor-title="Articles List" data-keditor-categories="Text;Heading;Photo">
    <div class="row">
        <div class="col-md-4 text-center">
            <img class="img-circle img-responsive" style="display: inline-block;" src="{{asset('examples/snippets/img/somewhere_bangladesh_squared.jpg')}}" />
            <h3 style="padding:20px;">Lorem ipsum</h3>
            <p style="padding:20px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, alias, temporibus? Vero natus modi ipsa debitis, accusamus accusantium cum quam. Saepe atque quisquam pariatur voluptatem expedita nesciunt reprehenderit et vitae.</p>
        </div>
        <div class="col-md-4 text-center">
            <img class="img-circle img-responsive" style="display: inline-block;" src="{{asset('examples/snippets/img/wellington_newzealand_squared.jpg')}}" />
            <h3 style="padding:20px;">Lorem ipsum</h3>
            <p style="padding:20px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, aut, earum. Quod, debitis, delectus. Maxime eius ipsam sit dolorum perspiciatis obcaecati consectetur, explicabo reprehenderit repellat tempore veniam eos ducimus! Dignissimos.</p>
        </div>
        <div class="col-md-4 text-center">
            <img class="img-circle img-responsive" style="display: inline-block;" src="{{asset('examples/snippets/img/yenbai_vietnam_squared.jpg')}}" />
            <h3 style="padding:20px;">Lorem ipsum</h3>
            <p style="padding:20px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil voluptatibus dicta corrupti aliquam, natus voluptatem pariatur quidem nostrum nisi corporis id ratione exercitationem et recusandae incidunt assumenda soluta qui odit.</p>
        </div>
    </div>
</div>

<!--<div data-type="component-form" data-preview="{{asset('examples/snippets/preview/form.png')}}" data-keditor-title="Bootstrap Form" data-keditor-categories="Form;Bootstrap component"></div>-->

<div data-type="component-nonExisting" data-preview="{{asset('examples/snippets/preview/text.png')}}" data-website="website01" data-blog="blog01" data-article="article01" data-tags="tag01,tag02" data-keditor-title="Text block with dynamic content" data-keditor-categories="Text;Dynamic component">
    <p style="padding:20px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro labore architecto fuga tempore omnis aliquid, rerum numquam deleniti ipsam earum velit aliquam deserunt, molestiae officiis mollitia accusantium suscipit fugiat esse magnam eaque cumque, iste corrupti magni? Illo dicta saepe, maiores fugit aliquid consequuntur aut, rem ex iusto dolorem molestias obcaecati eveniet vel voluptatibus recusandae illum, voluptatem! Odit est possimus nesciunt.</p>
    <div data-dynamic-href="{{asset('examples/snippets/_dynamic_content')}}"></div>
</div>

<div data-type="component-photo" data-preview="{{asset('examples/snippets/preview/photo.png')}}" data-keditor-title="Photo" data-keditor-categories="Media;Photo">
    <div class="photo-panel">
        <img src="{{asset('examples/snippets/img/somewhere_bangladesh.jpg')}}" width="100%" height="" />
    </div>
</div>

<div data-type="component-slider" data-preview="{{asset('examples/snippets/preview/imgslider.png')}}" data-keditor-title="Slider" data-keditor-categories="HTMLTemplates;Sliders">

@include('shortcodes.plainhtml.imgslider')

</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/megamenu.png')}}" data-keditor-title="MegaMenu" data-keditor-categories="HTMLTemplates;MegaMenu;Menus">

@include('shortcodes.plainhtml.megamenu')

</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/faq.png')}}" data-keditor-title="FAQ" data-keditor-categories="HTMLTemplates;FAQ">

@include('shortcodes.plainhtml.faq')

</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/aboutmenu.png')}}" data-keditor-title="AMenu" data-keditor-categories="HTMLTemplates;Menus">

@include('shortcodes.plainhtml.aboutmenu')

</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/topmenu.png')}}" data-keditor-title="TopMenu" data-keditor-categories="HTMLTemplates;Menus">

@include('shortcodes.plainhtml.topmenu')

</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/aboutspa.png')}}" data-keditor-title="ASPA" data-keditor-categories="HTMLTemplates;SPA">

@include('shortcodes.plainhtml.aboutspa')

</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/introslider1.jpg')}}" data-keditor-title="Introslider" data-keditor-categories="HTMLTemplates;Introslider;Sliders">

@include('shortcodes.plainhtml.introslider')

</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/services1.png')}}" data-keditor-title="Services" data-keditor-categories="HTMLTemplates;Services">

@include('shortcodes.plainhtml.services')

</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/innerpagesslider.png')}}" data-keditor-title="pagesliderwidget" data-keditor-categories="HTMLTemplates;Sliders">

@include('shortcodes.plainhtml.innerpageslider')

</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/footerlinks.png')}}" data-keditor-title="Footerlinks" data-keditor-categories="HTMLTemplates;Menus">

@include('shortcodes.plainhtml.footerlinks')

</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/footerlinks.png')}}" data-keditor-title="Footerlinks" data-keditor-categories="HTMLTemplates;Menus">

@include('shortcodes.plainhtml.footerlinks2')

</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/gallery.png')}}" data-keditor-title="Gallery" data-keditor-categories="HTMLTemplates;Gallery">

@include('shortcodes.plainhtml.gallery')

</div>


<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/parallax1.jpg')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;Parallax">

@include('shortcodes.plainhtml.parallaxone')
  


</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/revolutionaryslider.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;Sliders;RevolutionarySlider">

@include('shortcodes.plainhtml.revolutionslider')
  


</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/Stickymenut1.jpg')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;Menus;StickyMenu;In-built Developer Theme">

@include('shortcodes.plainhtml.stickymenut1')
  


</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/Bannert1.jpg')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;Banner;In-built Developer Theme">

@include('shortcodes.plainhtml.bannert1')
  


</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/Aboutt1.jpg')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;About;In-built Developer Theme">

@include('shortcodes.plainhtml.aboutt1')
  


</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/Servicet1.jpg')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;Services;In-built Developer Theme">

@include('shortcodes.plainhtml.servicet1')
  


</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/factst1.jpg')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;Facts;In-built Developer Theme">

@include('shortcodes.plainhtml.factst1')
  


</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/portfoliot1.jpg')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;Portofolio;In-built Developer Theme">

@include('shortcodes.plainhtml.portfoliot1')
  


</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/parallaxt1.jpg')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;Parallax;In-built Developer Theme">

@include('shortcodes.plainhtml.parallaxt1')
  


</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/footert1.jpg')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;Footer;In-built Developer Theme">
@include('shortcodes.plainhtml.footert1')
  


</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/contspecial.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;Contact Forms">
@include('shortcodes.plainhtml.contactformspecial')
  


</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/contspecial.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;Contact Forms">
@include('shortcodes.plainhtml.simplecontactme')
  


</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/bluecon.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;Contact Forms">
@include('shortcodes.plainhtml.bluecontact')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/social-twitter.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;Twitter">
@include('shortcodes.plainhtml.twitter')
  


</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/portfoliot1.jpg')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;Portofolio">

@include('shortcodes.plainhtml.portfoliot2')
  


</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/portfoliot1.jpg')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;Accordion">

@include('shortcodes.plainhtml.accordion3')
  


</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/blog-icon.png')}}" data-keditor-title="text" data-keditor-categories="DynamicTemplates;Blog">

 [bloglist]Post Category Name Here[/bloglist]
</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/2levelmenu.png')}}" data-keditor-title="text" data-keditor-categories="DynamicMenus;Menu">

[menulist]Menu Name Here[/menulist]
</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/3levelmenu.png')}}" data-keditor-title="text" data-keditor-categories="DynamicMenus;Menu">

[responsivemenulist]Menu Name Here[/responsivemenulist]
</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom1.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_1')
   


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom2.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_2')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom3.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_3')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom4.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_4')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom5.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_5')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom6.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_6')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom7.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_7')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom8.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_8')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom9.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_9')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom10.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_10')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom11.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_11')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom12.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_12')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom13.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_13')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom14.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_14')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom15.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_15')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom16.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_16')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom17.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_17')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom18.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_18')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom19.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_19')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom20.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_20')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom21.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_21')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom22.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_22')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom23.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_23')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom24.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_24')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom25.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_25')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom26.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_26')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom27.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_27')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom28.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_28')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom29.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_29')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom30.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_30')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom31.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_31')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom32.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_32')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom33.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_33')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom34.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_34')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom35.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_35')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom36.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_36')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom37.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_37')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom38.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_38')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom39.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_39')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom40.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_40')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom41.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_41')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom42.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_42')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom43.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_43')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom44.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_44')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom45.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_45')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom46.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_46')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom47.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_47')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom48.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_48')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom49.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_49')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom50.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_50')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom51.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_51')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom52.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_52')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom53.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_53')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom54.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_54')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom55.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_55')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom56.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_56')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom57.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_57')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom58.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_58')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom59.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_59')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom60.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_60')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom61.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_61')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom62.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_62')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom63.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_63')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom64.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_64')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom65.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_65')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom66.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_66')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom67.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_67')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom68.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_68')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom69.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_69')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom70.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_70')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom71.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_71')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom72.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_72')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom73.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_73')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom74.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_74')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom75.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_75')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom76.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_76')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom77.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_77')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom78.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_78')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom79.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_79')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom80.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_80')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom81.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_81')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom82.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_82')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom83.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_83')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom84.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_84')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom85.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_85')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom86.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_86')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom87.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_87')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom88.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_88')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom89.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_89')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom90.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_90')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom91.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_91')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom92.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_92')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom93.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_93')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom94.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_94')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom95.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_95')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom96.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_96')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom97.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_97')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom98.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_98')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom99.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_99')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom100.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_100')
  


</div><div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom101.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_101')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom102.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_102')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom103.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_103')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom104.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_104')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom105.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_105')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom106.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_106')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom107.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_107')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom108.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_108')
  


</div>

<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom109.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_109')
  


</div>
<div data-type="component-text" data-preview="{{asset('examples/snippets/preview/custom110.png')}}" data-keditor-title="Photo" data-keditor-categories="HTMLTemplates;CustomTemplates">

@include('shortcodes.custom.customplain_110')
  


</div>



