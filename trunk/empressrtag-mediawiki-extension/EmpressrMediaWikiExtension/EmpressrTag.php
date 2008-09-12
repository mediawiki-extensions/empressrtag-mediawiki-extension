<?php


/*
 * EmpressrTag.php - Adds a tag for aembedding empressr slide show presentations onto your site.
 * @author Alex Britez
 * @version 0.1
 * @copyright Copyright (C) 2008 Alex Britez
 * @license The MIT License - http://www.opensource.org/licenses/mit-license.php 
 * -----------------------------------------------------------------------

* -----------------------------------------------------------------------
 * Copyright (c) 2008 Alex Britez
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy 
 * of this software and associated documentation files (the "Software"), to deal 
 * in the Software without restriction, including without limitation the rights to 
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of 
 * the Software, and to permit persons to whom the Software is furnished to do 
 * so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all 
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, 
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES 
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND 
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT 
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, 
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING 
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR 
 * OTHER DEALINGS IN THE SOFTWARE. 
 * -----------------------------------------------------------------------
 */

if (defined('MEDIAWIKI')) {
	$wgExtensionFunctions[] = 'empressrSetup';
	
	
	
	$wgExtensionCredits['parserhook'][] = array(
        'name' => 'Empressr',
        'description' => 'Extension to add Empressr slideshows to wiki pages.',
        'author' => 'Alex Britez',
        'url' => 'http://blog.unthinkmedia.com',
        'version' => '0.1',
        'type' => 'parserhook'
	);

	 
	function empressrSetup() {
			global $wgParser;
			$wgParser->setHook( 'empressr', 'outputEmbed' );
	}
	 
	function outputEmbed( $input, $args, $parser ) {
			$token = $args['token'];
			$height = '350';
			$width = '450';
			
			if ($token==null) {
				return '<div class="errorbox">you need to add your empressr token</div>';
			}
			
			if(isset($args['width'])){
				$width = $args['width'];
			}
			
			if(isset($args['height'])){
				$height = $args['height'];
			}
			
			
			$url = "http://www.empressr.com/empressrflx/Empressr_Viewer.swf?token=" . $token . "&loc=http://www.empressr.com/&type=Viewer";
			 
			return
			'<object width="' . $width . '" height="' . $width . '">'.
			'<param name="movie" value="'.$url.'"></param>'.
			'<param name="wmode" value="transparent"></param>'.
			'<param name="allowFullScreen" value="true" />' .
			'<embed src="'.$url.'" allowFullScreen="true" type="application/x-shockwave-flash" '.
			'wmode="transparent" width="' . $width . '" height="' . $height . '">'.
			'</embed></object>';
	}
}