<?php


class BridgeConnection
{

function connect()
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'http://192.168.1.24/api/EglxkqSq2JliicxVyMAnHq80cnSeR2152116YZhm');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
}

function lightsOff()
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'http://192.168.1.24/api/EglxkqSq2JliicxVyMAnHq80cnSeR2152116YZhm/lights/4/state');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"on\":false}");

    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
}

function lightsOn()
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'http://192.168.1.24/api/EglxkqSq2JliicxVyMAnHq80cnSeR2152116YZhm/lights/4/state');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"on\":true}");

    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
}

function changeColour($hue)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'http://192.168.1.24/api/EglxkqSq2JliicxVyMAnHq80cnSeR2152116YZhm/lights/4/state');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"hue\":$hue}");

    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

}

    function tempColourChange($temp)
    {
        $colourVal = 43690;
        $colourChange = 0;

        $colourChange = $temp * 546;
        $colourVal = $colourVal + $colourChange;
        if($colourVal > 65535)
        {
            $colourVal = 65535;
        }
        $this->changeColour(round($colourVal));
    }
}