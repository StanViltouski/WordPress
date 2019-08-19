
/*For range input*/

$(function () {


  $('#ageInputId').on('input', function(){
      var slide_value = $('#ageInputId').val(),
         

//Mobile or not
          total_value = (window.innerWidth < 1024) ? slide_value/160 + 'px' : total_value = slide_value/130 + 'px'; 

      $('#ageInputId').attr('value', slide_value);
      $('.thumb').css('left', total_value);
      ageOutputId.value = '$ '+ ageInputId.value;
  })


  $('#ageInputId2').on('input', function(){

      var countDesk = 58,
          countMob = 43,
          slide_value = $('#ageInputId2').val();

      countDesk+=slide_value*10;
      countMob+=slide_value*10;
    
      if(countMob > 63) countMob+=slide_value*4;
      if(countMob > 99) countMob=105;
      if(countMob < 63) countMob=0;
      if(countDesk > 78) countDesk+=slide_value*4.8; 
      if(countDesk > 118) countDesk=128;
      if(countDesk < 78) countDesk=0;
   

        //console.log(countDesk);

//Mobile or not 
      var total_value = (window.innerWidth < 1024) ? slide_value*countMob + 'px' : slide_value*countDesk+ 'px'; 
          //console.log(slide_value);

      $('#ageInputId2').attr('value', slide_value);
      $('.thumbTwo').css('left', total_value);
      ageOutputId2.value = ageInputId2.value + ' months';

  })

                  
}); 



/*Reset form*/

  $(window).on('load', function(){
      $('#form_first')[0].reset();
      $('.range output').text('$ 1000');
      $('.rangeTwo output').text('1 months');
  });



/*Styles for radio botton*/

$(function () {
  $('.form-check-input').on('change', function(){

    if(this.checked) {
      var card = $(this).parent().children()[1],
          index = $(card).attr('data-index'),
          card_mass = $('.radio_card');


      function reset() {
         $(card_mass).css({
          'background' : '',
          'background-position': '',
          'box-shadow': '',
          'color': '#232323'
         })

          $('.radio_card img').attr('src', 'assets/svg/red-radiobutton.svg');
      }


      function publicStyles(index)  {
        $(card_mass[index]).css({
          'background-position': 'bottom calc(0% + 12px) right calc(0% + 12px)',
          'box-shadow': '0 20px 30px 0 rgba(208, 2, 27, 0.2)',
          'color' : '#ffffff',
        })

        $('.radio_card img:eq('+index+')').attr('src', 'assets/svg/white-radiobutton.svg');
      }


      switch(index) {
        case '1': 
              reset();
              $(card_mass[0]).css('background', '#ed1a3a url("/assets/svg/idea-white.svg") no-repeat')
              publicStyles(0);
        break;


        case '2':
              reset();
              $(card_mass[1]).css('background', '#ed1a3a url("/assets/svg/investments icon white.svg") no-repeat')
              publicStyles(1);
        break;


        case '3':
              reset();
              $(card_mass[2]).css('background', '#ed1a3a url("/assets/svg/development-white.svg") no-repeat')
              publicStyles(2);
        break;


        case '4':
              reset();
              $(card_mass[3]).css('background', '#ed1a3a url("/assets/svg/complete icon white.svg") no-repeat')
              publicStyles(3);
        break;

        default:
        return;
      }

    }

  })
                  
}); 



/*Add files to multiple download*/

$(function () {

  var inputs = $('.inputfile');

  Array.prototype.forEach.call(inputs, function(input){

    var label  = input.previousElementSibling,
        labelVal = label.innerHTML;
        input.addEventListener('change', function(e){

    //console.log(inputs);
          var fileName = '';

          if( this.files && this.files.length > 1 )
          fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
          else 
          fileName = e.target.value.split( '\\' ).pop();    
          if( fileName )
          label.querySelector( 'span' ).innerHTML = '<div class="downloadFile_block"><img class="icon_file" src="assets/svg/doc-blue.svg" alt="doc-blue">' + fileName + '<img id="reset_value" src="assets/svg/close icon small.svg" alt="close icon small"></div>';
    else
      label.innerHTML = labelVal;
  });

//input.addEventListener('focus', function(){ input.classList.add( 'has-focus' ); });input.addEventListener('blur', function(){ input.classList.remove( 'has-focus' ); });

});


}); 



/*Clear multiple download*/

