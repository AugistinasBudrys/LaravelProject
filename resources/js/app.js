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

//csrf token input
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//event join query
$(document).ready(function () {
    $('.join').click(function (e) {
        e.preventDefault();
        var eventId = $('#extra').val();
        $.ajax({
            type: 'POST',
            url: '/events/join',
            data: {
                "data": eventId
            },
            dataType: 'json',
            success: function (data) {
                $('#joined-users').load(document.URL + ' #joined-users');
            },
            error: function (e) {
                console.log(e);
            }
        })
    });
});

//changes the button upon join
$('.join').on('click', function () {
    var el = $(this);
    if (el.text() === el.data('text-swap')) {
        el.text(el.data('text-original'));
    } else {
        el.data('text-original', el.text());
        el.text(el.data('text-swap'));
    }
});

//open the add restaurant modal
$(document).on('click', '.addRest', function (e) {
    e.preventDefault();
    $('#edit-item').modal('show');
});

//query for creating restaurant, event dependency
$('.Add').click(function (e) {
    e.preventDefault();
    var event_id = $('#eventId').val();
    var restaurant_id = [];
    $('#restaurantId:checked').each(function () {
        restaurant_id.push($(this).val());
    });
    $.ajax({
        type: 'POST',
        url: '/events/assign/restaurant',
        data: {event_id: event_id, restaurant_id: restaurant_id},
        dataType: 'json',
        success: function (data) {
            $('#edit-item').modal('hide');
            $('#added-events').load(document.URL + ' #added-events');
        },
        error: function (e) {
            console.log(e);
        }
    })
});

// query for registering votes
$(document).on('click', '.vote', function (e) {
    e.preventDefault();
    var event_id = $('#vote').val();
    var restaurant_id = e.target.id;
    var user_id = $('#user').val();
    $.ajax({
        type: 'POST',
        url: '/events/vote',
        data: {
            event_id: event_id,
            restaurant_id: restaurant_id,
            user_id: user_id
        },
        dataType: 'json',
        success: function (data) {
            $('#vote-count').load(document.URL + ' #vote-count');
        },
        error: function (e) {
            console.log(e);
        }
    })
});

//delete event modal display
$(document).on('click', '#yes', function(e){
    e.preventDefault();
    $('#delete-event').modal('show');
});