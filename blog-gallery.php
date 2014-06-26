<?php
/*
Template Name: Blog Gallery
*/


/* configuration variables */
$date = false;
$posts_per_page = -1;
/* iterators */
$i = 0;
$j = 0;

get_header(); ?>

	<!-- Middle Starts -->
	<div id="middle-out-top">
	<div id="middle-out-bottom">
	<div id="middle-content" class="full">
	<div id="middle-content-bottom" class="full">
		<!-- Content Starts -->
		<div id="content" class="wrap full custom-grid-blog-full">
			
				<div id="main-content" class="fullwidth grid-blog">
				<?php
					query_posts(
    					array('post_type' => 'post', 'posts_per_page' => $posts_per_page)
					);
				?>
				<!-- Blog Gallery Starts Here -->
					
					<div id="gridContainer">
						<?php
							/* get the number of posts and adjust for 0 index */
							$posts_count = $wp_query->post_count;
							$number_of_posts = $posts_count - 2;
							echo '<div class="row">';
							if(have_posts()) :
								while(have_posts()) :
									the_post();
								/* start outputting post gird */
								$img = catch_that_image();
								if($img == "/path/to/default.png"){
									$x = $number_of_posts;
									$number_of_posts = $x - 1;
								} else {
									echo '<div class="grid-div">';
									echo '<a class="grid-post-link" href="';
									echo the_permalink();
									echo '">';
									echo '<div class="grid-img-block">';
									echo '<img class="grid-post-img" src="';
		 							echo $img;
					 				echo '" alt="" />';
					 				echo '</div>';
					 				echo '<div class="grid-text-block">';
					 				echo '<div class="grid-text">';
					 				echo the_title();
					 				echo '</div>';
					 				if ($date == true){
										echo '<div class="grid-text-post-date">';
										echo the_date();
										echo '</div>';
									}
					 				echo '</div>';
					 				echo '</a>';
					 				echo '<div class="grid-text-social-icons">';
					 				echo '<div class="sharedaddy sd-sharing-enabled custom-grid-sd">';
									echo '<div class="robots-nocontent sd-block sd-social sd-social-icon sd-sharing custom-grid-sd-block">';
									echo '<div class="sd-content custom-grid-sd-content">';
									echo '<ul>';
									echo '<li class="share-facebook">';
									echo '<a rel="nofollow" target="_blank" class="share-facebook sd-button share-icon no-text" href="';
									echo the_permalink();
									echo '?share=facebook&amp;nb=1" title="Share on Facebook" id="sharing-facebook-9333">';
									echo '</a></li>';
									echo '<li class="share-linkedin">';
									echo '<a rel="nofollow" target="_blank" class="share-linkedin sd-button share-icon no-text" href="';
									echo the_permalink();
									echo '?share=linkedin&amp;nb=1" title="Click to share on LinkedIn" id="sharing-linkedin-9333">';
									echo '</a></li>';
									echo '<li class="share-twitter">';
									echo '<a rel="nofollow" target="_blank" class="share-twitter sd-button share-icon no-text" href="';
									echo the_permalink();
									echo '?share=twitter&amp;nb=1" title="Click to share on Twitter" id="sharing-twitter-9333">';
									echo '</a></li>';
									echo '<li class="share-google-plus-1"><a rel="nofollow" target="_blank" class="share-google-plus-1 sd-button share-icon no-text" href="';
									echo the_permalink();
									echo '?share=google-plus-1&amp;nb=1" title="Click to share on Google+" id="sharing-google-9333">';
									echo '</a></li>';
									echo '<li class="share-pinterest">';
									echo '<a rel="nofollow" target="_blank" class="share-pinterest sd-button share-icon no-text" href="';
									echo the_permalink();
									echo '?share=pinterest&amp;nb=1" title="Click to share on Pinterest">';
									echo '</a></li><li class="share-end"></li></ul></div></div></div>';
					 				echo '</div>';
					 				echo '</div>';
					 				if($j >= $number_of_posts){
					 					echo '</div>';	
					 				} else {
					 					if($i == 2) {
											echo '</div><div class="row">';
											$i = 0;
											$j++;
					 					} else {
					 						$i++;
					 						$j++;
					 					}
					 				}
					 			}
								endwhile;
							endif;
						?>
						</div>
					
						

					</div>
						<!-- Blog Gallery Ends -->
						
				</div>
				
				
			
			
		</div>
		<!-- Content Ends -->
	</div>
	</div>
	</div>
	</div>
	<!-- Middle Ends -->
	<?php get_footer(); ?>