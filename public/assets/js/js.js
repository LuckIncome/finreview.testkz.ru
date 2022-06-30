// Валидация формы и выдача ошибки
(function () {
  'use strict'
  var forms = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

    form.classList.add('was-validated')
      }, false)
    })
})()





// Скрыть заголовок при прокрутке вниз
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('header').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});
setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);
function hasScrolled() {
    var st = $(this).scrollTop();
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    if (st > lastScrollTop && st > navbarHeight){
        $('header').removeClass('nav-down').addClass('nav-up');
    } else {
        if(st + $(window).height() < $(document).height()) {
            $('header').removeClass('nav-up').addClass('nav-down');
        }
    }
    lastScrollTop = st;
}

(function($){ 
    //ajax пагинация
    function loadMoreData(paginate) {
    $.ajax({
        url: '?page=' + paginate,
        type: 'get',
        beforeSend: function() {
            $('#load').text('Загрузка...');
        }
        }).done(function(data) {
            if(data == " " && data.length == 0) {
                $('#load').show();
                $('#load-more').hide();
                return;
            } 
            var a = $('#asd');
            var h = a.prop('outerHTML');
            //console.log(h);
            if(data.html === h) {
                $('#load').show();
                $('#load-more').hide();
                //$('#pag').hide();
                return;
            } else {
                $('#post').append(data.html); 
            }           
        }).fail(function(jqXHR, ajaxOptions, thrownError) {
            alert('Что-то пошло не так.');
        });
    }
    var paginate = 1;
    $('#load-more').click(function(e) {
        e.preventDefault();
        paginate++;
        loadMoreData(paginate);
    });
    //скрыть пагинацию
    // var p = $('#post').text();
    // if(p == '\t\n\t\t\tНОВОСТИ ОТСУТСТВУЮТ!\n\t\t\t') {
    //     $('#post').addClass('mb-5');
    //     $('#pag').hide();
    // }
    //сортировка
    $('#select').change(function() {        
        if(this.value) {
            window.location.href=this.value;
        }
    });
    //ajax feedback    
    $('#feedback').on('submit', function(event) {
        event.preventDefault();       
        var form = $(this);
        var successBlock = $('#successModal');
        var modalForm = $('#application');
        var action = form.attr('action');
        var method = form.attr("method");
        var name = form.find('input[name=name]').val();
        var email = form.find('input[name=email]').val();
        var text = form.find('textarea[name=text]').val();
        var url = form.find('input[name=url]').val();
        var token = form.find('meta[name="csrf-token"]').attr('content');            
        $.ajax({
            url:action,
            method:method,
            data:{
                name: name, 
                email: email,
                text: text,
                url: url,
                _token: token
            },
            dataType:'json',
            success: function (data) {
                if(data.status === 0) {
                    alert('error');
                } else {
                    modalForm.modal('hide');
                    successBlock.modal('show');
                }          
            }
        });       
    }); 
    //ajax subscribe 
    $('#subscribe_form').on('submit', function(event) {
        event.preventDefault();       
        var form = $(this);
        var successBlock = $("#successModal");
        var modalForm = $("#subscribe");
        var action = form.attr('action');
        var method = form.attr("method");
        var email = form.find('input[name=email]').val();
        var token = form.find('meta[name="csrf-token"]').attr('content');            
        $.ajax({
            url:action,
            method:method,
            data:{email: email, _token: token},
            dataType:'json',
            success: function (data) {
                if(data.status === 0) {
                    alert('error');
                } else {
                    modalForm.modal('hide');
                    successBlock.modal('show');
                }          
            }
        });       
    });
       
})(jQuery);