$(function () {
   $('.file_name').on('click', '.downloadFile_block #reset_value', function(){
      $('.downloadFile_block').remove();
      document.getElementById("file").value = null;
    })
      
});


  /*For animate inputs*/

$('.general_input').on('input', function(){
    var $this = $(this);
   ($this.val() == '') ? $this.removeClass('placeholder-animate_filled') : $this.addClass('placeholder-animate_filled');

 })



/*Switch form type*/

$(function () {

  $('.type_form a').on('click', function(){

    var atr = $(this).parent().attr('data'),
        smallFormAttr = $('.small_form').attr('data'),
        bigFormAttr = $('.big_form').attr('data'),
        link_small = $('.small_form a'),
        link_big = $('.big_form a');
       

// Color tab
  if(bigFormAttr == 'true' && smallFormAttr == 'false'){
      link_small.css({'color' : '#ef1c3b'})
      link_big.css({'color' : '#02bdf3'})
       $('.big_form').css({
          'border-bottom': '4px solid #02bdf3',
      }).attr('data', 'false');

      $('.small_form').css({
        'border-bottom': '4px solid #ef1c3b',
      }).attr('data', 'true');

  } else {
      link_small.css({'color' : '#02bdf3'})
      link_big.css({'color' : '#ef1c3b'})
        $('.small_form').css({
        'border-bottom': '4px solid #02bdf3',
      }).attr('data', 'false');

      $('.big_form').css({
        'border-bottom': '4px solid #ef1c3b',
    }).attr('data', 'true');

  }


// Small form Desktop
  if(bigFormAttr == 'true' && smallFormAttr == 'false' && window.innerWidth >= 768) {

      
//Change form type

      $('.showBig_form').hide(300);
      $('.general_title-mobile').hide();

      $('.general_wrapper').css({
          'display': 'block',
          'width': '420px',
          'margin' : '0 auto'
      });
      $('.wrapper4-animate-input').css('margin-bottom', '20px');

// Big form Desktop
  } else if(bigFormAttr == 'false' && smallFormAttr == 'true' && window.innerWidth >= 768) { 

//Change form type
  
      $('.showBig_form').show(300);

      $('.general_wrapper').css({
          'display': 'flex',
          'width': '100%',
          'margin' : 'none'
        });

      $('.wrapper4-animate-input').css('margin-bottom', 'none');

    }

// Small form mobile
  if(bigFormAttr == 'true' && smallFormAttr == 'false' && window.innerWidth < 768) {
      $('.showBig_form-mobile').hide(300);
      $('.general_wrapper').css({
            'display': 'block',
            'width': '302px',
            'margin' : '0 auto'
      });

    } else if(bigFormAttr == 'false' && smallFormAttr == 'true' && window.innerWidth < 768) {
      $('.showBig_form-mobile').show(300);
    }

  })
/*
  $(window).on('resize', function(){

      if (window.innerWidth < 768) {
           $('.general_wrapper').css({
            'display': 'block',
            'width': '302px',
            'margin' : '0 auto'
      });
      //$('.trackBar').css('display','none');
  }
  })
*/
});


/*Validation form*/

 $(window).on('load', function(){

  var form = document.forms[0],
      name = $('#input-name')
      email = $('#input-email'),
      regExp = [/^[а-яА-Яa-zA-Z ]+$/,/(\w+\.)*\w+@(\w+\.)+[A-Za-z]+/];
 
            
    form.onsubmit = function(event) {

        event.preventDefault();
        $('.error').text('');
        var valid = true;

            if(!$(name).val()) {
                $('.error-name').text('The field is required');
                valid = false;
            } else if(!$(name).val().match($(regExp)[0])) {
                $('.error-name').text('Please enter a valid name');
                valid = false;
            } 


            if(!$(email).val()) {
                $('.error-email').text('The field is required');
                valid = false;
            }else if(!$(email).val().match($(regExp)[1])) {
              $('.error-email').text('Please enter a valid email address');
                valid = false;
            }


            if(valid) {
              form.submit();
            }


    }

//Active botton

  $('.invalidCheck, .invalidCheck2').on('change', function (e) {

    if($('#invalidCheck').is(':checked') && $('#invalidCheck2').is(':checked')) {

      $('.btn_submit').attr('disabled', false);

    } else {
      
      $('.btn_submit').attr('disabled', true);
    }

})

})




