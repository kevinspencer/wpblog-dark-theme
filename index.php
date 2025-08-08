<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<script>
  (function() {
    if (localStorage.getItem('theme') !== 'light') {
      // Add the class, as before.
      document.documentElement.classList.add('dark');

      // ALSO, create and inject a style tag directly into the head.
      var style = document.createElement('style');
      style.id = 'critical-dark-style-test'; // We give it an ID to look for it later
      style.innerHTML = 'html.dark body { background-color: #1e1e1e !important; }';
      document.head.appendChild(style);
    }
  })();
</script>
	
<meta name="viewport" content="width=device-width; initial-scale=1.0" />
<title><?php bloginfo('name'); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link type="text/plain" rel="author" href="https://kevinspencer.org/humans.txt" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start header
	/*-----------------------------------------------------------------------------------*/
?>

<header id="masthead" class="site-header" role="banner">
	<div class="container">
		<div class="gravatar">
			<img alt='' src='https://secure.gravatar.com/avatar/ea536388aafad2d72f3cc0deb19a1a56?s=100&#038;d=retro&#038;r=x' srcset='https://secure.gravatar.com/avatar/ea536388aafad2d72f3cc0deb19a1a56?s=200&#038;d=retro&#038;r=x 2x' class='avatar avatar-100 photo' height='100' width='100' loading='lazy'/>
		</div>
		
		<div id="brand">
			<!--<span><h1 class="site-title"><a href="https://kevinspencer.org" title="kevin spencer" rel="home">kevin spencer</a> <span> - into the cauldron, handsome! 🎧</span></h1></span>-->
			<span><h1 class="site-title"><a href="https://kevinspencer.org" title="kevin spencer" rel="home">kevin spencer</a> <span><?php require 'slug.php' ?></span></h1></span>
		</div><!-- /brand -->
	
		<nav role="navigation" class="site-navigation main-navigation">
			<div class="menu"><ul>
<li class="page_item page-item-1437"><a href="https://kevinspencer.org/posts/">posts</a></li>
<!--<li class="page_item page-item-1437"><a href="https://kevinspencer.org/stream/">stream</a></li>-->
<li class="page_item page-item-1796 current_page_item"><a href="https://kevinspencer.org/linkblog/" aria-current="page">linkblog</a></li>
<li class="page_item page-item-1437"><a href="https://kevinspencer.org/photography/">photography</a></li>
<li class="page_item page-item-1437"><a href="https://kevinspencer.org/about">about</a></li>
</ul></div>
		</nav><!-- .site-navigation .main-navigation -->
		
		<div class="clear"></div>
	</div><!--/container -->
		
</header><!-- #masthead .site-header -->

<!--<div class="container">-->

<?php if( is_page( 'photography' )) : ?>
	<div class="container-big">
<?php else : ?>
	<div class="container">
<?php endif; ?>

	<div id="primary">
		<div id="content" role="main">


<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Home loop
	/*-----------------------------------------------------------------------------------*/
	
	if( is_home() || is_archive() ) {
	
?>
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article class="post">
					
						<h1 class="title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_title() ?>
							</a>
						</h1>
						
						<div class="the-content">
							
							<?php the_content( 'Continue...' ); ?>
							
							<?php wp_link_pages(); ?>
						</div><!-- the-content -->
						<div class="post-meta">
								<span class="comments-link">
									<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_time('g:i a') ?>, <?php the_time('j M Y') ?></a> <?php if (comments_open()) : ?>with <i class="fa-regular fa-comments"></i> <a href="<?php the_permalink() ?>"><?php comments_number('no comments', '1 comment', '% comments'); ?></a><?php else :?><?php if (get_comments_number() > 0) : ?>with <i class="fa-regular fa-comments"></i> <a href="<?php the_permalink() ?>"><?php comments_number('no comments', '1 comment', '% comments'); ?></a><?php endif; ?><?php endif; ?>
								</span>
						
						</div>
						<div class="tag-meta">
                                                   <?php the_tags('more: ', ', ', ''); ?>
                                                </div>

					</article>
                    
			        <div class="article-spacer-hr"></div>
			
				<?php endwhile; ?>
				
				<!-- pagintation -->
				<div id="pagination" class="clearfix">
					<div class="past-page"><?php previous_posts_link( 'Newer &rarr;' ); ?></div>
					<div class="next-page"><?php next_posts_link( ' &larr; Older' ); ?></div>
				</div><!-- pagination -->


			<?php else : ?>
				
				<article class="post error">
					<h1 class="404">Nothing posted yet</h1>
				</article>

			<?php endif; ?>

		
	<?php } //end is_home(); ?>

