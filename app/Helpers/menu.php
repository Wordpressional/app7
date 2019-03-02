<?php

function bootstrapItems($items) {
	//dd($items);
	
	foreach( $items as $item ) {
		
	
	?>
		<li <?php if($item['child']) {?> class="dropdown"<?php } ?>>
		<a href="<?php print_r( $item['link']); ?>" <?php if($item['child']) {?> class="dropdown-toggle" data-toggle="dropdown" <?php } ?>>
		 <?php print_r( $item['label']); ?> <?php if($item['child']); { ?> <b class="caret"></b> <?php } ?></a>
		<?php if($item['child']) {?>
		<ul class="dropdown-menu">
		<?php bootstrapItems( $item['child'] ) ?>
		</ul> 
		<?php } ?>
		</li>
	 <?php
	}
}

function TopMenuItems($items) {
//dd($items[2]['child']);

foreach( $items as $item ) {
	

/*?>

<li <?php if($item['child']) {?> class="dropdown nav-item"<?php } ?>>
<a class="nav-link" href="<?php print_r( $item['link']); ?>" <?php if($item['child']) {?> class="dropdown-toggle" data-toggle="dropdown" <?php } ?>>
 <?php print_r( $item['label']); ?> <?php if($item['child']) { ?> &nbsp;&nbsp;<span class="icon-cogw"><i class="fa fa-angle-down"></i></span></a> <?php } ?>
<?php if($item['child']) {?>
<ul class="dropdown-menu">
<?php TopMenuItems( $item['child'] ) ?>
</ul> 
<?php } */?>



<li <?php if($item['child'] != []) {?> class="dropdown " <?php } ?>>
  <a class="fly" href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
  <?php if($item['child']) {?>

  <ul class="dd">
   <?php links( $item['child'] ) ?>
  </ul>
</li>


 <?php

}
}
}

function links($items) {
//dd($items);

foreach( $items as $item ) 
{

?>
<li>
	<a href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
</li>
<?php
}
}


function ResponsiveMenuItems($items) {
//dd($items[2]['child']);
//dd($items);

foreach( $items as $key => $item ) {
	?>
 
 
<?php if($item['child'] != []) {?> 
    <li><a href="#"><?php print_r( $item['label']); ?>
		
        <span class="drop-icon">▾</span>
        <label title="Toggle Drop-down" class="drop-icon" for="sm1<?php echo $key; ?>">▾</label>
      </a>
      <input type="checkbox" id="sm1<?php echo $key; ?>">
      <ul class="sub-menu1">
        <?php rlinks( $item['child'] ) ?>
          
       
      </ul>
    </li>
   
<?php
} else {
	?>

	<li><a href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
</li>
<?php
}
}
}


function rlinks($items) {
//dd($items);

foreach( $items as $key => $item ) 
{

?>

<?php if($item['child'] != []) {?> 
    <li><a href="#"><?php print_r( $item['label']); ?> 
        <span class="drop-icon">▾</span>
        <label title="Toggle Drop-down" class="drop-icon" for="sm2<?php echo $key; ?>">▾</label>
      </a>
      <input type="checkbox" id="sm2<?php echo $key; ?>">
      <ul class="sub-menu1">
        <?php rslinks( $item['child'] ) ?>
          
       
      </ul>
    </li>
   

<?php
} else {
	?>

	<li><a href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
</li>
<?php
}
}
}


function rslinks($items) {
//dd($items);

foreach( $items as $key => $item ) 
{

?>
<li>
	<a href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
</li>
<?php
}
}

function loanmenuItems($items) {
	//dd($items);
	
	foreach( $items as $item ) {
		
	
	?>
		
		<?php if($item['child'] != []) {?>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		 <?php print_r( $item['label']); ?> </a>
			
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		<?php loanmenuItemschild( $item['child'] ) ?>
		</div>
		
		</li>
		<?php } else {?>
		<li class="nav-item" >
		<a class="nav-link" href="<?php print_r( $item['link']); ?>"  >
		 <?php print_r( $item['label']); ?> </a>
		 </li>
	 <?php
	}
}
}
function loanmenuItemschild($items) {

	foreach( $items as $item ) {
		
	
	?>


			
		<a  href="<?php print_r( $item['link']); ?>" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
		 <?php print_r( $item['label']); ?>   </a>
		 
	 <?php
	}
}

function PoliticsMenuItems($items) {
	//dd($items);
	
	foreach( $items as $item ) {
		
	
	?>
		
		<?php if($item['child'] != []) {?>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		 <?php print_r( $item['label']); ?> </a>
			
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		<?php politicsmenuItemschild( $item['child'] ) ?>
		</div>
		
		</li>
		<?php } else {?>
		<li class="nav-item" >
		<a class="nav-link" href="<?php print_r( $item['link']); ?>"  >
		 <?php print_r( $item['label']); ?> </a>
		 </li>
	 <?php
	}
}
}

function politicsmenuItemschild($items) {

	foreach( $items as $item ) {
		
	
	?>


			
		<a  href="<?php print_r( $item['link']); ?>" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
		 <?php print_r( $item['label']); ?>   </a>
		 
	 <?php
	}
}

