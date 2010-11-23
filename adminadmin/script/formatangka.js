// JavaScript Document
function intFormat(n)
{
var
regex = /(\d)((\d{3},?)+)$/;

n = n.split(',').join('');

while(regex.test(n))
{
n = n.replace(regex, '$1,$2');
}

return n;
}

function numFormat(n)
{
var
pointReg = /([\d,\.]*)\.(\d*)$/, f;

if(pointReg.test(n))
{
f = RegExp.$2;
return intFormat(RegExp.$1) + '.' + f;
}
return intFormat(n);
}
