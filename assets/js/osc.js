/*This is the O function used to call CSS rules using JavaScript */
function O(obj)
{
 if (typeof obj == 'object') return obj
 else return document.getElementById(obj)
}
/*This is the S Function used to call CSS rules using JavaScript*/
function S(obj)
{
 return O(obj).style
}

function C(name)
{
 var elements = document.getElementsByTagName('*')
 var objects = []
 for (var i = 0 ; i < elements.length ; ++i)
 if (elements[i].className == name)
 objects.push(elements[i])
 return objects
}
<script>
onerror = errorHandler;
   document.writ("Welcome to this website") // Deliberate error
function errorHandler(message, url, line)
{
out = "Sorry, an error was encountered.\n\n";
out += "Error: " + message + "\n";
out += "URL: " + url + "\n";
out += "Line: " + line + "\n\n";
out += "Click OK to continue.\n\n";
alert(out);
return true;

}
</script>
