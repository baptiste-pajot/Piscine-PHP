var tab = [];
getCookie();

function display()
{
	console.log(tab);
	var len, i, html;
	len = tab.length;
	html ='';
	for (i = len - 1; i >= 0; i--)
	{
		if (tab[i] != undefined && tab[i] != "")
		{
			html += "<div class='element' id=\""+ i + "\">" + tab[i] + "</div>";
			console.log(tab[i]);
		}
	}
	document.getElementById('ft_list').innerHTML = html;
}

function remove(i)
{
	if (confirm(tab[i] + "\n\nAre you sure to delete this element ?"))
	{
		delete tab[i];
		display();
		setCookie(i, "");
	}
}

$(document).ready(function(){
	display();
	$("#btn").click(function(){
		var txt, len;
		len = tab.length;
		txt = prompt("Please enter a new element", "Your text");
		if (txt.trim().length > 0)
		{
			txt = txt.replace("="," ");
			txt = txt.replace(";"," ");
			tab[len] = txt.trim();
			display();
			setCookie(len, tab[len]);
		}
	});
	$("#ft_list").on("click", ".element", function(){
		var i;
		i = parseInt($(this).attr('id'));
		console.log(i);
		remove(i);
	});
});

function setCookie(id, value)
{
	document.cookie = id + "=" + value ;
}

function getCookie()
{
	var txt, array1, array2, i;
	txt = document.cookie;
	txt = txt.trim();
	if (txt.length > 0)
	{
		array1 = txt.split(";");
		for (i = 0; i < array1.length; i++)
		{
			array2 = array1[i].split("=");
			if (array2[1] != undefined)
				tab[parseInt(array2[0])]= array2[1];
			else
				tab[parseInt(array2[0])]= undefined;
		}

	}
	else
		tab = [];
}