function OxygenMenuItems($items) {
	//dd($items);
	
	foreach( $items as $item ) {
		
	
	?>
		
		<?php if($item['child'] != []) {?>
		<li class="nav-item dropdown scroll">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		 <?php print_r( $item['label']); ?> </a>
			
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		<?php oxygenmenuItemschild( $item['child'] ) ?>
		</div>
		
		</li>
		<?php } else {?>
		<li class="nav-item scroll" >
		<a class="nav-link" href="<?php print_r( $item['link']); ?>"  >
		 <?php print_r( $item['label']); ?> </a>
		 </li>
	 <?php
	}
}
}

function oxygenmenuItemschild($items) {

	foreach( $items as $item ) {
		
	
	?>


			
		<a  href="<?php print_r( $item['link']); ?>" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
		 <?php print_r( $item['label']); ?>   </a>
		 
	 <?php
	}
}

function AboutMenuItems($items) {
	//dd($items);
	
	foreach( $items as $item ) {
		
	
	?>
		
		<?php if($item['child'] != []) {?>
		<li class="nav-item dropdown ">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		 <span class="icon-cog"><?php print_r( $item['label']); ?> </span></a>
			
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		<?php aboutmenuItemschild( $item['child'] ) ?>
		</div>
		
		</li>
		<?php } else {?>
		<li class="nav-item" >
		<a class="nav-link" href="<?php print_r( $item['link']); ?>"  >
		<span class="icon-cog"> <?php print_r( $item['label']); ?> </span></a>
		 </li>
	 <?php
	}
}
}

function aboutnmenuItemschild($items) {

	foreach( $items as $item ) {
		
	
	?>


			
		<a  href="<?php print_r( $item['link']); ?>" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
		 <?php print_r( $item['label']); ?>   </a>
		 
	 <?php
	}
}

function OrangeMenuItems($items) {
//dd($items[2]['child']);

foreach( $items as $item ) {
?>



<li <?php if($item['child'] != []) {?> class="dropdown " <?php } ?>>
  <a class="fly" href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
  <?php if($item['child']) {?>

  <ul class="dd">
   <?php olinks( $item['child'] ) ?>
  </ul>
</li>


 <?php

}
}
}

function olinks($items) {


foreach( $items as $item ) 
{

?>
<li>
	<a href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
</li>
<?php
}
}

function MultiMenuItems($items) {
//dd($items[2]['child']);

foreach( $items as $item ) {
?>



<li <?php if($item['child'] != []) {?> class="dropdown " <?php } ?>>
  <a class="scroll" href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
  <?php if($item['child']) {?>

  <ul class="dd">
   <?php mlinks( $item['child'] ) ?>
  </ul>
</li>


 <?php

}
}
}

function mlinks($items) {


foreach( $items as $item ) 
{

?>
<li>
	<a class="scroll" href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
</li>
<?php
}
}

function StickyMenuItems($items) {
//dd($items[2]['child']);

foreach( $items as $item ) {
?>



<li <?php if($item['child'] != []) {?> class="dropdown " <?php } ?>>
  <a href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
  <?php if($item['child']) {?>

  <ul class="dd">
   <?php stlinks( $item['child'] ) ?>
  </ul>
</li>


 <?php

}
}
}

function stlinks($items) {


foreach( $items as $item ) 
{

?>
<li>
	<a  href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
</li>
<?php
}
}

function CyanMenuItems($items) {
//dd($items[2]['child']);

foreach( $items as $item ) {
?>



<li <?php if($item['child'] != []) {?> class="dropdown" <?php } ?>>
  <a href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
  <?php if($item['child']) {?>

  <ul class="dd">
   <?php cylinks( $item['child'] ) ?>
  </ul>
</li>


 <?php

}
}
}

function cylinks($items) {


foreach( $items as $item ) 
{

?>
<li>
	<a  href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
</li>
<?php
}
}

function GreenMenuItems($items) {
//dd($items[2]['child']);

foreach( $items as $item ) {
?>



<li <?php if($item['child'] != []) {?> class="dropdown" <?php } ?>>
  <a href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
  <?php if($item['child']) {?>

  <ul class="dd">
   <?php greenlinks( $item['child'] ) ?>
  </ul>
</li>


 <?php

}
}
}

function greenlinks($items) {


foreach( $items as $item ) 
{

?>
<li>
	<a  href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
</li>
<?php
}
}

function FbubbleMenuItems($items) {
//dd($items[2]['child']);

foreach( $items as $item ) {
?>



<li <?php if($item['child'] != []) {?> class="dropdown" <?php } ?>>
  <a href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
  <?php if($item['child']) {?>

  <ul class="dd">
   <?php Fbubblelinks( $item['child'] ) ?>
  </ul>
</li>


 <?php

}
}
}

function Fbubblelinks($items) {


foreach( $items as $item ) 
{

?>
<li>
	<a  href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
</li>
<?php
}
}

function FtabbedMenuItems($items) {
//dd($items[2]['child']);

foreach( $items as $item ) {
?>



<li <?php if($item['child'] != []) {?> class="dropdown" <?php } ?>>
  <a href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
  <?php if($item['child']) {?>

  <ul class="dd">
   <?php Ftabbedlinks( $item['child'] ) ?>
  </ul>
</li>


 <?php

}
}
}

function Ftabbedlinks($items) {


foreach( $items as $item ) 
{

?>
<li>
	<a  href="<?php print_r( $item['link']); ?>"><?php print_r( $item['label']); ?>
		
	</a>
</li>
<?php
}
}


