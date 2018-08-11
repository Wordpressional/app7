@extends('layouts.apphome')

@section('contenthome')
        <!--================Search Area =================-->
        <section class="search_area">
            <div class="search_inner">
                <input type="text" placeholder="Enter Your Search...">
                <i class="ti-close"></i>
            </div>
        </section>
        <!--================End Search Area =================-->

        <!--================Header Menu Area =================-->
        

        <header class="main_menu_area">
        <div class="page-heading homep"> 
        <div class="container">
        <h2>Research Centre Vergelijkende Cultuurwetenschap</h2>
        <p>Comparative Science of Cultures</p>
        
        
        </div>
        </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ URL::to('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/cattype/books') }}">Books</a></li>
                        <li class="nav-item"><a  href="{{ url('/artpage/online-resources') }}">Online Resources</a></li>
                       
						 <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">What We do <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="{{ url('/thispage/events-conferences-and-projects') }}">Conferences</a></li>                        
                        <li><a href="{{ url('/thispage/events-conferences-and-projects') }}">Events</a></li>                      
                        <li><a href="{{ url('/thispage/events-conferences-and-projects') }}">Projects</a></li>
                        </ul>
                        </li>-->
                        <li class="nav-item"><a class="nav-link" href="{{ url('/thispage/events-conferences-and-projects') }}">Events, Conferences and Projects</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/thispage/contact') }}">Contact</a></li>
                    </ul>
                    <!--<ul class="navbar-nav justify-content-end">
                        <li><a href="#"><i class="icon_search"></i></a></li>
                        <li><a href="#"><i class="icon_bag_alt"></i></a></li>
                    </ul>-->
                </div>
            </nav>
        </header>
        <!--================End Header Menu Area =================-->

        <!--================Slider Area =================-->
        <section class="main_slider_area">
            <div id="main_slider" class="rev_slider" data-version="5.3.1.6">
                <ul>
                    <li data-index="rs-2946" data-transition="slidevertical" data-slotamount="1" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                        <img src="{{ asset('webhome/img/home-slider/slider-1.jpg') }}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYER NR. 1 -->
                        <div class="slider_text_box">
                            <!--<div class="tp-caption tp-resizeme rev-btn first_text"
                            data-x="['center','center','center','center','center','center']"
                            data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']"
                            data-voffset="['-130','-130','-130','-80','-80','-80']"
                            data-fontsize="['12','12','12','12','12']"
                            data-lineheight="['64','64','64','50','35']"
                            data-width="['550','550','550','550','300']"
                            data-height="none"
                            data-whitespace="normal"
                            data-type="text"
                            data-type="button"
                            data-actions='[{"event":"mouseenter","action":"startlayer","layer":"slide-2971-layer-18","delay":""},{"event":"mouseleave","action":"stoplayer","layer":"slide-2971-layer-18","delay":""},{"event":"click","action":"startlayer","layer":"slide-2971-layer-15","delay":""},{"event":"click","action":"startlayer","layer":"slide-2971-layer-19","delay":""},{"event":"click","action":"startlayer","layer":"slide-2971-layer-20","delay":"1000"},{"event":"click","action":"playvideo","layer":"slide-2971-layer-15","delay":"1000"}]'
                            data-responsive_offset="on"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                            data-textAlign="['center','center','center','center','center','center']"
                            style="z-index: 8;font-family: 'Poppins', sans-serif;font-weight:600;color:#fff;text-transform: uppercase;"><img src="img/play-video.png" alt=""> <span style="text-decoration: underline;padding-left: 10px;">Watch The Overview</span></div>-->

                            <!-- LAYER NR. 10 -->
                           <!--  <div class="tp-caption   tp-resizeme tp-videolayer"
                            id="slide-2971-layer-15"
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                            data-whitespace="nowrap"

                            data-type="video"
                            data-responsive_offset="on"

                            data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":500,"to":"o:1;","delay":"bytrigger","ease":"Power3.easeInOut"},{"delay":"bytrigger","speed":300,"to":"auto:auto;","ease":"nothing"}]'
                            data-vimeoid="142874198" data-videoattributes="title=0&byline=0&portrait=0&api=1" data-videowidth="['960px','720px','480px','360px']"
                            data-videoheight="['540px','405px','270px','203px']" data-videoloop="none"         data-textAlign="['left','left','left','left']"
                            data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]"
                            data-paddingbottom="[0,0,0,0]"
                            data-paddingleft="[0,0,0,0]"
                            data-lasttriggerstate="reset"           data-autoplay="off"
                            data-volume="100"
                            style="z-index: 14;text-transform:left;border-width:0px;"> </div>
 -->
                            <!-- LAYER NR. 11 -->
                            <div class="tp-caption Agency-CloseBtn rev-btn "
                            id="slide-2971-layer-20"
                            data-x="['center','center','center','center']" data-hoffset="['510','389','270','199']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-298','-229','-163','-118']"
                            data-width="50"
                            data-height="none"
                            data-whitespace="nowrap"

                            data-type="button"
                            data-actions='[{"event":"click","action":"stoplayer","layer":"slide-2971-layer-15","delay":""},{"event":"click","action":"stoplayer","layer":"slide-2971-layer-19","delay":""},{"event":"click","action":"stoplayer","layer":"slide-2971-layer-20","delay":""}]'
                            data-responsive_offset="on"
                            data-responsive="off"
                            data-frames='[{"from":"z:0;rX:0;rY:0;rZ:45deg;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":"bytrigger","ease":"Power3.easeInOut"},{"delay":"bytrigger","speed":2500,"to":"auto:auto;","ease":"nothing"},{"frame":"hover","speed":"2500","ease":"Power1.easeInOut","to":"o:1;sX:1.1;sY:1.1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);"}]'
                            data-textAlign="['center','center','center','center']"
                            data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]"
                            data-paddingbottom="[0,0,0,0]"
                            data-paddingleft="[0,0,0,0]"
                            data-lasttriggerstate="reset"
                            style="z-index: 15; min-width: 50px; max-width: 50px; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;font-size: 24px;"><i class="fa fa-close"></i> </div>

                            <div class="tp-caption tp-resizeme secand_text"
                                data-x="['center','center','center','center','center','center']"
                                data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']"
                                data-voffset="['0','0','0','0','0']"
                                data-fontsize="['48','48','48','28','28','22']"
                                data-lineheight="['60','60','60','36','36','30']"
                                data-width="100%"
                                data-height="none"
                                data-whitespace="normal"
                                data-type="text"
                                data-responsive_offset="on"
                                data-transform_idle="o:1;"
                                data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:4500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:4500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                data-textAlign="['center','center','center','center','center','center']"

                                style="z-index: 8;font-family:'Poppins', sans-serif;font-weight:700;color:#fff;">"We Shall Not Cease From Exploration…" 
                            </div>

                            <div class="tp-caption tp-resizeme slider_button"
                                data-x="['center','center','center','center','center','center']"
                                data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']"
                                data-voffset="['130','130','130','100','100','100']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-type="text"
                                data-responsive_offset="on"
                                data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:4500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:4500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                data-textAlign="['center','center','center','center','center','center']">
                                <a class="bg_btn" href="{{ url('/cattype/books') }}">More books</a>
                                <a class="tp_btn" href="{{ url('/artpage/online-resources') }}">Articles and notes</a>
                            </div>
                        </div>
                    </li>
                     
                    <li data-index="rs-2947" data-transition="slidevertical" data-slotamount="1" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="4000"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="4500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                        <img src="{{ asset('webhome/img/home-slider/slider-2.jpg') }}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYER NR. 1 -->
                        <div class="slider_text_box">
                            <div class="tp-caption tp-resizeme secand_text"
                                data-x="['center','center','center','center','center','center']"
                                data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']"
                                data-voffset="['0','0','0','0','0']"
                                data-fontsize="['48','48','48','28','28','22']"
                                data-lineheight="['60','60','60','36','36','30']"
                                data-width="100%"
                                data-height="none"
                                data-whitespace="normal"
                                data-type="text"
                                data-responsive_offset="on"
                                data-transform_idle="o:1;"
                                data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:4500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:4500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                data-textAlign="['center','center','center','center','center','center']"

                                style="z-index: 8;font-family:'Poppins', sans-serif;font-weight:700;color:#fff;"><center>“The Heathen in his Blindness: Asia, </center> <center>the West, and the Dynamics of Religion” </center>
                            </div>

                            <div class="tp-caption tp-resizeme slider_button"
                                data-x="['center','center','center','center','center','center']"
                                data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']"
                                data-voffset="['130','130','130','100','100','100']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-type="text"
                                data-responsive_offset="on"
                                data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:4500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:4500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                data-textAlign="['center','center','center','center','center','center']">
                                <a class="bg_btn" href="{{ url('/cattype/books') }}">More books</a>
                                <a class="tp_btn" href="{{ url('/artpage/online-resources') }}">Articles and notes</a>
                            </div>
                        </div>
                    </li>
                    <li data-index="rs-2948" data-transition="slidevertical" data-slotamount="1" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="4000"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="4500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                        <img src="{{ asset('webhome/img/home-slider/slider-3.jpg') }}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYER NR. 1 -->
                        <div class="slider_text_box">
                            <div class="tp-caption tp-resizeme secand_text"
                                data-x="['center','center','center','center','center','center']"
                                data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']"
                                data-voffset="['0','0','0','0','0']"
                                data-fontsize="['48','48','48','28','28','22']"
                                data-lineheight="['60','60','60','36','36','30']"
                                data-width="100%"
                                data-height="none"
                                data-whitespace="normal"
                                data-type="text"
                                data-responsive_offset="on"
                                data-transform_idle="o:1;"
                                data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:4500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:4500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                data-textAlign="['center','center','center','center','center','center']"

                                style="z-index: 8;font-family:'Poppins', sans-serif;font-weight:700;color:#fff;"><center>“Smriti-Vismriti: Bharateeya Samskruti” </center> <center>(ಸ್ಮೃತಿ-ವಿಸ್ಮೃತಿ: ಭಾರತೀಯ ಸಂಸ್ಕೃತಿ)</center>
                            </div>

                            <div class="tp-caption tp-resizeme slider_button"
                                data-x="['center','center','center','center','center','center']"
                                data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']"
                                data-voffset="['130','130','130','100','100','100']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-type="text"
                                data-responsive_offset="on"
                                data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:4500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:4500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                data-textAlign="['center','center','center','center','center','center']">
                                <a class="bg_btn" href="{{ url('/cattype/books') }}">More books</a>
                                <a class="tp_btn" href="{{ url('/artpage/online-resources') }}">Articles and notes</a>
                            </div>
                        </div>
                    </li>
                    <li data-index="rs-2949" data-transition="slidevertical" data-slotamount="1" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="4000"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="4500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                        <img src="{{ asset('webhome/img/home-slider/slider-4.jpg') }}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYER NR. 1 -->
                        <div class="slider_text_box">
                            <div class="tp-caption tp-resizeme secand_text"
                                data-x="['center','center','center','center','center','center']"
                                data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']"
                                data-voffset="['0','0','0','0','0']"
                                data-fontsize="['48','48','48','28','28','22']"
                                data-lineheight="['60','60','60','36','36','30']"
                                data-width="100%"
                                data-height="none"
                                data-whitespace="normal"
                                data-type="text"
                                data-responsive_offset="on"
                                data-transform_idle="o:1;"
                                data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:4500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:4500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                data-textAlign="['center','center','center','center','center','center']"

                                style="z-index: 8;font-family:'Poppins', sans-serif;font-weight:700;color:#fff;"><center>“Do All Roads Lead to Jerusalem? </center> <center>The Making of Indian Religions.”</center>
                            </div>

                            <div class="tp-caption tp-resizeme slider_button"
                                data-x="['center','center','center','center','center','center']"
                                data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']"
                                data-voffset="['130','130','130','100','100','100']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-type="text"
                                data-responsive_offset="on"
                                data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:4500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:4500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                data-textAlign="['center','center','center','center','center','center']">
                                <a class="bg_btn" href="{{ url('/cattype/books') }}">More books</a>
                                <a class="tp_btn" href="{{ url('/artpage/online-resources') }}">Articles and notes</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!--================End Slider Area =================-->

        <!--================Creative Feature Area =================-->
        <section class="creative_feature_area">
            <div class="container">
               <!--  <div class="c_feature_box">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="c_box_item">
                               <center> <a href="#"><h4><i class="fa fa-book" aria-hidden="true"></i> Books </h4></a>
                               <img src="{{ asset('webhome/img/books.png') }}" alt="" width="200" height="170"></center>
                            </div>
                        </div>
                         <div class="col-lg-4">
                            <div class="c_box_item">
                                <center><a href="#"><h4><i class="fa fa-globe" aria-hidden="true"></i> Online Resources</h4></a>
                               <img src="{{ asset('webhome/img/links.png') }}" alt="" width="200" height="170"></center>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="c_box_item">
                                <center><a href="#"><h4><i class="fa fa-phone" aria-hidden="true"></i> Contact</h4></a>
                               <img src="{{ asset('webhome/img/research.png') }}" alt="" width="200" height="170"></center>
                            </div>
                        
                        </div>
                    </div>
                </div> -->
                <div class="digital_feature p_100">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="d_feature_text">
                                <div class="main_title">
                                    <h6>The research centre grew out of the research programme Vergelijkende Cultuurwetenschap (Comparative Science of Cultures), developed by S.N. Balagangadhara (Balu)</h6>
                                </div>
                                <p>This research programme was born in the 1980s, from a dissatisfaction with the available descriptions of, and theorising about, India. To find out what was wrong with these descriptions, it was necessary to turn to the larger frameworks that produced them: the existing social sciences and humanities. And this, in turn, led to the next step: examining the culture that had brought forth these social sciences, namely, Western culture. </p>
                                <br>
                                <p>It soon became clear that the current descriptions of India tell us more about the culture that produced them than about Indian culture. Rather than describing India, they describe the way in which Western culture has experienced another culture. This would not be a problem, if only these descriptions were taken for what they are – descriptions of the experiences of one culture. Unfortunately, that is not the case. They are reproduced as though they offer knowledge about Indian culture. </p>
                                <br>
                                <p>More generally, the current crop of social sciences and humanities is presented as knowledge about human beings and their societies and cultures. Still, its theorising generally mistakes the Western cultural experience for a universal human experience and reduces all other cultures to (pale and erring) variants of the West. To go beyond the limits of the current theorising, then, the first challenge is to understand Western culture: understanding how the West has described Asian cultures like India, and the social world in general, is to begin the process of understanding Western culture itself. </p>

                                <a class="" style="text-decoration:underline" href="{{ url('/thispage/about-us') }}">Read more</a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="d_feature_img">
                                <center><img src="{{ asset('webhome/img/feature-right.png') }}" alt=""></center>
                                <div style="background-color: #ffffff; padding: 10px;">
                                    <center><p>In the picture: <br>A 2017 publication edited by Martin Fárek, <br>Dunkin Jalki, Suﬁya Pathan and Prakash Shah</p></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Creative Feature Area =================-->

        <!--================Industries Area =================-->
        <!--<section class="industries_area">
            <div class="left_indus">
                <div class="indus_img">
                    <img src="{{ asset('webhome/img/indus-laptop.png') }}" alt="">
                </div>
            </div>
            <div class="right_indus">
                <div class="indus_text">
                    <div class="main_title">
                        <h2>We Serve All Industries</h2>
                        <p>We stay on top of our industry by being experts in yours. We measure our success by the results we drive for our clients.</p>
                    </div>
                    <div class="our_skill_inner">
                        <div class="single_skill">
                            <h3>Website Design</h3>
                            <div class="progress" data-value="90">
                                <div class="progress-bar">
                                    <div class="progress_parcent"><span class="counter">90</span>%</div>
                                </div>
                            </div>
                        </div>
                        <div class="single_skill">
                            <h3>Brand Strategy</h3>
                            <div class="progress" data-value="95">
                                <div class="progress-bar">
                                    <div class="progress_parcent"><span class="counter">95</span>%</div>
                                </div>
                            </div>
                        </div>
                        <div class="single_skill">
                            <h3>Digital Marketing</h3>
                            <div class="progress" data-value="85">
                                <div class="progress-bar">
                                    <div class="progress_parcent"><span class="counter">85</span>%</div>
                                </div>
                            </div>
                        </div>
                        <div class="single_skill">
                            <h3>Website Development</h3>
                            <div class="progress" data-value="90">
                                <div class="progress-bar">
                                    <div class="progress_parcent"><span class="counter">90</span>%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="read_btn" href="#">Work with us</a>
                </div>
            </div>
        </section>-->
        <!--================End Industries Area =================-->

        <!--================Our Service Area =================-->
        <section class="service_area">
            <div class="container">
                <div class="center_title">
                   
                </div>
                <div class="row service_item_inner">
                    <div class="col-lg-4">
                        <div class="service_item">
                            <i class="ti-view-list-alt"></i>
                            <h4><a href="{{ url('/linktype/projects') }}">Projects</a></h4>
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service_item">
                            <i class="ti-time"></i>
                            <h4><a href="{{ url('/arttype/events') }}">Events</a></h4>
                           
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service_item">
                            <i class="ti-announcement"></i>
                            <h4><a href="{{ url('/arttype/conferences') }}">Conferences</a></h4>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Our Service Area =================-->

        
         <section >
            
                <div class="service_area_testimonial">
                   <div class="col-lg-12">
                        <div class="service_itemt">
                <div class="indus_imgt">
                    <img src="{{ asset('webhome/img/quotation.png') }}" alt="">
                </div>
                           <h2>Critique and appreciations <br>of the research programme</h2><br>
                            <h4><a href="{{ url('/thispage/what-others-have-said-about-the-research-programme') }}">Click Here</a></h4>
                           
                        </div>
                </div>
                
          
        </section>


        <!--================Testimonials Area =================-->
        <!-- <section class="testimonials_area p_100"> -->
            <!-- <div class="container">
                <div class="testimonials_slider owl-carousel">
                    <div class="item">
                        <div class="media">
                            <img class="d-flex rounded-circle" src="img/testimonials-1.png" alt="">
                            <div class="media-body">
                                <img src="{{ asset('webhome/img/dotted-icon.png') }}" alt="">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <h4><a href="#">Anonymous</a> </h4>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="media">
                            <img class="d-flex rounded-circle" src="img/testimonials-1.png" alt="">
                            <div class="media-body">
                                <img src="{{ asset('webhome/img/dotted-icon.png') }}" alt="">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <h4><a href="#">Anonymous</a> </h4>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="media">
                            <img class="d-flex rounded-circle" src="img/testimonials-1.png" alt="">
                            <div class="media-body">
                                <img src="{{ asset('webhome/img/dotted-icon.png') }}" alt="">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <h4><a href="#">Anonymous</a> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        <!-- </section> -->
        <!--================End Testimonials Area =================-->

        <!--================Project Area =================-->
      <!--  <section class="project_area">
            <div class="container">

                <ul class="rslides">
                <li><img src="{{ asset('webhome/img/home-slider/1.jpg') }}"  alt="">
                    <p class="caption">Book Launch Augustijnenklooster</p></li>
                <li><img src="{{ asset('webhome/img/home-slider/2.jpg') }}"  alt="">
                <p class="caption">RRI IV SDM</p></li>
                <li><img src="{{ asset('webhome/img/home-slider/3.jpg') }}"  alt="">
                <p class="caption"></p></li>
                <li><img src="{{ asset('webhome/img/home-slider/4.jpg') }}"  alt="">
                <p class="caption"></p></li>
                <li><img src="{{ asset('webhome/img/home-slider/5.jpg') }}"  alt="">
                <p class="caption"></p></li>
                <li><img src="{{ asset('webhome/img/home-slider/6.jpg') }}"  alt="">
                <p class="caption"></p></li>
                <li><img src="{{ asset('webhome/img/home-slider/7.jpg') }}"  alt="">
                <p class="caption"></p></li>
                <li><img src="{{ asset('webhome/img/home-slider/8.jpg') }}"  alt="">
                <p class="caption">Gent</p></li>
                <li><img src="{{ asset('webhome/img/home-slider/9.jpg') }}"  alt="">
                <p class="caption"></p></li>
                <li><img src="{{ asset('webhome/img/home-slider/10.jpg') }}"  alt="">
                <p class="caption"></p></li>
                <li><img src="{{ asset('webhome/img/home-slider/11.jpg') }}"  alt="">
                <p class="caption">Ghost</p></li>
                
                </ul>
               
            </div>
        </section> -->
        <!--================End Project Area =================-->

        <!--================Latest News Area =================-->
       <!--  <section class="latest_news_area p_100">
            <div class="container">
                <div class="b_center_title">
                    <h2>Books</h2>
                    
                </div>
                <div class="l_news_inner">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="l_news_item">
                                <div class="l_news_img"><a href="#"><img class="img-fluid" src="{{ asset('webhome/img/blog/l-news/l-news-1.jpg') }}" alt=""></a></div>
                                <div class="l_news_content">
                                    <a href="#"><h4>The Heathen in his Blindness. Asia, the West and the Dynamics of Religion.</h4></a>
                                    <p>This critique of Western scholarship on Eastern religions holds that religion is important to the West because the constitution and the identity of Western culture are tied to the dynamic of Christianity as a religion. Through discussions of Hinduism, this volume shows how non-Western cultures and religions differ from descriptions prevalent in the West.</p>
                                     <b>S.N. Balagangadhara</b> <br />
                                    <b>1994</b> <br />
                                    <a class="more_btn" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="l_news_item">
                                <div class="l_news_img"><a href="#"><img class="img-fluid" src="{{ asset('webhome/img/blog/l-news/l-news-2.jpg') }}" alt=""></a></div>
                                <div class="l_news_content">
                                    <a href="#"><h4>Reconceptualising India Studies</h4></a>
                                    <p>This book asserts that postcolonial studies and modern India studies are in need of theoretical rejuvenation. Post Said's Orientalism, postcolonialism, as a discipline, has drifted into the realm of paralysing self-reflection and impenetrable jargon. This volume addresses the original concerns of postcolonial studies and the central problems of modern India studies, and points out a potential direction for the social-scientific study of the Indian culture at a time when it is being challenged from all sides.</p>
                                     <b>S.N. Balagangadhara</b> <br />
                                    <b>2012</b> <br />
                                    <a class="more_btn" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="l_news_item">
                                <div class="l_news_img"><a href="#"><img class="img-fluid" src="{{ asset('webhome/img/blog/l-news/l-news-3.jpg') }}" alt=""></a></div>
                                <div class="l_news_content">
                                    <a href="#"><h4>As Others See Us. A Conversation on Cultural Differences.</h4></a>
                                    <p>At this time, all cultures are studied through the prism of western scholarship. This results in a distortion that denies peoples from other cultures an access to their own experience. An examination of some key ideas drawn from Indian and western culture highlights the nature of the problem and the conceptual constraints imposed by western scholarship.</p>
                                    <b>Jakob De Roover</b> <br />
                                    <b>2016</b> <br />
                                    <a class="more_btn" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!--================End Latest News Area =================-->

        <!--================Footer Area =================-->
        <footer class="footer_area">
            <!--<div class="footer_widgets_area">
                <div class="container">
                    <div class="f_widgets_inner row">
                        <div class="col-lg-3 col-md-6">
                            <aside class="f_widget subscribe_widget">
                                <div class="f_w_title">
                                    <h3>Our Newsletter</h3>
                                </div>
                                <p>Subscribe to our mailing list to get the updates to your email inbox.</p>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="E-mail" aria-label="E-mail">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary submit_btn" type="button">Subscribe</button>
                                    </span>
                                </div>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <aside class="f_widget twitter_widget">
                                <div class="f_w_title">
                                    <h3>Twitter Feed</h3>
                                </div>
                                <div class="tweets_feed"></div>
                            </aside>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <aside class="f_widget categories_widget">
                                <div class="f_w_title">
                                    <h3>Link Categories</h3>
                                </div>
                                <ul>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Agency</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Studio</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Studio</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Blogs</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Shop</a></li>
                                </ul>
                                <ul>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Home</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>About</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Services</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Work</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Privacy</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <aside class="f_widget contact_widget">
                                <div class="f_w_title">
                                    <h3>Contact Us</h3>
                                </div>
                                <a href="#">1 (800) 686-6688</a>
                                <a href="#">info.deercreative@gmail.com</a>
                                <p>40 Baria Sreet 133/2 <br />NewYork City, US</p>
                                <h6>Open hours: 8.00-18.00 Mon-Fri</h6>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="copy_right_area">
                <div class="container">
                    <div class="float-md-left">
                        <h5>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</h5>
                    </div>
                    <!--<div class="float-md-right">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Disclaimer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Privacy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Advertisement</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact us</a>
                            </li>
                        </ul>
                    </div>-->
                </div>
            </div>
        </footer> 
        <!--================End Footer Area =================-->

@endsection

