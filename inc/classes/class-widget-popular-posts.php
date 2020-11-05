<?php
/**
 * Custom Popular Post Widget
 *
 * @package Designfly
 */

namespace DESIGNFLY\Inc;

use WP_Widget;

use DESIGNFLY\Inc\Traits\Singleton;

/**
 * Popular Posts Widget Class.
 */
class Widget_Popular_Posts extends WP_Widget {

	use Singleton;

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		$designfly_widget_ops = array(
			'classname'                   => 'widget_popular_posts_custom',
			'description'                 => __( 'Your site&#8217;s most Popular Posts.', 'designfly' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct(
			'widget-popular-posts',
			__( 'Widget Popular Posts', 'designfly' ),
			$designfly_widget_ops
		);
		$this->alt_option_name = 'widget_popular_post_entries';
	}

	/**
	 * Outputs the content for the current Popular Posts widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Popular Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$default_title = __( 'Popular Posts', 'designfly' );
		$title         = ( ! empty( $instance['title'] ) ) ? $instance['title'] : $default_title;

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		if ( $title ) {
			echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );
		}

		$popular_posts = new \WP_Query(
			array(
				'posts_per_page' => $number,
				'meta_key'       => 'post_views_count',
				'orderby'        => 'meta_value_num',
				'order'          => 'DESC',
			)
		);
		// before and after widget arguments are defined by themes.
		echo wp_kses_post( $args['before_widget'] );
		// This is where you run the code and display the output.
		while ( $popular_posts->have_posts() ) :
			$popular_posts->the_post(); ?>
		<div class = "widget-post--custom">
			<?php echo esc_html( the_post_thumbnail( array( 45, 45 ), array( 'class' => 'widget-post__img' ) ) ); ?>
			<div class = "widget-post__meta">
				<a href="<?php echo esc_url( the_permalink() ); ?>">
					<p class="widget-post__title"><?php echo wp_kses_post( the_title() ); ?></p>
				</a>
				<p class="widget-post__author"><?php designfly_posted_by(); ?>
				<span class="widget-post__date">
				<?php
				if ( $show_date ) :
						designfly_posted_on();
				endif;
				?>
				</span>
				</p>
			</div>
		</div>
			<?php
		endwhile;
		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Handles updating the settings for the current Popular Posts widget instance.
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		$instance['number']    = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		return $instance;
	}

	/**
	 * Outputs the settings form for the Popular Posts widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		?>
		<p>
			<label for="<?php echo wp_kses_post( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'designfly' ); ?></label>
			<input class="widefat" id="<?php echo wp_kses_post( $this->get_field_id( 'title' ) ); ?>" name="<?php echo wp_kses_post( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo wp_kses_post( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo wp_kses_post( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'designfly' ); ?></label>
			<input class="tiny-text" id="<?php echo wp_kses_post( $this->get_field_id( 'number' ) ); ?>" name="<?php echo wp_kses_post( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo wp_kses_post( $number ); ?>" size="3" />
		</p>

		<p>
			<input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo wp_kses_post( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo wp_kses_post( $this->get_field_name( 'show_date' ) ); ?>" />
			<label for="<?php echo wp_kses_post( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Display post date?', 'designfly' ); ?></label>
		</p>
		<?php
	}
}
