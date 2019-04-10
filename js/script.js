/** ***************************************************
* 
*  Il y a surement moyen de faire plus simple, mais dans
*  "l'urgence" ça me va amplement
* 
* 
* 
*/

text = document.getElementById('wiki').innerHTML,
target = document.getElementById('targetDiv'),
converter = new showdown.Converter({tables: true}),
html = converter.makeHtml(text);

target.innerHTML = html;
