/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

jQuery.datetimepicker.setLocale('en');

// Datetime single
$(document).ready(function () {
    let d = new Date();
    let minDate = d.getFullYear() + "-" + ("0" + (d.getMonth() + 1)).slice(-2) + "-" + ("0" + d.getDate()).slice(-2) + " " + ("0" + d.getHours()).slice(-2) + ":" + ("0" + d.getMinutes()).slice(-2);
    // console.log('Min date: ' + minDate);

    $('.datetimepicker').datetimepicker({
        // timepicker:false,
        // mask: '9999/19/39 00:00:00',
        format: 'Y/m/d H:i:s',
        minDate: minDate,
        theme: 'dark'
    });
});
