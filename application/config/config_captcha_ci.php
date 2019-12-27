<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['activar_captcha'] = FALSE; 
$config['permitted_chars'] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
$config['fonts'] = [
					dirname(__DIR__).'\libraries\captcha_ci\fonts\Acme.ttf', 
					dirname(__DIR__).'\libraries\captcha_ci\fonts\Ubuntu.ttf', 
					dirname(__DIR__).'\libraries\captcha_ci\fonts\Merriweather.ttf'
					]; 



