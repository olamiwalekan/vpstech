<?php
function zozo_tweets_widget_load()
{
	register_widget('Zozo_Tweets_Widget');
}
add_action('widgets_init', 'zozo_tweets_widget_load');
class Zozo_Tweets_Widget extends WP_Widget {

	public function __construct() {
		/* Widget settings. */
		$widget_options = array('classname' => 'zozo_tweets_widget', 'description' => esc_html__( 'Displays Twitter feeds.', 'pixzlo-core' ) );
		$control_options = array('id_base' => 'zozo_tweets-widget');
		
		/* Create the widget. */
		parent::__construct('zozo_tweets-widget', esc_html__( 'Pixzlo Twitter Feeds', 'pixzlo-core' ), $widget_options, $control_options);
	}
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$twitter_id = $instance['twitter_id'];
		$consumer_key = $instance['consumer_key'];
		$consumer_secret = $instance['consumer_secret'];
		$access_token = $instance['access_token'];
		$access_token_secret = $instance['access_token_secret'];
		$tweet_count = (int) $instance['tweet_count'];
		$tweet_show = $instance['tweet_show'];
		echo $before_widget;
		
		if($title) {
			echo $before_title . $title . $after_title;
		} 
		
		$tweets = pixzlo_get_tweets( $consumer_key, $consumer_secret, $access_token, $access_token_secret, $tweet_count, $twitter_id );
		
		// Check tweets array
		if($tweets && is_array($tweets)) { ?>
		
			<div class="zozo-twitter-widget twitter-slider" data-show="<?php echo esc_attr( $tweet_show ); ?>">
				<ul class="twitter-items">
					<?php foreach($tweets as $tweet) { ?>
						<li class="tweet-item">
							<?php $tweet_time = strtotime($tweet['created_at']); 
							$time_ago = pixzlo_tweet_time_ago($tweet_time); ?>
							
							<div class="twitter-wrap media">
								<div class="tweet-profile-pic d-flex mr-3">
									<a href="http://twitter.com/<?php echo esc_attr( $tweet['user']['screen_name'] ); ?>/statuses/<?php echo esc_attr( $tweet['id_str'] ); ?>">
										<?php echo '<img class="rounded-circle" src="'. $tweet['user']['profile_image_url'] .'" alt="'. esc_attr( $tweet['user']['screen_name'] ) .'" />'; ?>
									</a>
								</div>
								
								<div class="twitter-content media-body">
									<div class="twitter-profile">
										<h6 class="twitter-profile-name">
											<a href="http://twitter.com/<?php echo esc_attr( $tweet['user']['screen_name'] ); ?>/statuses/<?php echo esc_attr( $tweet['id_str'] ); ?>">
												<?php echo esc_attr( $tweet['user']['screen_name'] ); ?>
											</a>
										</h6>
										<span class="tweet-time"><?php echo esc_attr( $time_ago ); ?></span>
									</div>
									<p class="zozo_tweet_text">
										<?php $tweet_text = $tweet['text'];
										$tweet_text = preg_replace("~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~", "<a href=\"\\0\">\\0</a>", $tweet_text);
										echo wp_kses_post( $tweet_text ); ?>
									</p>
								</div>	
							</div><!-- .twitter-wrap -->
						</li>
					<?php }//foreach ?>
				</ul>
			</div>
			
		<?php }// tweet array check ?>
		
