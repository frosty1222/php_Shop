// $(document).ready(function(){
//   var autoload = setInterval(function(){
//     $('#btn-nex').trigger('click');
//   },2000);
//   $('#btn-nex').click(function(event){
//       var slide_sau = $('.actived').next();
//       var vi_tri_hien_tai = $('.actived').index()+1;
//       console.log(vi_tri_hien_tai);
//         if(slide_sau.length !=0){
//           $('.actived').addClass('bien-mat-ben-trai').one('webkitAnimationEnd', function(envent){
//              $('.bien-mat-ben-trai').removeClass('bien-mat-ben-trai').removeClass('active');
//             });
//             slide_sau.addClass('active').addClass('di-vao-ben-phai').one('webkitAnimationEnd', function(event){
//                 $('.di-vao-ben-phai').removeClass('di-vao-ben-phai');
//             });
//             // xu ly nut
//             $('.nut-slide ul li').removeClass('active_nut');
//             $('.nut-slide ul li:nth-child('+(vi_tri_hien_tai+1)+')').addClass('active_nut');
//         }else{
//             $('.actived').addClass('bien-mat-ben-trai').one('webkitAnimationEnd', function(event){
//               $('.bien-mat-ben-trai').removeClass('bien-mat-ben-trai').removeClass('active');
//             });
//             $('.slider:first-child').addClass('active').addClass('di-vao-ben-phai').one('webkitAnimationEnd', function(event){
//                 $('.di-vao-ben-phai').removeClass('di-vao-ben-phai');
//           });
//          $('.nut-slide ul li').removeClass('active_nut');
//          $('.nut-slide ul li:nth-child(1)').addClass('active_nut');
//      }
//   });
//   $('#btn-pre').click(function(event){
//       var slide_truoc =$('.active').prev();
//       var vi_tri_hien_tai = $('.active_nut').index()+1;
//         if(slide_truoc.length =0){
//           $('.actived').addClass('bien-mat-ben-phai').one('webkitAnimationEnd', function(envent){
//              $('.bien-mat-ben-phai').removeClass('bien-mat-ben-phai').removeClass('active');
//             });
//             slide_truoc.addClass('active').addClass('di-vao-ben-trai').one('webkitAnimationEnd', function(event){
//                 $('.di-vao-ben-trai').removeClass('di-vao-ben-trai');
//             });
//             // xu ly nut
//             $('.nut-slide ul li').removeClass('active_nut');
//             $('.nut-slide ul li:nth-child('+(vi_tri_hien_tai - 1)+')').addClass('active_nut');
//         }else{
//             $('.actived').addClass('bien-mat-ben-phai').one('webkitAnimationEnd', function(event){
//               $('.bien-mat-ben-phai').removeClass('bien-mat-ben-phai').removeClass('active');
//             });
//             $('.slider:last-child').addClass('active').addClass('di-vao-ben-trai').one('webkitAnimationEnd', function(event){
//                 $('.di-vao-ben-trai').removeClass('di-vao-ben-trai');
//         });
//         $('.nut-slide ul li').removeClass('active_nut');
//          $('.nut-slide ul li:nth-child').addClass('active_nut');
//      }
//   });
//   $('.nut-slide ul li').click(function(event) {
//      var vi_tri_hien_tai = $('.active_nut').index()+1;
//      var vi_tri_click = $(this).index()+1;
//      $('.nut-slide ul li').removeClass('active_nut');
//      $(this).addClass('active_nut');
//        if(vi_tri_click > vi_tri_hien_tai) {
//         $('.actived').addClass('bien-mat-ben-trai').one('webkitAnimationEnd', function(envent){
//         $('.bien-mat-ben-trai').removeClass('bien-mat-ben-trai').removeClass('active');
//       });
//         $('.slider:nth-child('+vi_tri_click+')').addClass('active').addClass('di-vao-ben-phai').one('webkitAnimationEnd', function(event){
//         $('.di-vao-ben-phai').removeClass('di-vao-ben-phai');
//       });
//     }
//     if(vi_tri_click < vi_tri_hien_tai){
//       $('.actived').addClass('bien-mat-ben-phai').one('webkitAnimationEnd', function(envent){
//              $('.bien-mat-ben-phai').removeClass('bien-mat-ben-phai').removeClass('active');
//             });
//            $('.slider:nth-child('+vi_tri_click+')').addClass('active').addClass('di-vao-ben-trai').one('webkitAnimationEnd', function(event){
//                 $('.di-vao-ben-trai').removeClass('di-vao-ben-trai');
//             });
//     }
//   });
// });
var slideIndex = 0;
showSlides();

// Next/previous controls
function plusSlides(n) {
  showSlides2(slideIndex += n);
}

function showSlides2(n) {
  var i;
  var slides = document.getElementsByClassName("slider");
  
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "block";
  }
  
  slides[slideIndex-1].style.display = "none";
}

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("slider");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "block";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "none";
  setTimeout(showSlides, 1000);
}