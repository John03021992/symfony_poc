import './bootstrap.js';

import './style.css'

const $ = require('jquery');

import 'fomantic-ui'

import 'fomantic-ui/dist/semantic.css'

console.log('test');

$("#button_1").on("click", (e) => {

        $.ajax({
             type: "GET",
             url: '/api',
             success:function(html) {
                 console.log($(html))
               $("#article_full").html($(html).find('#article_full').html())
             }
  
        });
   
})

