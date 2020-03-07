<?php

namespace App\Helpers;

    class SukuKataLib{

        public static function getLastSyllables($str){
            $syls = SukuKataLib::getSyllables($str);
            $lastIndex = count($syls)-1;
            return $syls[$lastIndex];
        }

        public static function getSecondLastSyllables($str){
            $syls = SukuKataLib::getSyllables($str);
            $lastIndex = count($syls)-1;
            return $lastIndex<=0?null:$syl[$lastIndex-1];
        }

        public static function getFirstSyllables($str){
            $syls = SukuKataLib::getSyllables($str);
            return $syls[0];
        }

        public static function getSecondFirstSyllables($str){
            $syls = SukuKataLib::getSyllables($str);
            $lastIndex = count($syls)-1;

            return $lastIndex>0?$syl[1]:null;
        }

        public static function getConsonant($str){
            return SukuKataLib::removeVowel($str);
        }

        public static function getSyllables($str){

            $res = [];

            while($str){
                $str = SukuKataLib::removeStringFromNonLetterExceptSpace(SukuKataLib::convertDashToSpace($str));
                $var = str_split($str);
                $firstVowelIndex=strcspn(strtolower($str), "aeiou");

                $target = $firstVowelIndex;
                $nextIndex =$firstVowelIndex+1;
                $next = !empty($var[$nextIndex])?$var[$nextIndex]:null;

                if(!SukuKataLib::isVowel($next)){
                    $next2Index = $firstVowelIndex+2;
                    $next2=!empty($var[$next2Index])?$var[$next2Index]:null;

                    if(SukuKataLib::isPotentiallySpecialCharacter($next)){
                        if(SukuKataLib::isSpecialCharacters($next.$next2)){
                            $next2Index +=1;
                            $nextIndex +=1;
                        }
                    }

                    if(!SukuKataLib::isVowel($next2)){
                        $target=$nextIndex;
                    }
                }

                $target+=1;
                $split1 = substr($str,0,$target);
                $split2 = substr($str,$target);

                array_push($res,$split1);
                $str=$split2;
            }

            if($res[count($res)-1]===' ')
                array_pop($res);

            return $res;
        }

        public static function countSyllabels($string){
            return SukuKataLib::countVowel($string);
        }

        public static function countVowel($string){
            return preg_match_all('/[aiueo]/i',$string,$matches);
        }

        public static function isVowel($char){
            $char = strtolower($char);
            return in_array($char,array('a','i','u','e','o'));
        }

        public static function isPotentiallySpecialCharacter($char){
            $char = strtolower($char);
            return in_array($char,array('s','y','n','g','k','h'));
        }

        public static function isSpecialCharacters($char){
            $char = strtolower($char);
            return in_array($char,array('sy','ng','ny','kh'));
        }

        public static function removeVowel($str)
        {
            return preg_replace("/[aiueo]/", '',SukuKataLib::removeStringFromNonLetterExceptSpace($str));
        }

        public static function removeStringFromNonLetterExceptSpace($str){
            return preg_replace("/[^A-Za-z ]/", '',$str);
        }

        public static function convertDashToSpace($str){
            return preg_replace("/[--]/",' ',$str);
        }


    }
?>