<?php
    /**
    * replace special chars in text to make it usable in URL
    * Function replaces special characters in given data by -
    * function is registered as Smarty modifier
    * @param String $SEO_text text to which to apply modifications
    * @return String text suitable for URL
    */
    function smarty_modifier_makeseo($str,$separator = 'dash',$lowercase = TRUE)
    {

        if ($separator == 'dash')
        {

            $search     = '_';
            $replace    = '-';

        }else
        {

            $search     = '-';
            $replace    = '_';

        }
		$str = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $str);


        $trans = array(
                        '&\#\d+?;'              => '',
                        '&\S+?;'                => '',
                        '\s+'                   => $replace,
                        $replace.'+'            => $replace,
                        $replace.'$'            => $replace,
                        '^'.$replace            => $replace,
                        '\.+$'                  => ''
                        );
        $str = strip_tags($str);
        $str = preg_replace("#\/#ui",'-',$str);

        foreach ($trans AS $key => $val)
        {

            $str = preg_replace("#".$key."#ui", $val, $str);

        }

        if($lowercase === TRUE)
        {

            $str = mb_strtolower($str,'UTF-8');

        }
		

        return trim(stripslashes($str));

    }
?>
