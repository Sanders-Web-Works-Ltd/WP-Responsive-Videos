<?php
/**
 * Plugin Name: WP Responsive Videos
 * Description: Make embeded videos in wordpress responsive
 * Plugin URI: http://sanderswebworks.co.uk/
 * Author: http://sanderswebworks.co.uk/
 * Author URI: http://sanderswebworks.co.uk/
 * Version: 0.0.1
 * Text Domain: sww
 * Domain Path: /languages/
 * License: GPLv2 or later
 *
 * @package WP Responsive Videos
 */

class sww_WP_Responsive_Videos{
	public function __construct(){
		add_filter( 'embed_oembed_html', array($this,'video_embed'), 10, 3 );
	}
	public function video_embed( $html ) {
		$id = uniqid();
		ob_start();
		?>
		<div id="video-container-<?php echo $id; ?>">
			<div class="video-wrap">
				<?php echo $html; ?>
			</div>
		</div>
		<style>
			#video-container-<?php echo $id; ?> {
			    float: none;
			    clear: both;
			    max-width: 100%;
			    position: relative;
			    padding-bottom: 56.25%;
			    padding-top: 25px;
			    height: 0;
			}
			#video-container-<?php echo $id; ?> iframe {
			    position: absolute;
			    top: 0;
			    left: 0;
			    width: 100%;
			    height: 100%;
			}
		</style>
		<?php
		return ob_get_clean();
	}
}

new sww_WP_Responsive_Videos();