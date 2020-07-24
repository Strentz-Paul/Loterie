const $ = require('jquery');

global.$ = $;
global.jQuery = $;
let arrayQuote =[];
let callBackSuccess = function(data) {
    arrayQuote.push(data.quote);
}

function getQuote() {
    let url = 'https://api.booba.cloud'
    $.get(url, callBackSuccess).done(function() {
        //alert("second success");
    })
        .fail(function(){
            alert('error');
        })
        .always(function() {
            //alert('finished');
        })
}
for( let i = 0 ; i < 30; i++) {
    getQuote();
}
let counter = 1;
let toChange = document.getElementById('quote_to_change');
let inter = setInterval(change, 5000);
arrayQuote.forEach(elem => console.log(elem));

function change() {
    toChange.innerHTML = arrayQuote[counter] + '...';
    counter++
    if (counter >= arrayQuote.length) {
        counter = 0
    }
}
