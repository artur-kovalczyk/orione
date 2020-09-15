/*!
 * jQuery Movies and Actors Handler
 *
 */

jQuery(document).ready(function($){

$(".get-movie").each(function(){

$(this).click(function (e) {
    GetMovieInfo('movie',$(this).html());
});

});

$(".get-actor").each(function(){

$(this).click(function (e) {
    GetActorInfo('actor',$(this).html());
});

});

/*!
 * Display Actor info with Movie he/she played in
 */
function GetActorInfo(request_type, request_name){

        var ajaxurl = 'get-info-pg.php';
        var tr_str = '';
        $.ajax({
        url: ajaxurl,
        type: "GET",
        dataType: 'JSON',
        data: {type: request_type, name: request_name},
        success: function(response){
            var len = response.length;
            tr_str += '<h1 class="mt-5">' + request_name + '</h1><ul class="list-unstyled">';

            if (response) {
             for(var i=0; i<len; i++){
                var born = response[i].born_year + " in " + response[i].born_where;
                var movies = response[i].movies;
                tr_str += '<li><h5><strong>Born:</strong> '+born+'</h5></li>';
                if(movies != null){
                    tr_str += '<li><h5><strong>Movies played in: </strong>'+movies+'</h5></li>';
                    }
             }
             tr_str += '</ul>';
            }
            else {
             tr_str += "<li><h5>Error!</h5></li>";
            }

            $("#result").html(tr_str);
        }
        });
}

/*!
 * Display Movie info with cast
 */
function GetMovieInfo(request_type, request_name){

        var ajaxurl = 'get-info-pg.php';
        var tr_str = '';
        $.ajax({
        url: ajaxurl,
        type: "GET",
        dataType: 'JSON',
        data: {type: request_type, name: request_name},
        success: function(response){

            var len = response.length;
            tr_str += '<h1 class="mt-5">' + request_name + '</h1><ul class="list-unstyled">';

            if (response) {
             for(var i=0; i<len; i++){
                var actors = response[i].actors;
                var year = response[i].premiere_year;
                tr_str += '<li><h5><strong>Year from: </strong>'+year+'</h5></li>';
                if(actors != null){
                    tr_str += '<li><h5><strong>Cast: </strong>'+actors+'</h5></li>';
                    }
             }
             tr_str += '</ul>';
            }
            else {
             tr_str += "<li><h5>Error!</h5></li>";
            }

            $("#result").html(tr_str);

        }
        });
}

});