		<?php echo $after_widget;
	}
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['twitter_id'] = $new_instance['twitter_id'];
		$instance['consumer_key'] = $new_instance['consumer_key'];
		$instance['consumer_secret'] = $new_instance['consumer_secret'];
		$instance['access_token'] = $new_instance['access_token'];
		$instance['access_token_secret'] = $new_instance['access_token_secret'];
		$instance['tweet_count'] = $new_instance['tweet_count'];
		$instance['tweet_show'] = $new_instance['tweet_show'];
		
		return $instance;
	}
	function form($instance)
	{
		$defaults = array('title' => '', 'twitter_id' => '', 'consumer_key' => '', 'consumer_secret' => '', 'access_token' => '', 'access_token_secret' => '', 'tweet_count' => '', 'tweet_visible' => '', 'tweet_show' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title:', 'zozothemescore'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('twitter_id') ); ?>"><?php esc_html_e('Twitter ID:', 'zozothemescore'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id('twitter_id') ); ?>" name="<?php echo esc_attr( $this->get_field_name('twitter_id') ); ?>" value="<?php echo esc_attr( $instance['twitter_id'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('consumer_key') ); ?>"><?php esc_html_e('Consumer Key:', 'zozothemescore'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id('consumer_key') ); ?>" name="<?php echo esc_attr( $this->get_field_name('consumer_key') ); ?>" value="<?php echo esc_attr( $instance['consumer_key'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('consumer_secret') ); ?>"><?php esc_html_e('Consumer Secret:', 'zozothemescore'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id('consumer_secret') ); ?>" name="<?php echo esc_attr( $this->get_field_name('consumer_secret') ); ?>" value="<?php echo esc_attr( $instance['consumer_secret'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('access_token') ); ?>"><?php esc_html_e('Access Token:', 'zozothemescore'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id('access_token') ); ?>" name="<?php echo esc_attr( $this->get_field_name('access_token') ); ?>" value="<?php echo esc_attr( $instance['access_token'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('access_token_secret') ); ?>"><?php esc_html_e('Access Token Secret:', 'zozothemescore'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id('access_token_secret') ); ?>" name="<?php echo esc_attr( $this->get_field_name('access_token_secret') ); ?>" value="<?php echo esc_attr( $instance['access_token_secret'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('tweet_count') ); ?>"><?php esc_html_e('Number of Tweets:', 'zozothemescore'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id('tweet_count') ); ?>" name="<?php echo esc_attr( $this->get_field_name('tweet_count') ); ?>" value="<?php echo esc_attr( $instance['tweet_count'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('tweet_show') ); ?>"><?php esc_html_e('Number of Shown Tweets:', 'zozothemescore'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id('tweet_show') ); ?>" name="<?php echo esc_attr( $this->get_field_name('tweet_show') ); ?>" value="<?php echo esc_attr( $instance['tweet_show'] ); ?>" />
		</p>
			
	<?php }
}

function pixzlo_get_tweets( $consumer_key, $consumer_secret, $access_token, $access_token_secret, $tweet_count, $twitter_id ){
	// Include Main Library File
	require_once( PIXZLO_CORE_DIR . 'widgets/twitter/twitteroauth.php' );
	
	//set transient name
	$transient_name = 'zozo_list_tweets_' . strtolower($twitter_id);
	$tweets = '';
	// Get stored transients
	$cached_twitter_feeds = get_transient( $transient_name );
	if( ( false === $cached_twitter_feeds || empty( $cached_twitter_feeds ) ) || $tweet_count > count( $cached_twitter_feeds ) ) {
	
		// Get Access Token
		$connection = pixzloGetConnectionWithAccessToken($consumer_key, $consumer_secret, $access_token, $access_token_secret);				
		$params = array(
		  'count' 		=> $tweet_count,
		  'screen_name' => $twitter_id
		);
		$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
		// Get Response data
		$tweets = $connection->get($url, $params);
		// Set it to transient
		set_transient( $transient_name, $tweets, HOUR_IN_SECONDS * 8 ); //
		
	} else {
		$tweets = $cached_twitter_feeds;
	}
	return $tweets;
}
function pixzlo_tweet_time_ago( $time ) {
	$periods = array( esc_html__( 'second', 'zozothemescore' ), esc_html__( 'minute', 'zozothemescore' ), esc_html__( 'hour', 'zozothemescore' ), esc_html__( 'day', 'zozothemescore' ), esc_html__( 'week', 'zozothemescore' ), esc_html__( 'month', 'zozothemescore' ), esc_html__( 'year', 'zozothemescore' ), esc_html__( 'decade', 'zozothemescore' ) );
	
	$lengths = array( '60', '60', '24', '7', '4.35', '12', '10' );
	$now = time();
	$difference = $now - $time;
	
	$tense = esc_html__( 'ago', 'zozothemescore' );
	for( $j = 0; $difference >= $lengths[$j] && $j < count( $lengths )-1; $j++ ) {
		$difference /= $lengths[$j];
	}
	$difference = round( $difference );
	if( $difference != 1 ) {
		$periods[$j] .= esc_html__( 's', 'zozothemescore' );
	}
   return sprintf('%s %s %s', $difference, $periods[$j], $tense );
}
function pixzloGetConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) 
{
	$connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
	return $connection;
}
?>