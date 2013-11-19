function niceThumb_Grid() {
  $("#restaurant_list_content .box_restaurant_content ul.thumb_grid li").hover(
        function() {
        var thumbinal = $(this);
        thumbinal.css({
          'z-index' : '10'
         });
        thumbinal.find('img.big').addClass("hover").animate({
                    /*'-webkit-transition': 'opacity .1s ease-in',
                    '-moz-transition': 'opactiy .1s ease-in',
                    '-ms-transition': 'opacity .1s ease-in',
                    '-o-transition': 'opacity .1s ease-in',
                    'transition': 'opacity .1s ease-in',
                    'zoom': '1',
                    'filter': 'alpha(opacity=100)',*/
                    'opacity': '0.9'
                      

                },0);
       thumbinal.find('#remove_comment_like_animate').addClass("comment_like_animate").animate({
                    

                },0);
       
        } , function() {
        var thumbinal = $(this);
        thumbinal.css({'z-index' : '0'});
        
        thumbinal.find('img.big').removeClass("hover").animate({
                    /*'-webkit-transition': '',
                    '-moz-transition': '',
                    '-ms-transition': '',
                    '-o-transition': '',
                    'transition': '',
                    'zoom': '',
                    'filter': '',*/
                    'opacity': ''
                      

                },0);
        thumbinal.find('#remove_comment_like_animate').removeClass("comment_like_animate").stop().animate({
                    

                },0);
        
        
        
       });
  
  
  
}


function niceThumb_List() {
  //newest
   $("#append_Res_Newest_List #Res_Newest_List .articles_list .box_list").hover(
        function() {
        var thumbinal = $(this);
        thumbinal.css({
          'z-index' : '10'
         });
        thumbinal.find('img.big').addClass("hover").animate({
                    'opacity': '0.9'
                   },0);
       thumbinal.find('#remove_comment_like_animate').addClass("comment_like_animate").animate({
                      },0);
       
        } , function() {
        var thumbinal = $(this);
        thumbinal.css({'z-index' : '0'});
        
        thumbinal.find('img.big').removeClass("hover").animate({
                    'opacity': ''
                  },0);
        thumbinal.find('#remove_comment_like_animate').removeClass("comment_like_animate").stop().animate({
                 },0);
        
       });
  //orther
$("#append_Res_Orther_List #Res_Orther_List .articles_list .box_list").hover(
        function() {
        var thumbinal = $(this);
        thumbinal.css({
          'z-index' : '10'
         });
        thumbinal.find('img.big').addClass("hover").animate({
                    'opacity': '0.9'
                   },0);
       thumbinal.find('#remove_comment_like_animate').addClass("comment_like_animate").animate({
                      },0);
       
        } , function() {
        var thumbinal = $(this);
        thumbinal.css({'z-index' : '0'});
        
        thumbinal.find('img.big').removeClass("hover").animate({
                    'opacity': ''
                  },0);
        thumbinal.find('#remove_comment_like_animate').removeClass("comment_like_animate").stop().animate({
                 },0);
        
       });
}


function niceThumb_Simple() {
  
  
}
















