/* handles exapanding of more links */

function expand(postid){
//alert("expand");
var text=document.getElementById("entry-hidden-" +postid);
//var button=document.getElementById("button-entry-more-"+postid);
var excerpt=document.getElementById("entry-content-"+postid);
text.style.display="block";
excerpt.style.display="none";
//button.style.display="none";
}

function collapse(postid){
var text=document.getElementById("entry-hidden-" +postid);
//var button=document.getElementById("button-entry-more-"+postid);
var excerpt=document.getElementById("entry-content-"+postid);
text.style.display="none";
excerpt.style.display="block";


 $('html, body').animate({
                    scrollTop: $("#entry-content-"+postid).offset().top-280 //280 je steivlo pikslov pod headerjem...
 }, 400);

//button.style.display="block";


}

