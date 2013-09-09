
var app = app || {};

app.xhr = (function(){
    "use strict";
    
    var _xhr = XMLHttpRequest || undefined;

    if (typeof _xhr === "undefined") {
        _xhr = ActiveXObject;
    }

    return function(params) {
        var xhr = new _xhr();

        xhr.onreadystatechange = function(){
            if (xhr.readyState < 4) {
                return;
            }

            if (xhr.status !== 200) {
                return;
            }

            if(xhr.readyState === 4) {
                params.callback(xhr.response);
            }
        }
        
        xhr.open(params.method, params.url, true);
        if (params.method === 'POST') {
            xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        } 
        xhr.send('url=' + encodeURIComponent(params.data.url));
        
    }
}());
