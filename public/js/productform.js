(function(d){
    var form = d.getElementById('productForm'),
        url = document.location.href,
        total = d.getElementById('total'),
        dublicated = d.getElementById('dublicated'),
        el = d.getElementById('url');
    
    form.onsubmit = function(e) {
        e.preventDefault();
        app.xhr({
            url: url,
            method: 'POST',
            data: {url: el.value},
            callback: function(response){
                response = JSON.parse(response);
                total.innerHTML = response.total + ' product writed';
                dublicated.innerHTML = response.dublicated + ' products are dubpicated, did not touch old ones.';
            }
        });
    }
}(document));
