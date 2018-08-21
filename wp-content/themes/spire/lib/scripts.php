<?php
function SD_scripts() {
	// load Stylesheet
	wp_enqueue_style( 'SD_main_css', get_template_directory_uri() . '/style.css', false , time());

	// load the main.js file, which is also dependent on jQuery, which is loaded by default
	wp_register_script( 'SD_main_js', get_template_directory_uri() . '/public/js/main.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'SD_main_js' );

	if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'SD_scripts' );

function SD_google_analytics() { ?>
<script>
    (function(b, o, i, l, e, r) {
    	b.GoogleAnalyticsObject = l;
    	b[l] || (b[l] =
    		function() {
    			(b[l].q = b[l].q || []).push(arguments)
    		});
    	b[l].l = +new Date;
    	e = o.createElement(i);
    	r = o.getElementsByTagName(i)[0];
    	e.src = '//www.google-analytics.com/analytics.js';
    	r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', '{{your analytics id}}', 'auto');
    ga('send', 'pageview');
</script>
<?php }
