<?php get_header() ?>

	<div class="--border">
		<div class="content">
			<?php 
				$args = array(
				    'post_type' => 'Hero-item',
				    'posts_per_page' => 1,
				);
				$query= new WP_Query($args);
				if ($query->have_posts()) {
				    while ($query->have_posts()) {
				        $query->the_post();
				        ?>	
			<section class="main-n-block-photo__row">
			    <div class="main">	
			        <h1 class="title"><?php the_title(); ?></h1>
			        <div class="description"><?php the_content(); ?></div>
			        <a href="#go-to-service"><button class="button">Try it!</button></a>
			    </div>
			    <div class="block-photo">
			        <img class="content-img" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" width="420px" height="500px" alt="">
			    </div>
			</section>


			 <?php
			    }
			    wp_reset_postdata();
			}
		 ?>

		</div>
	</div>

	<div class="--border" >
		<div class="content">
			<div id="go-to-about-us"></div>

			<?php 
				$args = array(
				    'post_type' => 'About-item',
				    'posts_per_page' => 1,
				);
				$query = new WP_Query($args);
				if ($query->have_posts()) {
				    while ($query->have_posts()) {
				        $query->the_post();
				        ?>	
			<section class="about-us">
				<div class="about-us__text">
					<h2 class="title"><?php the_title(); ?></h2>
					<div class="description"><?php the_content(); ?></div>
				</div>
				<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="" class="content-img">
			</section>


			 <?php
			    }
			    wp_reset_postdata();
			}
		 ?>

			
		</div>
	</div>
		
	<div class="--border">
		<div class="content">
			<div id="go-to-teachers"></div>
			<section class="slider-container">
				<div class="slider">

					<?php 
						$args = array(
						    'post_type' => 'card',
						    'posts_per_page' => -1,
						);

						$query = new WP_Query($args);

						if ($query->have_posts()) {
						    while ($query->have_posts()) {
						        $query->the_post();
						        ?>
						        <div class="slider__item">
						            <?php if (has_post_thumbnail()) {
						                the_post_thumbnail('full', array('class' => 'slider__photo'));
						            } ?>
						            <h3 class="slider__title"><?php the_title(); ?></h3>
						            <div class="slider__description"><?php the_content(); ?></div>
						        </div>
						        <?php
						    }
						    wp_reset_postdata();
						}
					 ?>

					
	    
				</div>
			    <div class="slider-nav">
				    <button class="slider-prev"><div class="arrow-left"></div></button>
				    <button class="slider-next"><div class="arrow-right"></div></button>
				</div>
			</section>
		</div>
	</div>

	<div class="--border" >
		<div class="content">
			<div id="go-to-service"></div>
			<section class="service">
				<h2 class="title" >Our service</h2>
				<div class="service__row">

					<?php 
						$args = array(
						    'post_type' => 'service',
						    'posts_per_page' => 3,
						);

						$query = new WP_Query($args);

						if ($query->have_posts()) {
						    while ($query->have_posts()) {
						        $query->the_post();
						        ?>
									<div class="service__item">
										<div class="service__common service__name">
											<?php the_title() ?>
										</div>	
										<div class="arrow"></div>
										<ul class="service__more-info">	
											<li class="service__common service__schedule">
												<?php echo get_post_meta(get_the_ID(), 'quantity of lessons', true); ?>
											</li>
											<div class="service__line"></div>
											<li class="service__common service__time">
												<?php echo get_post_meta(get_the_ID(), 'lesson duration', true); ?>		
											</li>
											<div class="service__line"></div>
											<li class="service__common service__materials">
												<?php echo get_post_meta(get_the_ID(), 'access to the materials', true); ?>
											</li>
											<div class="service__line"></div>
											<li class="service__common servece__item__price">
												<?php echo get_post_meta(get_the_ID(), 'price', true); ?>$
											</li>
											<div class="service__line"></div>
										
											<button class="button popup-button">Try intensive!</button>
										</ul>
									</div>
						        <?php
						    }
						    wp_reset_postdata();
						}
					 ?>

					

				</div>
			</section>
		</div>
	</div>

	<div class="--border" >
		<div class="content">
			<div id="go-to-contacts"></div>
			

					<?php 
						$args = array(
						    'post_type' => 'contact',
						    'posts_per_page' => 1,
						);
						$query= new WP_Query($args);
						if ($query->have_posts()) {
						    while ($query->have_posts()) {
						        $query->the_post();
						        ?>	
					
					<section class="contact-n-block-photo__row">
						<div class="contact">
							<h2 class="title" ><?php the_title() ?></h2>
							<form data-netlify="true" action="#succes-popup" class="contact__form">
								<input class="input" type="text" name="name:" value="NAME">
								<input class="input" type="email" name="mail:" value="NUMBER OR E-MAIL">
								<button class="button success-popup-button">send</button>
							</form>
						</div>
						<div class="block-photo"><img class="content-img" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt=""></div>
					</section>

					 <?php
					    }
					    wp_reset_postdata();
					}
				 ?>

		</div>
	</div>
</div>


<?php get_footer() ?>