<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// https://code.tutsplus.com/es/tutorials/build-your-own-captcha-and-contact-form-in-php--net-5362

class Captcha_ci
{
	protected $ci;
	private $captcha_string;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function crear()
	{

		$this->ci->config->load('otros/config_captcha_ci');

		$this->permitted_chars = $this->ci->config->item('permitted_chars');
		$string_length = 6;
		$this->captcha_string = $this->generarString($this->permitted_chars, $string_length);
 		

 		





 		$image = imagecreatetruecolor(200, 50);
 
		imageantialias($image, true);

		$colors = [];

		$red = rand(125, 175);
		$green = rand(125, 175);
		$blue = rand(125, 175);

		for($i = 0; $i < 5; $i++) 
		{
			$colors[] = imagecolorallocate($image, $red - 20*$i, $green - 20*$i, $blue - 20*$i);
		}

		imagefill($image, 0, 0, $colors[0]);

		for($i = 0; $i < 10; $i++) 
		{
			imagesetthickness($image, rand(2, 10));
			$rect_color = $colors[rand(1, 4)];
			imagerectangle($image, rand(-10, 190), rand(-10, 10), rand(-10, 190), rand(40, 60), $rect_color);
		}






		$black = imagecolorallocate($image, 0, 0, 0);
		$white = imagecolorallocate($image, 255, 255, 255);
		$textcolors = [$black, $white];
		 
		$fonts = $this->ci->config->item('fonts');
		
		$string_length = 6;
		 
		for($i = 0; $i < $string_length; $i++) 
		{
			$letter_space = 170/$string_length;
			$initial = 15;

			imagettftext($image, 
				20, 
				rand(-15, 15), 
				$initial + $i*$letter_space, 
				rand(20, 40), 
				$textcolors[rand(0, 1)], 
				$fonts[array_rand($fonts)], 
				($this->captcha_string!='')?$this->captcha_string[$i]:''
			);
		}
		header('Content-type: image/png');
		imagepng($image);		 
		imagedestroy($image);

	}

	public function generarString($input, $strength = 5) 
	{
		$this->ci->config->load('otros/config_captcha_ci');

	    $input_length = strlen($input);
	    $random_string = '';
	    for($i = 0; $i < $strength; $i++) {
	        $random_character = $input[mt_rand(0, $input_length - 1)];
	        $random_string .= $random_character;
	    }

	    
	  
	    return ($this->ci->config->item('activar_captcha'))? $random_string: '';
	}

	public function obtenerString()
	{
		return $this->captcha_string;
	}
	


}

/* End of file Captcha_ci.php */
/* Location: ./application/libraries/Captcha_ci.php */
