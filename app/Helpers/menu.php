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