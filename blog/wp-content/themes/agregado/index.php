<?php get_header(); ?>

<div class="clearfloat">
<div id="content">

<?php
	$postcount = 0;
	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	query_posts( 'paged=$page&showposts=9' );
	if (have_posts()) { while (have_posts()) { the_post(); 
		if( $postcount == 0 ) { 
		//GETS LATEST POST
?>
			
		<div id="latest" class="entry">
			
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					
			<p class="postmetadata">Posted <em>by</em> <?php the_author(); ?> <em>&bull;</em> <?php the_time('M j, Y') ?>  </p>
				
			<?php the_excerpt(); ?>

                </div><!--END LATEST-->

<ul id="headlines">		
<?php
		} elseif( $postcount > 0 && $postcount <= 4 ) { 
		//GETS MORE EXCERPTS
?>
		<li id="headline-<?php echo $postcount; ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> 
&nbsp;<span class="commentcount">(<?php comments_popup_link('0', '1', '%'); ?>)</span>

<span class="heading-<?php echo $postcount; ?>"><?php the_excerpt(); ?></span></li>

<?php


		}
		$postcount ++;
		// close the loop
		} 
	}
?>
</ul>

<a href="<?php bloginfo('url'); ?>/?page_id=189" class="button">&laquo;Older Posts</a>
</div><!--END CONTENT-->




<div id="sidebar">

<h3>Find <em>me</em> Elsewhere</h3>

<?php lifestream(); ?>





<h3>My Profile</h3>
<div class="module">
<?php query_posts('showposts=1'); ?>
<?php while (have_posts()) : the_post(); ?>
<?php echo get_avatar( get_the_author_email(), '56' ); ?>

<p><?php the_author_description(); ?></p>
<?php endwhile; ?>

</div>
</div><!--END SIDEBAR-->

</div><!--END FLOATS-->
</div><!--END TOP-->
</div><!--END WRAPPER-->

<!-- moved middle to middle.php -->



<?php get_footer(); ?>
