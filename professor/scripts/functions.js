$(document).ready(function(){

	if ( $( ".aviso" ).html() != "" )
	{
		$( ".aviso" ).slideDown( "slow" );
	}
	
	$( ".voltar" ).click(function(){
		history.back();
	});

});

function confirmarExcluir( url )
{

	if ( !confirm( 'Deseja realmente excluir?' ) )
	{
		return;
	}

	document.location.href = url;
}

function aluno_historico(id)
{
	$.ajax({
			url: "aluno_historico.php?id="+id,
			
			success: function( msg ){
				$("#div_historico").html(msg);
			},
			error: function(){
				
			}
		});
}

/**
 * 
 * @param data
 * @return
 */
function valida_data(data) 
{   
	//Parameters are calendar Year,Month,Day
	var moFlag = 0;
	var dyFlag = 0;
	var arDate = data.split('/');
	var dy = arDate[0];
	var mo = arDate[1];
	var yr = arDate[2];
	var date = data;
	var nDate = new Date();  // current date (local)
	var nowTime = nDate.getTime();  // current time (UTC)
	var thenTime = Date.UTC(yr, mo-1, dy);  // specified time (UTC)
	var thisYear = nDate.getFullYear();
	var thisMonth = nDate.getMonth();
	var thisDay = nDate.getDate();
	if (date.length == 0) 
	{
		return;
	}
	if (date.length < 10)
	{
		return false;
	}
	if (dy<1 || dy>31)
	{
		return false;
	} 
	else
	{
		dyFlag=1;
	}
	if (dy>30 && (mo == 2 || mo==4 || mo==6 || mo==9 || mo==11)) 
	{
		return false;
	} 
	else 
	{
		dyFlag=1;
	}
	if (dy>29 && mo==2) 
	{
		return false;
	} 
	else 
	{
		dyFlag=1;
	}
	if ((mo == 2 && dy == 29)  && ((yr%4 != 0) || (yr%100 == 0 && yr%400 != 0))) 
	{
		return false;
	} 
	else 
	{
		dyFlag=1;
	}
	if (mo<1 || mo>12) 
	{
		return false;
	}
	else 
	{
		return true;
	}
}	

function valida_licao()
{
	var valido = $("#lesson_form").validate().form();
	if (valido)
	{
		$("#lesson_form").submit();
	}
}