function getTweets() {
	$.getJSON( 'http://twitter.com/statuses/user_timeline/beitschool.json?callback=?', function( data ) {
		var html = '<h2>TWITTER</h2><a href="http://twitter.com/beitschool"><div id="maistwteets">MAIS TWEETS</div></a>';
		$.each( data, function( i, t ) {
			if( i < 5 )
			{
				html += '<div class="tweet">';
				html += '<img class="avatar" src="img/avatar-twitter.jpg" alt="Avatar Twitter" />';
				html += '<span class="text">' + t.text + '</span><br />';
				html += '<span class="timestamp">' + formatTwitterDate(t.created_at) + '</span>';
				html += '</div>';
			}
		});
		$( '#twitter' ).html( html ).slideDown( 'slow' );
	});
}

function formatTwitterDate( str ) {
	var monthArray = { "Jan" : "01", "Feb" : "02", "Mar" : "03", "Apr" : "04", "May" : "05", "Jun" : "06", "Jul" : "07", "Aug" : "08", "Sep" : "09", "Oct" : "10", "Nov" : "11", "Dec" : "12" };
	day = str.substr( 8, 2 );
	month = str.substr( 4, 3 );
	year = str.substr( 26, 4 );
	return day + '/' + monthArray[month] + "/" + year;
}

$(document).ready(function() {
	//getTweets();
	
	$("#enviar_quiz").click(function(){
		var enviar = false;
		$("input[name='id_quiz_resposta']").each(function(i, e) {
			if ($(e).attr("checked"))
			{
				enviar = true;
			}
		});
		if (!enviar)
		{
			alert('Marque uma opção.');
			return;
		}
		
		$.ajax({
			url: "contabiliza-quiz.php?id_quiz_resposta=" + $("input[name='id_quiz_resposta']:checked").val()+"&id_quiz="+$("#id_quiz").val(),
			success: function( msg ){
				alert( 'Voto computado com sucesso.' );
			},
			error: function(){
				alert( 'Não foi possível computar seu voto.' );
			}
		});
	});
	
	$("#quiz_resultados").click(function(){
		open_popup('resultado_quiz.php?id_quiz='+$("#id_quiz").val());
	});
	
});

function getFacebookWall() {
	$.ajax({
		url: "https://www.facebook.com/feeds/page.php?id=147258622020256&format=rss20&callback=?",
		success: function( data ){
			$.each( data.entries, function(i, post) {
				alert( 'Pegamos:' + post.content );
			});
		},
		error: function(){
			alert( 'Não foi possível carregar.' );
		}
	});

	/*
	$.getJSON("https://www.facebook.com/feeds/page.php?id=147258622020256&format=json&callback=?", function( data ){
		$.each( data.entries, function(i, post) {
			alert( 'Pegamos:' + post.content );
		});
	});
	*/
}

function open_popup(url)
{
	window.open(url, 'teste online', 'height=400,width=700');
}