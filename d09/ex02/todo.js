window.onload = function() {
	btnNew = document.getElementById("new");
	btnNew.addEventListener("click", check);
	btnNew.addEventListener("click", todo);
	iIDTodo = 0;
	check();
}

function strIsEmpty(str) {
	return (str.length === 0 || !str.trim());
}

function check()
{
	var task = document.getElementById('ft_list');
	task.innerHTML = decodeURIComponent(getCookie('todo'));
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

function todo()
{
	var sTask = prompt("Entrez la chose a remettre au lendemain");
	if (!strIsEmpty(sTask))
	{
		var container = document.getElementById('ft_list');
		var h = document.createTextNode(sTask);
		var div = document.createElement("div");
		div.appendChild(h);
		div.setAttribute("id", iIDTodo)
		div.setAttribute("onclick", "del(this)")
		container.insertBefore(div, container.firstChild);
		date=new Date;
		date.setMonth(date.getMonth()+1);
		date = date.toUTCString();
		setCookie('todo', encodeURIComponent(container.innerHTML), 1);
		iIDTodo++;
	}
}

function del(i)
{
	 if (confirm("Voulez vous supprimer cette tache ?"))
	 {
		var task = document.getElementById('ft_list');
		task.removeChild(i);
		setCookie('todo', encodeURIComponent(task.innerHTML), 1);
	 }
}
