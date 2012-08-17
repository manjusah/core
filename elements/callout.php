<?php
/**
 * FIXME: Edit Title Content
 *
 * FIXME: Edit Description Content
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 * FIXME: POINT USERS TO DOWNLOAD OUR STARTER CHILD THEME AND DOCUMENTATION
 *
 * @category Cyber Chimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }

if ( !class_exists( 'CyberChimpsCallout' ) ) {
	class CyberChimpsCallout {
		
		protected static $instance;
		
		/* Static Singleton Factory Method */
		public static function instance() {
			if (!isset(self::$instance)) {
				$className = __CLASS__;
				self::$instance = new $className;
			}
			return self::$instance;
		}	
		
		/**
		 * Initializes plugin variables and sets up WordPress hooks/actions.
		 *
		 * @return void
		 */
		protected function __construct( ) {
			//add_action( 'init', array( $this, 'init'), 10 );
			// TODO: Remove - Just for styling
			// add_action( 'cyberchimps_before_content', array( $this, 'render_display' ) );
			// TODO: Remove - Just for styling
			add_action( 'cyberchimps_before_container', array( $this, 'render_display' ) );
		}
		
		/**
		 * Run on applied action init
		 */
		public function init() {
		}
		
		// TODO: Fix documentation
		public function render_display() {
			// TODO: query post get callout details
			
			// Temporary until options are saved
			// TODO: Remove this default value
			$callouttext = ($text) ? $text : 'Default text';
		?>
			<div class="row-fluid">
				<div class="callout span12">
					<div class="callout-text">
						<h2 class="callout-title" ><?php echo $callouttext; ?></h2>
					</div><!-- #callout-text -->
				</div><!-- .row-fluid .span12 -->
			</div><!-- .callout-->
		<?php
		}
	}
}
CyberChimpsCallout::instance();