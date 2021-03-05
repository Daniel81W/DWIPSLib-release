<?php
class ASTROSUN{

    public static function GeometricMeanLongitudeSun(float $julianCentury){
        return (280.46646 + $julianCentury * ( 36000.76983 + $julianCentury * 0:0003032 )) % 360;
    }

    public static function GeometricMeanAnomalySun(float $julianCentury){
        return 357.52911 + $julianCentury * (35999.05029 - 0.0001537 * $julianCentury);
    }

    public static function EccentEarthOrbit(float $julianCentury){
        return 0.016708634 - julianCentury * (0.000042037 + 0.0000001267 * julianCentury);
    }
    
    public static function SunEqOfCtr(float $julianCentury, float $geometricMeanAnomalySun){
        return sin( deg2rad($geometricMeanAnomalySun) ) * ( 1.914602 - $julianCentury * ( 0.004817 + 0.000014 * $julianCentury ) ) + 
            sin( deg2rad( 2 * $geometricMeanAnomalySun ) ) * ( 0.019993 - 0.000101 * $julianCentury ) + 
            sin( deg2rad( 3 * $geometricMeanAnomalySun ) ) * 0.000289;
    }

    public static function TrueLongitudeSun (float $geometricMeanLongitudeSun,float $sunEqOfCtr){
        return $geometricMeanLongitudeSun + $sunEqOfCtr;
    }

    public static function TrueAnomalySun (float $geometricMeanAnomalySun,float $sunEqOfCtr){
        return $geometricMeanAnomalySun + $sunEqOfCtr;
    }

    public static function SunRadVector(float $eccentEarthOrbit, float $trueAnomalySun){
        return ( 1.000001018 * ( 1 - $eccentEarthOrbit * $eccentEarthOrbit ) ) / ( 1 + $eccentEarthOrbit * cos( deg2rad( $trueAnomalySun ) ) );
    }
}
?>