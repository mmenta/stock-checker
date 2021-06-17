<?php
function checkStock($item, $url, $trId, $link) {
    $data = file_get_contents($url);
    $raw = explode('id="'.$trId.'"', $data);
    $raw2 = explode('</tr>', $raw[1]);
    $status = strpos($raw2[0], 'Out of Stock') !== false ? false : true;
    $textStatus = $status ? 'In Stock!!!' : 'Not in Stock';
    
    if ( $status ) {
        $myAudioFile = "https://www.kozco.com/tech/piano2.wav";
        echo '<audio autoplay="true" loop="true" style="display:none;">
                <source src="'.$myAudioFile.'" type="audio/wav">
            </audio>';
    }

    // if status = true then text and play sound
    echo '<a href="'.$link.'" target="_blank">'.$item.'</a>' . ' => ' . $textStatus;
    echo '<br />';
}

// Nvidia 3070 FE, best buy
$url = 'https://www.nowinstock.net/computers/videocards/nvidia/rtx3070/';
$trId = 'tr52924';
$item = 'Nvidia 3070';
$link = 'https://www.bestbuy.com/site/nvidia-geforce-rtx-3070-8gb-gddr6-pci-express-4-0-graphics-card-dark-platinum-and-black/6429442.p?skuId=6429442';
checkStock($item, $url, $trId, $link);

$url = 'https://www.nowinstock.net/computers/videocards/nvidia/rtx3080/';
$trId = 'tr52923';
$item = 'Nvidia 3080';
$link = 'https://www.bestbuy.com/site/nvidia-geforce-rtx-3080-10gb-gddr6x-pci-express-4-0-graphics-card-titanium-and-black/6429440.p?skuId=6429440';
checkStock($item, $url, $trId, $link);

$url = 'https://www.nowinstock.net/computers/videocards/nvidia/rtx3070ti/';
$trId = 'tr56536';
$item = 'Nvidia 3070ti';
$link = 'https://www.bestbuy.com/site/nvidia-geforce-rtx-3070-ti-8gb-gddr6x-pci-express-4-0-graphics-card-dark-platinum-and-black/6465789.p?skuId=6465789';
checkStock($item, $url, $trId, $link);
?>