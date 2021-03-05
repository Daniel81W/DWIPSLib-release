<?
class ASTROGEN{

    public static function JulianDay(){
        $date = new DateTime();
       return ASTROGEN::JulianDayFromTimestamp($date->getTimestamp());
    }

    public static function JulianDayFromTimestamp(int $timestamp){
        return ( $timestamp / 86400.0 ) + 2440587.5;
    }

    public static function JulianDayFromDateTime(int $year, int $month, int $day, int $hour = 0, int $minute = 0, int $second = 0){
       $date = mktime($hour, $minute, $second , $month, $day, $year);
       return ASTROGEN::JulianDayFromTimestamp($date);
    }

    public static function JulianCentury(float $julianDay){
        return ($julianDay - 2451545) / 36525;
    }
    
}
?>