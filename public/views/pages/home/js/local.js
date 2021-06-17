function runCheck() {
    // API key
     $.ajax({
        url: "/views/pages/ajax/view.php",
        cache: false
    })
    .done(function( html ) {
        $( "#results" ).html( html );
    });
}

function backgroundBlink() {
    let color = false;

    setInterval( () => {
        let bg = color ? 'green' : 'red';
        $('.home-content').css('background', bg);
        color = !color;
    }, 500);    
}

function bbCheck(sku, name) {
    let APIKey = 'SbLjGhPVwyoocZgFdZ6fibGb';    

    let url = `https://api.bestbuy.com/v1/` + 
        `products(sku=${sku})?apiKey=${APIKey}&` + 
        `sort=onlineAvailability.asc&show=onlineAvailability,addToCartUrl,name&` + 
        `format=json`;

    let audioFile = "https://www.kozco.com/tech/piano2.wav"

    fetch(url)
        .then(response => response.json())
        .then((data) => {
            if ( data.products[0].onlineAvailability ) {
                console.log(`${name} => IN STOCK ==============`);
                // show
                $('.instock').html(`${name} => in stock`);
                $('.instock').attr('href', data.products[0].addToCartUrl);
                // visual aid
                backgroundBlink();

                // play audio
                var audio = new Audio(audioFile);
                audio.play();
            } 
        });
}

$( document ).ready(function() {
    $('.interact').on('click', () => {
        console.log('started ---');
    });

    runCheck();

    setInterval( () => {
        runCheck();
        bbCheck('6465789', 'NVIDIA 3070ti');
        bbCheck('6429440', 'NVIDIA 3080');
        bbCheck('6429442', 'NVIDIA 3070');
    }, 10000);
});