//function niceThumb_Grid() {
//   
// //thumb_grid ===============================================================================================
//       $("#restaurant_list_content .box_restaurant_content ul.thumb_grid li").hover(function() {
//        var thumbinal = $(this);
//        thumbinal.css({
//          'z-index' : '10'
//         });
//        
//       
//        
//        thumbinal.find('img').addClass("hover").animate({
//                        marginTop: '-50px'
//                      
//
//                }, 50);
//        thumbinal.find('.info_restaurant').animate({
//                        marginTop: '25px',
//                    
//                }, 50);
//         thumbinal.find('.box_info_authentication_hide').removeClass("hide").animate({
//                        marginTop: '0px',
//                      //  visibility: 'visible'
//                },50);
//                
//        thumbinal.find('.box_info_authentication').animate({
//                        marginTop: '-25px',
//                        position:'absolute',
//                        marginLeft:'10px',
//                },50);
//        
//
//        } , function() {
//        var thumbinal = $(this);
//        thumbinal.css({'z-index' : '0'});
//        thumbinal.find('img').removeClass("hover").stop()
//                .animate({
//                        marginTop: '0',
//                        marginLeft: '0',
//                        top: '0',
//                        left: '0',
//                       /* width: '174px',
//                        height: '117px'*/
//
//                }, 50);
//         thumbinal.find('.info_restaurant').animate({
//                        marginTop: '25px'
//                    
//                }, 50);
//           
//          thumbinal.find('.box_info_authentication_hide').addClass("hide").animate({
//                           marginTop: '-50px',
//                },50);
//          thumbinal.find('.box_info_authentication').animate({
//                        marginTop:'-35px',
//                        position:'absolute',
//                        marginLeft:'89px'
//                },50);
//
//       });
//  
//  
//  
//  /*$("#restaurant_list_content .box_restaurant_content ul.thumb li").hover(function() {
//        var thumbinal = $(this);
//        thumbinal.css({'z-index' : '10'});
//        thumbinal.find('img').addClass("hover")
//                .animate({
//                        marginTop: '-100px',
//                        marginLeft: '-160px',
//                        top: '50%',
//                        left: '50%',
//                        width: '300px',
//                        height: '200px'
//
//                }, 200);
//
//        thumbinal.find('.info').addClass("hover")
//                .animate({
//                        marginTop: '71px',
//                        marginLeft: '-160px',
//                        top: '50%',
//                        left: '50%',
//                        width: '300px'
//
//                }, 200);
//
//         thumbinal.find('.text').addClass("hover")
//                .animate({
//                        marginTop: '76px',
//                        marginLeft: '-160px',
//                        top: '50%',
//                        left: '50%',
//                        width: '300px'
//
//                }, 200);
//
//        } , function() {
//        var thumbinal = $(this);
//        thumbinal.css({'z-index' : '0'});
//        thumbinal.find('img').removeClass("hover").stop()
//                .animate({
//                        marginTop: '0',
//                        marginLeft: '0',
//                        top: '0',
//                        left: '0',
//                        width: '174px',
//                        height: '117px'
//
//                }, 200);
//
//        thumbinal.find('.info').addClass("hover").stop()
//                .animate({
//                        marginTop: '25px',
//                        marginLeft: '-91px',
//                        top: '50%',
//                        left: '50%',
//                        width: '174px'
//
//                }, 200);
//
//         thumbinal.find('.text').addClass("hover").stop()
//                .animate({
//                        marginTop: '30px',
//                        marginLeft: '-91px',
//                        top: '50%',
//                        left: '50%',
//                        width: '161px'
//
//                }, 200);
//
//       });
//       
//       */
//       
//};
//
///*Thumb list=========================================================================*/
//  
//function niceThumb_List() {
// //newest
// $("#append_Res_Newest_List #Res_Newest_List .articles_list .box_list").hover(function() {
//        var thumbinal = $(this);
//        thumbinal.css({
//          'z-index' : '10'
//         });
//         thumbinal.find('.box_info_authentication').animate({
//                        marginTop: '-100px',
//                        marginLeft: '5px'
//                    
//                }, 50);
//          thumbinal.find('.box_info_authentication_hide').removeClass("hide").animate({
//                        marginTop: '-70px',
//                        position: 'absolute',
//                        marginLeft: '5px'
//                      //  visibility: 'visible'
//                },50);
//        thumbinal.find('img').css({
//                        boxShadow :'0 0 10px #000'
//
//                });
//
//        } , function() {
//        var thumbinal = $(this);
//        thumbinal.css({'z-index' : '0'});
//        thumbinal.find('.box_info_authentication').animate({
//                        marginTop: '-35px',
//                        marginLeft: '89px'
//                    
//                }, 50);
//        thumbinal.find('.box_info_authentication_hide').addClass("hide").animate({
//                        marginTop: '-35px',
//                        marginLeft: '100px'
//                      //  visibility: 'visible'
//                },50);
//        thumbinal.find('img').css({
//                        boxShadow :'0 0 0px #000'
//
//                });
//
//       });
//  //orther     
//       $("#append_Res_Orther_List #Res_Orther_List .articles_list .box_list").hover(function() {
//        var thumbinal = $(this);
//        thumbinal.css({
//          'z-index' : '10'
//         });
//         thumbinal.find('.box_info_authentication').animate({
//                        marginTop: '-100px',
//                        marginLeft: '5px'
//                    
//                }, 50);
//          thumbinal.find('.box_info_authentication_hide').removeClass("hide").animate({
//                        marginTop: '-70px',
//                        position: 'absolute',
//                        marginLeft: '5px'
//                      //  visibility: 'visible'
//                },50);
//        thumbinal.find('img').css({
//                        boxShadow :'0 0 10px #000'
//
//                });
//
//        } , function() {
//        var thumbinal = $(this);
//        thumbinal.css({'z-index' : '0'});
//        thumbinal.find('.box_info_authentication').animate({
//                        marginTop: '-35px',
//                        marginLeft: '89px'
//                    
//                }, 50);
//        thumbinal.find('.box_info_authentication_hide').addClass("hide").animate({
//                        marginTop: '-35px',
//                        marginLeft: '100px'
//                      //  visibility: 'visible'
//                },50);
//        thumbinal.find('img').css({
//                        boxShadow :'0 0 0px #000'
//
//                });
//
//       }); 
//       
//       
//       
//       
//       
//       
//}
//
///*Thumb Simple=========================================================================*/
//  
//function niceThumb_Simple() {
// //newest
// $("#append_Res_Newest_List #Res_Newest_Simple .articles_list .articles_list_custom_center .box_list").hover(function() {
//        var thumbinal = $(this);
//        thumbinal.css({
//          'z-index' : '10'
//         });
//         thumbinal.find('.content').animate({
//                        marginLeft: '40px'
//                    
//                }, 200);
//         
//         
//        } , function() {
//        var thumbinal = $(this);
//        thumbinal.css({'z-index' : '0'});
//         thumbinal.find('.content').animate({
//                        marginLeft: '50px'
//                    
//                }, 200);
//        
//        
//
//       });
//  //orther     
//       $("#append_Res_Orther_List #Res_Orther_Simple .articles_list .box_list").hover(function() {
//        var thumbinal = $(this);
//        thumbinal.css({
//          'z-index' : '10'
//         });
//          thumbinal.find('.content').animate({
//                        marginLeft: '40px'
//                    
//                }, 200);
//         
//         
//
//        } , function() {
//        var thumbinal = $(this);
//        thumbinal.css({'z-index' : '0'});
//         thumbinal.find('.content').animate({
//                        marginLeft: '50px'
//                    
//                }, 200);
//        
//        
//       }); 
//       
//       
//       
//       
//       
//       
//}