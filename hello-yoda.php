<?php
/**
 * @package Hello_Yoda
 * @version 1.7.2
 */
/*
Plugin Name: Hello Yoda
Plugin URI: http://wordpress.org/plugins/hello-yoda/
Description: This is a plugin from the Grand Master Yoda!
Author: Dylan Kephart
Version: 1.7.2
Author URI: http://ma.tt/
*/


function hello_yoda_quotes() {
$lyrics = "Do or do not. There is no try.
You must unlearn what you have learned. 
Named must be your fear before banish it you can.
Fear is the path to the dark side.
That is why you fail.
The greatest teacher, failure is. 
Pass on what you have learned.
Once you start down the dark path, forever will it dominate your destiny. Consume you, it will.
Always pass on what you have learned."; 


	// Here we split it into lines.
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line.
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later.
function hello_yoda() {
	$chosen = hello_yoda_quotes();
	$lang   = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	printf(
		'<p id="yoda"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
		__( 'Quote from Master Yoda:', 'hello-yoda' ),
		$lang,
		$chosen
	);
}

// Now we set that function up to execute when the admin_notices action is called.
//add_action( 'admin_notices', 'hello_yoda' );

// We need some CSS to position the paragraph.
function yoda_css() {
	echo "
	<style type='text/css'>
	#yoda {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		color: green;
		line-height: 1.6666;
	}
	.rtl #yoda {
		float: left;
	}
	.block-editor-page #yoda {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#yoda,
		.rtl #yoda {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}



function hello_darth_vader_get_lyric() {
        /** These are the Darth vader quotes */
        $lyrics = "
        I find your lack of faith disturbing.
        This will be a day long remembered. It has seen the end of Kenobi. It will soon see the end of the Rebellion    
        Be careful not to choke on your aspirations
        Hes as clumsy as he is stupid
        No I am your Father
        ";
        
        // Here we split it into lines.
        $lyrics = explode( "\n", $lyrics );
        
        // And then randomly choose a line.
        return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
        }

function hello_darth_vader() {
        $chosen = hello_darth_vader_get_lyric();
        $lang = '';
        if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
        $lang = ' lang="en"';
        }

 printf(
        '<p id="yoda"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
        __( 'Quote from Darth Vader :', 'hello-yoda' ),
        $lang,
        $chosen
        );
        }

 function darth_vader_css() {
        echo "
        <style type='text/css'>
        #yoda {
        float: right;
        padding: 5px 10px;
        margin: 0;
        font-size: 12px;
        line-height: 1.6666;
        color: red;
        }
        .rtl #yoda {
        float: left;
        }
        .block-editor-page #yoda {
        display: none;
        }
        @media screen and (max-width: 782px) {
        #yoda,
        .rtl #yoda {
        float: none;
        padding-left: 0;
        padding-right: 0;
        }
        }
        </style>
        ";
        }

function hello_yoda_load_for_user(){
        if (current_user_can('manage_options')){
        add_action( 'admin_notices', 'hello_darth_vader' );
        add_action( 'admin_head', 'darth_vader_css' );
        }
        else{
        add_action( 'admin_notices', 'hello_yoda' );
        add_action( 'admin_head', 'yoda_css' );
        }
        }

add_action( 'plugins_loaded', 'Hello_yoda_load_for_user' );
//add_action('admin_head','yoda_css');