<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Single loop
	/*-----------------------------------------------------------------------------------*/
	
	if( is_single() ) {
?>


			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article class="post">
					
						<h1 class="title"><?php the_title() ?></h1>
						<!--<div class="post-meta">
					
								<span class="comments-link">
									by <a href="https://kevinspencer.org">kevin</a>  
		<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_time('j F Y') ?></a> <?php if ( comments_open() ) : ?>with <?php comments_popup_link('no comments', '1 comment', '% comments'); ?> <?php endif; ?>
								
					
						
						</div>-->
						
						<div class="the-content">
							<?php the_content( 'Continue...' ); ?>
							
							<?php wp_link_pages(); ?>
						</div><!-- the-content -->
							<div class="post-meta">
								<span class="comments-link">
									<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_time('g:i a') ?>, <?php the_time('j M Y') ?></a> <?php if (comments_open()) : ?>with <i class="fa-regular fa-comments"></i> <a href="<?php the_permalink() ?>"><?php comments_number('no comments', '1 comment', '% comments'); ?></a><?php else :?><?php if (get_comments_number() > 0) : ?>with <i class="fa-regular fa-comments"></i> <a href="<?php the_permalink() ?>"><?php comments_number('no comments', '1 comment', '% comments'); ?></a><?php endif; ?><?php endif; ?>
								</span>
						
						</div>
		                                <div class="tag-meta">
                                                  <?php the_tags('more: ', ', ', ''); ?>
                                                </div> 
				
						
					</article>

				<?php endwhile; ?>
				
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>


			<?php else : ?>
				
				<article class="post error">
					<h1 class="404">Nothing posted yet</h1>
				</article>

			<?php endif; ?>


	<?php } //end is_single(); ?>
	
<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Page loop
	/*-----------------------------------------------------------------------------------*/
	
	if( is_page()) {
?>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article class="post">
						
						<div class="the-content">
							<?php the_content(); ?>
							
							<?php wp_link_pages(); ?>
						</div><!-- the-content -->
						
					</article>

				<?php endwhile; ?>

			<?php else : ?>
				
				<article class="post error">
					<h1 class="404">Nothing posted yet</h1>
				</article>

			<?php endif; ?>

	<?php } // end is_page(); ?>

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->

</div><!-- / container-->

<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Footer
	/*-----------------------------------------------------------------------------------*/
?>

<footer>
	<div class="site-info container">
		<a href="https://flickr.com/photos/vek/" title="me on flickr"><i class="fa-brands fa-flickr fa-xl"></i></a>&nbsp;&nbsp;
        <a href="https://github.com/kevinspencer" title="me on github"><i class="fa-brands fa-github fa-xl"></i></a>&nbsp;&nbsp;
<a href="https://www.last.fm/user/kevinspencer" title="me on last.fm"><i class="fa-brands fa-lastfm fa-xl"></i></a>&nbsp;&nbsp;
<a href="https://pinboard.in/u:kevinspencer" title="me on pinboard"><i class="fa fa-thumb-tack fa-xl"></i></a>&nbsp;&nbsp;
<a href="https://kevinspencer.org/posts/feed/" title="rss feed"><i class="fa fa-rss fa-xl"></i></a>
<br>
		made by me in sandland
	</div>
</footer>

<button id="theme-toggle" aria-label="Toggle dark mode">
  <span id="theme-icon">🌙</span>
</button>

		<?php wp_footer(); ?>
		
</body>
</html>
