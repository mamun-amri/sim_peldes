<div id="content">
	<div class="container">
		<div class="row margin-vert-30">
			<div class="col-md-12">
				<?php
		        foreach ($jurusan as $row) {
		        ?>
				<div class="blog-post">
					<div class="blog-item-header">
						<h2>
						<a href="#">
							Jurusan <?=$row->jurusan?>
						</a>
						</h2>
					</div>
					<div class="blog-item">
						<div class="clearfix"></div>
						<div class="blog-post-body row margin-top-15">
							<div class="col-md-12">
								<img class="margin-bottom-20" src="<?=base_url()?>template/img/logo-kemenag.png" alt="image1" width="20%">
							</div>
							<div class="col-md-12">
							<?=$row->profil?>
							</div>
						</div>
						<div class="blog-item-footer">                                               
                           <div id="disqus_thread"></div>
							<script>

							/**
							*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
							*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
							/*
							var disqus_config = function () {
							this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
							this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
							};
							*/
							(function() { // DON'T EDIT BELOW THIS LINE
							var d = document, s = d.createElement('script');
							s.src = 'https://ppdboman1pdg.disqus.com/embed.js';
							s.setAttribute('data-timestamp', +new Date());
							(d.head || d.body).appendChild(s);
							})();
							</script>
							<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                                 
						</div>
					</div>
				</div>
			 	<?php
				}
				?>
			</div>
		</div>
	</div>
</div>