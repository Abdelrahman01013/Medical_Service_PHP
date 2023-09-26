
function re(pag_url){
    var req = new XMLHttpRequest(); 
    req.onreadystatechange=function(){
        if(req.readyState==4 && req.status==200){
         document.getElementById('xml').innerHTML=req.responseText} 
        };req.open("GET",pag_url,true) ;
        req.send();
}

setInterval(function(){re(pag_url)},3000);
window.onload=re(pag_url) ;

// clearInternal(re(pag_url))
