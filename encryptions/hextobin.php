<?php
function hextobin($hexstr)
{
    $n = strlen($hexstr);
    $sbin = "";
    $i = 0;
    while ($i < $n) {
        $a = substr($hexstr, $i, 2);
        $c = pack("H*", $a);
        if ($i == 0) {
            $sbin = $c;
        } else {
            $sbin .= $c;
        }
        $i += 2;
    }
    return $sbin;
}