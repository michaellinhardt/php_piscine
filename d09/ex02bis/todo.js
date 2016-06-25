$( document ).ready(function() {
	$('#ft_list').html( decodeURIComponent(getCookie('todo')) );
	$('#new').click(function() {
		sTask = prompt("Veuillez saisir une tache");
		if (!strIsEmpty(sTask))
		{
			$("#ft_list").prepend( "<div class='todo_elem' onclick=del(this)>" + sTask + "</div>" );
			var c = $("#ft_list").html();
			setCookie('todo', encodeURIComponent(c), 1);
		}
	});
});
function strIsEmpty(str) {
	return (str.length === 0 || !str.trim())
}

function getCookie(name)
{
	var nom = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++)
	{
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1);
		if (c.indexOf(nom) == 0) return c.substring(nom.length,c.length);
	}
	return "";
}

function setCookie(name, value, exdays)
{
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires="+d.toUTCString();
	document.cookie = name + "=" + value + "; " + expires;
}

function del(i)
{
	if (confirm("Voulez vous supprimer cette tache ?"))
	{
		$(i).remove();
		var c = $("#ft_list").html();
		setCookie('todo', encodeURIComponent(c), 1);
	}
}
