function slideSwitch() {
    var $active = $('#slideshow img.active');

    if ($active.length == 0) {
        $active = $('#slideshow img:last');
    }
    
    var $next = $active.next().length ? $active.next() : $('#slideshow img:first');
    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 500, function() {
            $active.removeClass('active last-active');
        });
};


// 리스트 더 보기
$('#MORE a').click(function(e) {
    var url = $(this).attr('xhref') + '?offset=' + $(this).attr('xoffset');
    
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {
            if (data.hasmore) {
                $('#MORE a').attr('xoffset', data.offset);
            } else {
                $('#MORE').hide();
            }
            
            $('#LIST_CONTAINER').append(data.view);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert('서버에 문제가 생겼습니다.\n잠시후에 다시 시도해 주세요.');
        }
    });
    
    return false;
});


// 이전사진 / 다음사진
$('#PHOTO').delegate('.multi_img a', 'click', function(e) {
    var direction = $(this).attr('class');

    // photo
    var list = $('#PHOTO').find('ol.img li');
    var current = list.filter(':visible');
    var next;
    if ('prev' == direction) {
        next = current.prev();
        if (!next.is('li')) {
            next = list.last();
        }
    } else {
        next = current.next();
        if (!next.is('li')) {
            next = list.first();
        }
    }
     
    current.fadeOut();
    next.fadeIn();

    // dim
    list = $('#PHOTO').find('ol.dim li');
    current = list.filter('.on');
    if ('prev' == direction) {
        next = current.prev();
        if (!next.is('li')) {
            next = list.last();
        }
    } else {
        next = current.next();
        if (!next.is('li')) {
            next = list.first();
        }
    }

    current.removeClass('on');
    next.addClass('on');
    
    return false;
});


// 사진 확대
$('#PHOTO a.zoom').click(function(e) {
    var current = $('#PHOTO').find('ol.img li:visible img');

    var html = '<img src="' + current.attr('xsrc') + '" />';
    $('#PHOTO_ZOOM').children('.img').html(html);

    $('#PHOTO_ZOOM').fadeIn('slow');
    return false;
});
$('#PHOTO_ZOOM').click(function(e) {
    $('#PHOTO_ZOOM').fadeOut('slow');
    return false;
});


// 좋아요
$('#LIKE').delegate('a.login', 'click', function(e) {
    if (confirm('Login is required.')) {
        window.location.href = '/a/auth';
    }
    return false;
});
$('#LIKE').delegate('a.liked', 'click', function(e) {
    var el = $(this);
    var url = el.attr('xhref');
    url += 'unlike/' + el.attr('xtarget');
    
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        success: function(data) {
            if (data.result) {
                el.removeClass('liked').addClass('like');
                
                // likes 리스트에서 제거
                var user = data.user;
                if (user) {
                    var count = $('#LIKE div.likes span.count').text();
                    count--;
                    $('#LIKE div.likes span.count').text(count);
                    
                    $('#LIKE div.likes ul li.' + user.id).remove();
                }
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert('서버에 문제가 생겼습니다.\n잠시후에 다시 시도해 주세요.');
        }
    });
    return false;
});
$('#LIKE').delegate('a.like', 'click', function(e) {
    var el = $(this);
    var url = el.attr('xhref');
    url += 'like/' + el.attr('xtarget');
    
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        success: function(data) {
            if (data.result) {
                el.removeClass('like').addClass('liked');
                
                // likes 리스트에 추가
                var user = data.user;
                if (user) {
                    var count = $('#LIKE div.likes span.count').text();
                    count++;
                    $('#LIKE div.likes span.count').text(count);
                    
                    var html = '<li class="' + user.id + '"><a href="/' + user.username + '" class="liked" rel="' + user.fullname + '"><img src="' + user.profileimage + '" /></a></li>';
                    $('#LIKE div.likes ul').append(html);
                }
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert('서버에 문제가 생겼습니다.\n잠시후에 다시 시도해 주세요.');
        }
    });
    return false;
});
