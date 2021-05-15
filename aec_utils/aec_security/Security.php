<?php
	namespace aeCorp\aec_utils\aec_security;
	
	class Security {

		// Fonction de nettoyage des données entrées
			public static function cleanTargs($input) {

					if (is_array($input)) {

							foreach($input as $var=>$val) {
								
								$output[$var] = self::cleanTargs($val);

								}
						
					} else {
								$output = self::cleanInput($input);
					}

					return $output;
			}

			public static function cleanInput($input) {
			 
				$search = array(
					'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
					'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
					'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
					'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
				);
			 
				$output = preg_replace($search, '', $input);
				return $output;
			}
			  
			// Sanitization function
			public static function  sanitize($input) {

				if (is_array($input)) {
					foreach($input as $var=>$val) {
						$output[$var] = self::sanitize($val);

					}
				}
				else {
					
					$input  = self::cleanInput($input);
					$input = trim($input);
					$input = stripslashes($input);
					$input = htmlspecialchars($input);
					$input = addcslashes($input, "%\'\\\>\<");
					$output = $input;
				}

				return $output;
			}

				// trim function
			public static function  trim($input) {

				if (is_array($input)) {
					foreach($input as $var=>$val) {
						$output[$var] = self::sanitize($val);
					}
				}
				else {
					$input = trim($input);
					$output = $input;
				}

				return $output;
			}

				// htmlspecialchars function
			public static function  htmlspecialchars($input) {
					return  htmlspecialchars($input);
			}


			public static function generateCode($table, string $prefix = "", $field = "")
			{
				$letter = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
				$code = strtoupper(
				$prefix
				. rand(10, 99).$letter[rand(0, 25)] 
				. date("Y")
				. $letter[rand(0, 25)]);
		
				if ($table->count([$field."='$code' "]) <= 0) {
					return $code;
				} else {
					self::generateCode($prefix, $table, $field);
				}
		
			}


	}


	
	