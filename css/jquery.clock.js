$(document).ready(function(){
    /* Kode ini dijalankan setelah DOM telah sepenuhnya dimuat */
    $('#fancyClock').tzineClock();
});

(function($){  
    // Sebuah array global yang digunakan oleh fungsi plug-in:
    var gVars = {};
 
    // Memperluas inti jQuery:
    $.fn.tzineClock = function(opts){
   
        // "Ini" mengandung unsur-unsur yang dipilih saat memanggil plugin: $ ('elemen') tzineClock ();.
        // Jika pemilih kembali lebih dari satu elemen, gunakan yang pertama:
        var container = this.eq(0);
        if(!container)
        {
            try{
                console.log("Invalid selector!");
            } catch(e){}
           
            return false;
        }
       
        if(!opts) opts = {};
            var defaults = {
            /* opsi tambahan akan ditambahkan dalam versi masa depan dari plugin.*/
        };
       
        /* Penggabungan opsi yang diberikan dengan yang default (akan digunakan pada versi mendatang dari plugin): */
        $.each(defaults,function(k,v){
            opts[k] = opts[k] || defaults[k];
        })
 
        // Memanggil fungsi setup dan melewati wadah,
        // akan tersedia untuk fungsi setup sebagai "ini":
        setUp.call(container);
        return this;
    }
   
    function setUp()
    {
        // Penetapan Warna :
        var colors = ['orange','blue','green'];
        var tmp;
        for(var i=0;i<3;i++)
        {
            // Membuat elemen baru dan menetapkan warna sebagai nama kelas:
            tmp = $('<div>').attr('class',colors[i]+' clock').html(
                '<div class="display"></div>'+
                '<div class="front left"></div>'+
                '<div class="rotate left">'+
                '<div class="bg left"></div>'+
                '</div>'+
                '<div class="rotate right">'+
                '<div class="bg right"></div>'+
                '</div>'
            );
           
            // Menambahkan ke kontainer:
            $(this).append(tmp);
           
            // Menugaskan beberapa elemen sebagai variabel untuk kecepatan:
            tmp.rotateLeft = tmp.find('.rotate.left');
            tmp.rotateRight = tmp.find('.rotate.right');
            tmp.display = tmp.find('.display');
           
            // Menambahkan panggil sebagai variabel global. Akan tersedia sebagai gVars.colorName
            gVars[colors[i]] = tmp;
        }
       
        // Menyiapkan selang satu, dieksekusi setiap 1000 milidetik:
        setInterval(function(){
            var currentTime = new Date();
            var h = currentTime.getHours();
            var m = currentTime.getMinutes();
            var s = currentTime.getSeconds();
           
            animation(gVars.green, s, 60);
            animation(gVars.blue, m, 60);
            animation(gVars.orange, h, 24);
        },1000);
    }
   
    function animation(clock, current, total)
    {
        // Menghitung sudut arus:
        var angle = (360/total)*(current+1);
        var element;
        if(current==0)
        {
            // Menyembunyikan bagian kanan latar belakang:
            clock.rotateRight.hide();
           
            // Ulang rotasi bagian kiri:
            rotateElement(clock.rotateLeft,0);
        }
       
        if(angle<=180)
        {
            // Bagian kiri diputar, dan kanan saat ini tersembunyi:
            element = clock.rotateLeft;
        }
        else
        {
            // Bagian pertama dari rotasi selesai, jadi kami mulai berputar bagian kanan:
            clock.rotateRight.show();
            clock.rotateLeft.show();
            rotateElement(clock.rotateLeft,180);
            element = clock.rotateRight;
            angle = angle-180;
        }
 
        rotateElement(element,angle);
        // Mengatur teks dalam elemen display, memasukkan nol jika diperlukan:
        clock.display.html(current<10?'0'+current:current);
    }
   
    function rotateElement(element,angle)
    {
        // Berputar elemen, tergantung pada browser:
        var rotate = 'rotate('+angle+'deg)';
        if(element.css('MozTransform')!=undefined)
            element.css('MozTransform',rotate);
        else if(element.css('WebkitTransform')!=undefined)
            element.css('WebkitTransform',rotate);
        // Sebuah versi untuk internet explorer menggunakan filter, bekerja tetapi sedikit kereta (tidak mengherankan di sini):
        else if(element.css("filter")!=undefined)
        {
            var cos = Math.cos(Math.PI * 2 / 360 * angle);
            var sin = Math.sin(Math.PI * 2 / 360 * angle);
            element.css("filter","progid:DXImageTransform.Microsoft.Matrix(M11="+cos+",M12=-"+sin+",M21="+sin+",M22="+cos+",SizingMethod='auto expand',FilterType='nearest neighbor')");
            element.css("left",-Math.floor((element.width()-200)/2));
            element.css("top",-Math.floor((element.height()-200)/2));
        }
    }
})(jQuery)