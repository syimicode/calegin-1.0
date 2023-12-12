/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

// DataTables
$(document).ready(function () {
    $('#datatables').dataTable({
        dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
                extend: 'excel',
                className: 'btn-light'
            },
            {
                extend: 'pdf',
                className: 'btn-warning'
            }
        ],

        "lengthMenu": [
            [25, 50, 75, -1],
            [25, 50, 75, "All"]
        ],
        "pageLength": 25,
    });
});


// Countdown Pemilu
const days = document.querySelector('.hari')
const hours = document.querySelector('.jam')
const minutes = document.querySelector('.menit')
const seconds = document.querySelector('.detik')

let timeLeft = {
    d: 0,
    h: 0,
    m: 0,
    s: 0,
}

let totalSeconds;

function setTimer() {
    // Hitung selisih antara tanggal saat ini dan tanggal spesifik menggunakan objek Date
    // Hasil perbandingan dibagi dengan 1000 untuk mengkonversikan hasil dari milisecond menjadi detik
    totalSeconds = Math.floor((new Date('February 14 2024 05:30:00') - new Date()) / 1000);
    setTimeLeft();

    let interval = setInterval(() => {
        if (totalSeconds < 0) {
            clearInterval(interval);
        }
        countTime();
    }, 1000);
}

function countTime() {
    if (totalSeconds > 0) {
        --timeLeft.s;

        if (timeLeft.m >= 0 && timeLeft.s < 0) {
            timeLeft.s = 59;
            --timeLeft.m;

            if (timeLeft.h >= 0 && timeLeft.m < 0) {
                timeLeft.m = 59;
                --timeLeft.h;

                if (timeLeft.d >= 0 && timeLeft.h < 0) {
                    timeLeft.h = 23;
                    --timeLeft.d;
                }
            }
        }
    }

    // Agar setelah waktu selesai, waktu akan berhenti dan tidak terus berjalan ke negatif.
    if (timeLeft.d <= 0 && timeLeft.h <= 0 && timeLeft.m <= 0 && timeLeft.s <= 0) {
        timeLeft.d = 0;
        timeLeft.h = 0;
        timeLeft.m = 0;
        timeLeft.s = 0;
    }

    --totalSeconds; // Agar nilai totalSeconds berkurang setiap detik
    printTime();
}

function printTime() {
    days.innerHTML = timeLeft.d;
    hours.innerHTML = timeLeft.h < 10 ? '0' + timeLeft.h : timeLeft.h;
    minutes.innerHTML = timeLeft.m < 10 ? '0' + timeLeft.m : timeLeft.m;
    seconds.innerHTML = timeLeft.s < 10 ? '0' + timeLeft.s : timeLeft.s;
}

function setTimeLeft() {
    timeLeft.d = Math.floor(totalSeconds / (60 * 60 * 24));
    timeLeft.h = Math.floor(totalSeconds / (60 * 60) % 24);
    timeLeft.m = Math.floor(totalSeconds / (60) % 60);
    timeLeft.s = Math.floor(totalSeconds % 60);
}

setTimer();