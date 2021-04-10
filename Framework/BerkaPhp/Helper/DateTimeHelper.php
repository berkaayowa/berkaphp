<?php
namespace BerkaPhp\Helper;

class DateTime {

    /*
	* Creates an input field
	* @param  label of the input and an array of attributes
	* @return input field
	* @author berkaPhp Ayowa
    *
    */

    public static function pluralize( $count, $text )
    {
        return $count . ( ( $count == 1 ) ? ( " $text" ) : ( " ${text}s" ) );
    }

    public static function ago( $datetime )
    {
        $now = new \DateTime();
        $datetime = new \DateTime($datetime);
        $interval = $now->diff($datetime );
        $suffix = ( $interval->invert ? ' ago' : '' );
        if ( $v = $interval->y >= 1 ) return sell::pluralize( $interval->y, 'year' ) . $suffix;
        if ( $v = $interval->m >= 1 ) return sell::pluralize( $interval->m, 'month' ) . $suffix;
        if ( $v = $interval->d >= 1 ) return sell::pluralize( $interval->d, 'day' ) . $suffix;
        if ( $v = $interval->h >= 1 ) return sell::pluralize( $interval->h, 'hour' ) . $suffix;
        if ( $v = $interval->i >= 1 ) return sell::pluralize( $interval->i, 'minute' ) . $suffix;
        return sell::pluralize( $interval->s, 'second' ) . $suffix;
    }

    public static function toDate($value, $format = null){
        if ($format == null) {
            $format = 'm-d-Y';
        }
        $newDate = date($format, strtotime($value));
        return $newDate;
    }


//$oderDateTime = new DateTime($data["OrderDate"]);
//$now = new DateTime();;
//$time = $oderDateTime->diff($now)->format("%d days, %h hours and %i minuts");
//$hours = $oderDateTime->diff($now)->format("%h");


}
