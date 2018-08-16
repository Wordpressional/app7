<div class="icolist">
	<div class="col-md-12">
	<div class="ani1">

	<h2> Hot and trending ICO's</h2>

	</div>
</div>	
<div class="container">
<div class="row">
@foreach($icos as $ico) 
		<div class="col-md-4">
			<div class="ani">
			<img class="circleimg" src="{{ asset('img/photo2.png') }}" />
			<div> Token Name </div>
			<p>Token Symbol </p>
			<p>Category </p>
			<p>29 Days Left </p>
			</div>
		</div>
@endforeach
	
	
		
	
		<div class="col-md-4">

		<div class="b06_3d_swap button"><div><span style="font-size: 10px; color:blue; padding-right:10px;"> View all </span><span>ACTIVE ICO's (5552)</span></div><div><span>Click Here</span></div></div>
		
		</div>
		<div class="col-md-4">
			
		<div class="b06_3d_swap button"><div><span style="font-size: 10px;color:blue; padding-right:10px;"> View all </span><span>UPCOMING ICO's (5516)</span></div><div><span>Click Here</span></div></div>
		
		</div>
		<div class="col-md-4">
			
		<div class="b06_3d_swap button"><div><span style="font-size: 10px;color:blue; padding-right:10px;"> View all </span><span>ENDED ICO's (5556)</span></div><div><span>Click Here</span></div></div>
		
		</div>
</div>	
</div>
</div>

 <style>
 .button {
  
  background-color: #c2c2c2;
  height: 50px;
  width: 340px;
  font-size: 22px;
  font-weight: bold;
  padding: 0px;
  color: #000000;
  margin-top: 25px;
  text-transform: uppercase;
  margin:20px;
  
  
  opacity: .7;
  position: relative;
  text-align: center;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-user-select: none;

}

.button div span{
	color:#000000;

}
.button:hover div span{
	color:#ffffff;
}
.button:hover {
	
    cursor: pointer;

}
.ani
{
	background-color: #FDFEEB;
	
  margin:25px;
  padding:25px;
  border-radius: 15px;
  opacity: .7;
}
.button_base {
    margin: 0;
    border: 0;
    font-size: 18px;
    position: relative;
    top: 50%;
    left: 50%;
    margin-top: -25px;
    margin-left: -100px;
    width: 200px;
    height: 50px;
    text-align: center;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-user-select: none;
    cursor: default;
}

.button_base:hover {
    cursor: pointer;
}


@keyframes skew {
  0% {
    transform: skewX(20deg);
  }
  100% {
    transform: skewX(-20deg);
  }
}

/* ### ### ### 06 */
.b06_3d_swap {
    perspective: 500px;
    -webkit-perspective: 500px;
    -moz-perspective: 500px;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
}

.b06_3d_swap div {
    position: absolute;
    text-align: center;
    width: 100%;
    height: 50px;
    padding: 10px;
    border: #000000 solid 1px;
    pointer-events: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}

.b06_3d_swap div:nth-child(1) {
    color: #000000;
   background-color: #c2c2c2;
    transform: translateZ(0px);
    -webkit-transform: translateZ(0px);
    -moz-transform: translateZ(0px);
    transition: all 0.2s ease;
    -webkit-transition: all 0.2s ease;
    -moz-transition: all 0.2s ease;
    transform-origin: 50% 50% -25px;
    -webkit-transform-origin: 50% 50% -25px;
    -moz-transform-origin: 50% 50% -25px;
}

.b06_3d_swap div:nth-child(2) {
    color: #ffffff;
    background-color: #5A1A54;
    transform: rotateX(90deg);
    -webkit-transform: rotateX(90deg);
    -moz-transform: rotateX(90deg);
    transition: all 0.2s ease 0.05s;
    -webkit-transition: all 0.2s ease 0.05s;
    -moz-transition: all 0.2s ease 0.05s;
    transform-origin: 50% 50% -25px;
    -webkit-transform-origin: 50% 50% -25px;
    -moz-transform-origin: 50% 50% -25px;
}

.b06_3d_swap:hover div:nth-child(1) {
    color: #000000;
    background-color: #808080;
    transition: all 0.2s ease;
    -webkit-transition: all 0.2s ease;
    -moz-transition: all 0.2s ease;
    transform: translateZ(-200px);
    -webkit-transform: translateZ(-200px);
    -moz-transform: translateZ(-200px);
}

.b06_3d_swap:hover div:nth-child(2) {
    color: #ffffff;
    transition: all 0.2s ease 0.05s;
    -webkit-transition: all 0.2s ease 0.05s;
    -moz-transition: all 0.2s ease 0.05s;
    transform: rotateX(0deg);
    -webkit-transform: rotateX(0deg);
    -moz-transform: rotateX(0deg);
}


</style>
