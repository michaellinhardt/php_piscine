$(document).ready(function() {
	sAjaxResponse = '' ;
	iLastID = -1;
	loadContent();
	$('#btn_new').click(function() { newTask(); });
});

function askDel(oTarget) {
	if (confirm("Voulez vous supprimer cette tache ?"))
	{
		iID = $(oTarget).attr("id");
		ajaxAsync('./delete.php', { iID: iID });
		delTask(iID);
	}
}

function newTask()
{
	sTask = prompt("Quel est la tache à enregistrer ?");
	if (sTask == null || sTask == "")
		return false;
	ajaxAsync('./insert.php', { sTask: sTask});
	aData = eval( '(' + sAjaxResponse + ')' );
	addTask(aData[0], aData[1]);
}

function loadContent() {
	ajaxAsync('./select.php', {});
	aData = eval( '(' + sAjaxResponse + ')' );
	for(var i in aData)
	{
		aVal = aData[i].split(';');
		iID = aVal[0];
		sTask = aVal[1];
		$("#clone_todo").clone().appendTo( "#todo_list" ).attr("id", iID).html(sTask).click(function() { askDel( $(this) ); });
		if (iLastID == -1)
			iLastID = iID;
	}
}

function addTask(iID, sTask)
{
	$("#clone_todo").clone().prependTo( "#todo_list" ).attr("id", iID).html(sTask).click(function() { askDel( $(this) ); });
	$('#'+iID).fadeIn();
}

function delTask(iID)
{
	$('#'+iID).fadeOut();
}

function ajaxAsync(sPath, oData, sFunc) {
	if (sFunc == undefined) sFunc = false ;
	if ( oData == undefined ) oData = {} ;
	$.ajax({
		url: sPath, // Url  appellé
		async: false, // Mode synchrone
		type: "POST", // Methode pour envoyer les donné
		data: (oData), // Les donné  à envoyer
		success: function(sData) { sAjaxResponse = sData; return true; },
		error: function() { return false ; }
	});
}
