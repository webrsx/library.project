    'use strict'

    document.querySelector('.test').addEventListener('click', () => {
        console.log('click')
    })

    function makeGETRequest(url){

        return new Promise(function(resolve, reject) {
          
            let xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);
          
            xhr.onload = function() {
                if (this.status == 200) {
                  resolve(this.response);
                } else {
                  let error = new Error(this.statusText);
                  error.code = this.status;
                  reject(error);
                }
            };
          
            xhr.onerror = function() {
                reject(new Error("Network Error"));
            };
          
            xhr.send();
        });
          
    };

    makeGETRequest('http://127.0.0.1:8000/book/get/3/')
    .then((response) => {

        // let response = JSON.parse(response);
        document.body.innerHTML = response;
        
    })