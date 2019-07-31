/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// $(document).ready(function(){
//     PopUpHide();
// });

// function PopUpHide(){
//     $("#edit-item").hide();
// }
// $(document).ready(function() {
//     $('#yes').click(function() {
//         $.ajax({
//             url: 'events.add',
//             type: 'POST',
//             // data:,
//             dataType: 'json',
//             success: function PopUpShow(json){
//                 $("#edit-item").show();
//             },
//             error: function(jqXHR, textStatus, errorThrown) {
//                 alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
//
//                 $('#result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
//                 console.log('jqXHR:');
//                 console.log(jqXHR);
//                 console.log('textStatus:');
//                 console.log(textStatus);
//                 console.log('errorThrown:');
//                 console.log(errorThrown);
//         }
//         })
//         });
//     });


$(document).ready(function() {
    $('.join').click(function(e) {
        console.log(e.target.id);
        e.preventDefault();
        var eventId = $('#extra').val();
        console.log(eventId);
        $.ajax({
            type: 'POST',
            url: '/events/join',
            data: {
                "data": eventId
            },
            dataType: 'json',
            success: function (data){
                $('#joined-users').load(document.URL +  ' #smth');
            },
            error: function(e) {
                console.log(e);
            }
        })
    });
});

$('.join').on("click", function() {
    var el = $(this);
    if (el.text() === el.data("text-swap")) {
        el.text(el.data("text-original"));
    } else {
        el.data("text-original", el.text());
        el.text(el.data("text-swap"));
    }
});

// var modal = document.getElementById("myModal");
//
// var btn = document.getElementById("myBtn");
//
// var span = document.getElementsByClassName("close")[0];
//
// btn.onclick = function() {
//     modal.style.display = "block";
// };
//
// span.onclick = function() {
//     modal.style.display = "none";
// };
//
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// };