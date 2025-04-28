<?php

namespace CCev;

class Rasmify
{

    static function rasmify($arabicString)
    {

        /** first use Unicode-Normalization to separate combined characters */

        $normalizedArabicString = \Normalizer::normalize($arabicString, \Normalizer::NFKC);

        // all the Arabic non-spacing-mark characters, 0x0674 added
        $arabicNSM = [0x0610, 0x0611, 0x0612, 0x0613, 0x0614, 0x0615, 0x0616, 0x0617, 0x0618, 0x0619, 0x061A, 0x064B, 0x064C, 0x064D, 0x064E, 0x064F, 0x0650, 0x0651, 0x0652, 0x0653, 0x0654, 0x0655, 0x0656, 0x0657, 0x0658, 0x0659, 0x065A, 0x065B, 0x065C, 0x065D, 0x065E, 0x065F, 0x0670, 0x0674, 0x06D6, 0x06D7, 0x06D8, 0x06D9, 0x06DA, 0x06DB, 0x06DC, 0x06DF, 0x06E0, 0x06E1, 0x06E2, 0x06E3, 0x06E4, 0x06E7, 0x06E8, 0x06EA, 0x06EB, 0x06EC, 0x06ED, 0x0897, 0x0898, 0x0899, 0x089A, 0x089B, 0x089C, 0x089D, 0x089E, 0x089F, 0x08CA, 0x08CB, 0x08CC, 0x08CD, 0x08CE, 0x08CF, 0x08D0, 0x08D1, 0x08D2, 0x08D3, 0x08D4, 0x08D5, 0x08D6, 0x08D7, 0x08D8, 0x08D9, 0x08DA, 0x08DB, 0x08DC, 0x08DD, 0x08DE, 0x08DF, 0x08E0, 0x08E1, 0x08E3, 0x08E4, 0x08E5, 0x08E6, 0x08E7, 0x08E8, 0x08E9, 0x08EA, 0x08EB, 0x08EC, 0x08ED, 0x08EE, 0x08EF, 0x08F0, 0x08F1, 0x08F2, 0x08F3, 0x08F4, 0x08F5, 0x08F6, 0x08F7, 0x08F8, 0x08F9, 0x08FA, 0x08FB, 0x08FC, 0x08FD, 0x08FE, 0x08FF, 0x10EFC, 0x10EFD, 0x10EFE, 0x10EFF];

        $arabicStringNoVowels = Rasmify::remove_characters($arabicNSM, $normalizedArabicString);

        $arabicRasm = Rasmify::replace_characters($arabicStringNoVowels);
        /**

        // Replace arabic letter alef wasla (\u0671) with arabic letter alef (\u0627)
        $rasmString = str_replace("ٱ", "ا", $rasmString);

        // Replace arabic letter teh (\u062A) with arabic letter dotless beh (\u066E)
        $rasmString = str_replace("ت", "ٮ", $rasmString);

        // Replace arabic letter teh marbuta (\u0629) with arabic letter heh (\u0647)
        $rasmString = str_replace("ة", "ه", $rasmString);

        // Replace arabic letter feh (\u0641) with arabic letter dotless feh (\u06A1)
        $rasmString = str_replace("ف", "ڡ", $rasmString);

        // Replace arabic letter beh (\u0628) with arabic letter dotless beh (\u066E)
        $rasmString = str_replace("ب", "ٮ", $rasmString);

        // Replace arabic letter yeh (\u064A) with arabic letter alef maksura (\u0649)
        $rasmString = str_replace("ي", "ى", $rasmString);

        // Replace arabic letter kaf (\u0643) with arabic letter keheh (\u06A9)
        $rasmString = str_replace("ك", "ک", $rasmString);

        // Replace arabic letter alef with hamza below (\u0625) with arabic letter alef (\u0627)
        $rasmString = str_replace("إ", "ا", $rasmString);

        // Replace arabic letter qaf (\u0642) with arabic letter dotless qaf (\u066F)
        $rasmString = str_replace("ق", "ٯ", $rasmString);

        // Replace arabic letter thal (\u0630) with arabic letter dal (\u062F)
        $rasmString = str_replace("ذ", "د", $rasmString);

        // Replace arabic letter alef with hamza above (\u0623) with arabic letter alef (\u0627)
        $rasmString = str_replace("أ", "ا", $rasmString);

        // Replace arabic letter ghain (\u063A) with arabic letter ain (\u0639)
        $rasmString = str_replace("غ", "ع", $rasmString);

        // Replace arabic letter dad (\u0636) with arabic letter sad (\u0635)
        $rasmString = str_replace("ض", "ص", $rasmString);

        // Replace arabic letter alef with madda above (\u0622) with arabic letter alef (\u0627)
        $rasmString = str_replace("آ", "ا", $rasmString);

        // Replace arabic letter sheen (\u0634) with arabic letter seen (\u0633)
        $rasmString = str_replace("ش", "س", $rasmString);

        // Replace arabic letter jeem (\u062C) with arabic letter hah (\u062D)
        $rasmString = str_replace("ج", "ح", $rasmString);

        // Replace arabic letter zain (\u0632) with arabic letter reh (\u0631)
        $rasmString = str_replace("ز", "ر", $rasmString);

        // Replace arabic letter khah (\u062E) with arabic letter hah (\u062D)
        $rasmString = str_replace("خ", "ح", $rasmString);

        // Replace arabic letter theh (\u062B) with arabic letter dotless beh (\u066E)
        $rasmString = str_replace("ث", "ٮ", $rasmString);

        // Replace arabic letter zah (\u0638) with arabic letter tah (\u0637)
        $rasmString = str_replace("ظ", "ط", $rasmString);

        // Replace arabic letter waw with hamza above (\u0624) with arabic letter waw (\u0648)
        $rasmString = str_replace("ؤ", "و", $rasmString);

        // Replace arabic letter yeh with hamza above (\u0626) with arabic Arabic Letter Alef Maksura (\u0649)
        $rasmString = str_replace("ئ", "ى", $rasmString);

        // Replace arabic letter noon (\u0646) with arabic letter noon ghunna (\u06BA)
        $rasmString = str_replace("ن", "ں", $rasmString);

        // Replace arabic letter farsi yeh (\u06CC) with arabic letter alef maksura (\u0649)
        $rasmString = str_replace("ی", "ى", $rasmString);

        // Insert zero-width-joiner (\u200D) into lam lam ha to avoid wrong ligatures
        $rasmString = str_replace("لله", "لل‍ه", $rasmString);
*/
        // Remove surrounding whitespace and return rasm
        return trim($arabicRasm);


    }
    static function remove_characters($removeList, $arabicString){
        foreach($removeList as $x){
            $uniChr = \IntlChar::chr($x);
            $arabicString = str_replace($uniChr,'',$arabicString);
        }
        return $arabicString;
    }

    static function replace_characters($arabicString){
        $data = array();
        if (($handle = fopen('./data/basecharacters.csv', 'r')) !== false) {
            while (($row = fgetcsv($handle)) !== false) {
                if (count($row) == 2) {
                    $data[$row[0]] = $row[1];
                }
            }
            fclose($handle);
        }

        foreach($data as $key => $value){
            $arabicString = str_replace($key, $value, $arabicString);
        }

        return $arabicString;
    }
}
