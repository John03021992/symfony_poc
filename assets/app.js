import './bootstrap.js';

import './style.css'

const $ = require('jquery');

import 'fomantic-ui'

import 'fomantic-ui/dist/semantic.css'

console.log('test');

$("#button_1").on("click", (e) => {

        $.ajax({
             type: "GET",
             url: '/api2',
             success:function(html) {
                 console.log(html)
               $("#article_full").html(html)
             }
  
        });
   
})

$("#button_2").on("click", (e) => {

  $.ajax({
       type: "GET",
       url: '/addfavorite',
       data: {title:$('h2#article_full').text(),imageUrl:$('img#article_full').attr('src')},
       success:function(html) {
           console.log(html)
         $('#article_full').text(html)
       }

  });

})



